<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreServiceForVendorRequest;
use App\Http\Requests\UpdateServiceForVendorRequest;
use App\Http\Resources\Admin\ServiceForVendorResource;
use App\Models\ServiceForVendor;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ServiceForVendorApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('service_for_vendor_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ServiceForVendorResource(ServiceForVendor::with(['category', 'sub_category', 'tags', 'approved_by', 'created_by'])->get());
    }

    public function store(StoreServiceForVendorRequest $request)
    {
        $serviceForVendor = ServiceForVendor::create($request->all());
        $serviceForVendor->tags()->sync($request->input('tags', []));

        if ($request->input('images', false)) {
            $serviceForVendor->addMedia(storage_path('tmp/uploads/' . $request->input('images')))->toMediaCollection('images');
        }

        if ($request->input('videos', false)) {
            $serviceForVendor->addMedia(storage_path('tmp/uploads/' . $request->input('videos')))->toMediaCollection('videos');
        }

        return (new ServiceForVendorResource($serviceForVendor))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(ServiceForVendor $serviceForVendor)
    {
        abort_if(Gate::denies('service_for_vendor_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ServiceForVendorResource($serviceForVendor->load(['category', 'sub_category', 'tags', 'approved_by', 'created_by']));
    }

    public function update(UpdateServiceForVendorRequest $request, ServiceForVendor $serviceForVendor)
    {
        $serviceForVendor->update($request->all());
        $serviceForVendor->tags()->sync($request->input('tags', []));

        if ($request->input('images', false)) {
            if (!$serviceForVendor->images || $request->input('images') !== $serviceForVendor->images->file_name) {
                if ($serviceForVendor->images) {
                    $serviceForVendor->images->delete();
                }

                $serviceForVendor->addMedia(storage_path('tmp/uploads/' . $request->input('images')))->toMediaCollection('images');
            }
        } elseif ($serviceForVendor->images) {
            $serviceForVendor->images->delete();
        }

        if ($request->input('videos', false)) {
            if (!$serviceForVendor->videos || $request->input('videos') !== $serviceForVendor->videos->file_name) {
                if ($serviceForVendor->videos) {
                    $serviceForVendor->videos->delete();
                }

                $serviceForVendor->addMedia(storage_path('tmp/uploads/' . $request->input('videos')))->toMediaCollection('videos');
            }
        } elseif ($serviceForVendor->videos) {
            $serviceForVendor->videos->delete();
        }

        return (new ServiceForVendorResource($serviceForVendor))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(ServiceForVendor $serviceForVendor)
    {
        abort_if(Gate::denies('service_for_vendor_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $serviceForVendor->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
