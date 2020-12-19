<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePaymentForAdminRequest;
use App\Http\Requests\UpdatePaymentForAdminRequest;
use App\Http\Resources\Admin\PaymentForAdminResource;
use App\Models\PaymentForAdmin;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PaymentForAdminApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('payment_for_admin_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new PaymentForAdminResource(PaymentForAdmin::with(['method', 'user', 'plan', 'ref_products', 'ref_service', 'approved_by'])->get());
    }

    public function store(StorePaymentForAdminRequest $request)
    {
        $paymentForAdmin = PaymentForAdmin::create($request->all());
        $paymentForAdmin->ref_products()->sync($request->input('ref_products', []));

        return (new PaymentForAdminResource($paymentForAdmin))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(PaymentForAdmin $paymentForAdmin)
    {
        abort_if(Gate::denies('payment_for_admin_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new PaymentForAdminResource($paymentForAdmin->load(['method', 'user', 'plan', 'ref_products', 'ref_service', 'approved_by']));
    }

    public function update(UpdatePaymentForAdminRequest $request, PaymentForAdmin $paymentForAdmin)
    {
        $paymentForAdmin->update($request->all());
        $paymentForAdmin->ref_products()->sync($request->input('ref_products', []));

        return (new PaymentForAdminResource($paymentForAdmin))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(PaymentForAdmin $paymentForAdmin)
    {
        abort_if(Gate::denies('payment_for_admin_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $paymentForAdmin->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
