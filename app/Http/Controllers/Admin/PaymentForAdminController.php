<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyPaymentForAdminRequest;
use App\Http\Requests\StorePaymentForAdminRequest;
use App\Http\Requests\UpdatePaymentForAdminRequest;
use App\Models\PaymentForAdmin;
use App\Models\PaymentGatewayForAdmin;
use App\Models\Plan;
use App\Models\ProductForVendor;
use App\Models\ServiceForVendor;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PaymentForAdminController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('payment_for_admin_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $paymentForAdmins = PaymentForAdmin::with(['method', 'user', 'plan', 'ref_products', 'ref_service', 'approved_by'])->get();

        return view('admin.paymentForAdmins.index', compact('paymentForAdmins'));
    }

    public function create()
    {
        abort_if(Gate::denies('payment_for_admin_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $methods = PaymentGatewayForAdmin::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $users = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $plans = Plan::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $ref_products = ProductForVendor::all()->pluck('name', 'id');

        $ref_services = ServiceForVendor::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $approved_bies = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.paymentForAdmins.create', compact('methods', 'users', 'plans', 'ref_products', 'ref_services', 'approved_bies'));
    }

    public function store(StorePaymentForAdminRequest $request)
    {
        $paymentForAdmin = PaymentForAdmin::create($request->all());
        $paymentForAdmin->ref_products()->sync($request->input('ref_products', []));

        return redirect()->route('admin.payment-for-admins.index');
    }

    public function edit(PaymentForAdmin $paymentForAdmin)
    {
        abort_if(Gate::denies('payment_for_admin_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $methods = PaymentGatewayForAdmin::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $users = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $plans = Plan::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $ref_products = ProductForVendor::all()->pluck('name', 'id');

        $ref_services = ServiceForVendor::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $approved_bies = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $paymentForAdmin->load('method', 'user', 'plan', 'ref_products', 'ref_service', 'approved_by');

        return view('admin.paymentForAdmins.edit', compact('methods', 'users', 'plans', 'ref_products', 'ref_services', 'approved_bies', 'paymentForAdmin'));
    }

    public function update(UpdatePaymentForAdminRequest $request, PaymentForAdmin $paymentForAdmin)
    {
        $paymentForAdmin->update($request->all());
        $paymentForAdmin->ref_products()->sync($request->input('ref_products', []));

        return redirect()->route('admin.payment-for-admins.index');
    }

    public function show(PaymentForAdmin $paymentForAdmin)
    {
        abort_if(Gate::denies('payment_for_admin_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $paymentForAdmin->load('method', 'user', 'plan', 'ref_products', 'ref_service', 'approved_by');

        return view('admin.paymentForAdmins.show', compact('paymentForAdmin'));
    }

    public function destroy(PaymentForAdmin $paymentForAdmin)
    {
        abort_if(Gate::denies('payment_for_admin_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $paymentForAdmin->delete();

        return back();
    }

    public function massDestroy(MassDestroyPaymentForAdminRequest $request)
    {
        PaymentForAdmin::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
