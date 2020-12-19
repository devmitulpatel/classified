<?php

namespace App\Http\Resources\Admin;

use Illuminate\Http\Resources\Json\JsonResource;

class PaymentGatewayForAdminResource extends JsonResource
{
    public function toArray($request)
    {
        return parent::toArray($request);
    }
}
