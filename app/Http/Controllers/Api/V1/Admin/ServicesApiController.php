<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreServiceRequest;
use App\Http\Requests\UpdateServiceRequest;
use App\Http\Resources\Admin\ServiceResource;
use App\Models\Service;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ServicesApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('service_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ServiceResource(Service::with(['approved_by', 'created_by'])->get());
    }

    public function store(StoreServiceRequest $request)
    {
        $service = Service::create($request->all());

        if ($request->input('images', false)) {
            $service->addMedia(storage_path('tmp/uploads/' . $request->input('images')))->toMediaCollection('images');
        }

        if ($request->input('videos', false)) {
            $service->addMedia(storage_path('tmp/uploads/' . $request->input('videos')))->toMediaCollection('videos');
        }

        return (new ServiceResource($service))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Service $service)
    {
        abort_if(Gate::denies('service_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ServiceResource($service->load(['approved_by', 'created_by']));
    }

    public function update(UpdateServiceRequest $request, Service $service)
    {
        $service->update($request->all());

        if ($request->input('images', false)) {
            if (!$service->images || $request->input('images') !== $service->images->file_name) {
                if ($service->images) {
                    $service->images->delete();
                }

                $service->addMedia(storage_path('tmp/uploads/' . $request->input('images')))->toMediaCollection('images');
            }
        } elseif ($service->images) {
            $service->images->delete();
        }

        if ($request->input('videos', false)) {
            if (!$service->videos || $request->input('videos') !== $service->videos->file_name) {
                if ($service->videos) {
                    $service->videos->delete();
                }

                $service->addMedia(storage_path('tmp/uploads/' . $request->input('videos')))->toMediaCollection('videos');
            }
        } elseif ($service->videos) {
            $service->videos->delete();
        }

        return (new ServiceResource($service))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Service $service)
    {
        abort_if(Gate::denies('service_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $service->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
