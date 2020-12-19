<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\UpdatePaymentGatewayForAdminRequest;
use App\Models\PaymentGatewayForAdmin;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class PaymentGatewayForAdminController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('payment_gateway_for_admin_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $paymentGatewayForAdmins = PaymentGatewayForAdmin::with(['media'])->get();

        return view('admin.paymentGatewayForAdmins.index', compact('paymentGatewayForAdmins'));
    }

    public function edit(PaymentGatewayForAdmin $paymentGatewayForAdmin)
    {
        abort_if(Gate::denies('payment_gateway_for_admin_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.paymentGatewayForAdmins.edit', compact('paymentGatewayForAdmin'));
    }

    public function update(UpdatePaymentGatewayForAdminRequest $request, PaymentGatewayForAdmin $paymentGatewayForAdmin)
    {
        $paymentGatewayForAdmin->update($request->all());

        if ($request->input('image', false)) {
            if (!$paymentGatewayForAdmin->image || $request->input('image') !== $paymentGatewayForAdmin->image->file_name) {
                if ($paymentGatewayForAdmin->image) {
                    $paymentGatewayForAdmin->image->delete();
                }

                $paymentGatewayForAdmin->addMedia(storage_path('tmp/uploads/' . $request->input('image')))->toMediaCollection('image');
            }
        } elseif ($paymentGatewayForAdmin->image) {
            $paymentGatewayForAdmin->image->delete();
        }

        return redirect()->route('admin.payment-gateway-for-admins.index');
    }

    public function show(PaymentGatewayForAdmin $paymentGatewayForAdmin)
    {
        abort_if(Gate::denies('payment_gateway_for_admin_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.paymentGatewayForAdmins.show', compact('paymentGatewayForAdmin'));
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('payment_gateway_for_admin_create') && Gate::denies('payment_gateway_for_admin_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new PaymentGatewayForAdmin();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
