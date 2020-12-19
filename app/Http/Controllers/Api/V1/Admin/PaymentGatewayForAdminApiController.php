<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\UpdatePaymentGatewayForAdminRequest;
use App\Http\Resources\Admin\PaymentGatewayForAdminResource;
use App\Models\PaymentGatewayForAdmin;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PaymentGatewayForAdminApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('payment_gateway_for_admin_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new PaymentGatewayForAdminResource(PaymentGatewayForAdmin::all());
    }

    public function show(PaymentGatewayForAdmin $paymentGatewayForAdmin)
    {
        abort_if(Gate::denies('payment_gateway_for_admin_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new PaymentGatewayForAdminResource($paymentGatewayForAdmin);
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

        return (new PaymentGatewayForAdminResource($paymentGatewayForAdmin))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }
}
