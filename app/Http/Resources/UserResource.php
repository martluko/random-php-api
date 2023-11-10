<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
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
            'name' => $this->name,
            'email' => $this->email,
            // Include other user attributes you want to expose
            'profession' => new ProfessionResource($this->whenLoaded('profession')),
            'company' => new CompanyResource($this->whenLoaded('company')),
            // 'created_at' and 'updated_at' are optional
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
