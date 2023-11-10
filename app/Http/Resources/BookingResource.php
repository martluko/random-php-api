<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BookingResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        // Customize the response data as per your requirements
        return [
            'id' => $this->id,
            'comment' => $this->comment,
            'date_time' => $this->date_time,
            'user_id' => $this->user_id,
            'professional_id' => $this->professional_id,
            'payment_id' => $this->payment_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,

            // Include related resources if needed
            'user' => new UserResource($this->whenLoaded('user')),
            'professional' => new UserResource($this->whenLoaded('professional')),
            'payment' => new PaymentResource($this->whenLoaded('payment')),
        ];
    }
}
