<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdatePaymentGatewayForAdminRequest;
use App\Models\PaymentGatewayForAdmin;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PaymentGatewayForAdminController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('payment_gateway_for_admin_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $paymentGatewayForAdmins = PaymentGatewayForAdmin::all();

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

        return redirect()->route('admin.payment-gateway-for-admins.index');
    }

    public function show(PaymentGatewayForAdmin $paymentGatewayForAdmin)
    {
        abort_if(Gate::denies('payment_gateway_for_admin_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.paymentGatewayForAdmins.show', compact('paymentGatewayForAdmin'));
    }
}
