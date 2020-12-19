<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdatePaymentGatewayForAdminRequest;
use App\Http\Resources\Admin\PaymentGatewayForAdminResource;
use App\Models\PaymentGatewayForAdmin;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PaymentGatewayForAdminApiController extends Controller
{
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

        return (new PaymentGatewayForAdminResource($paymentGatewayForAdmin))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }
}
