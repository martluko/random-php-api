<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PaymentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'comment' => $this->comment,
            'stripe_payment_id' => $this->stripe_payment_id,
            // 'created_at' and 'updated_at' are optional
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
