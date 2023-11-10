<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CompanyResource extends JsonResource
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
            'title' => $this->title,
            // Include other attributes as needed
            'created_at' => $this->created_on,
            'deleted_at' => $this->deleted_on,
            // Optionally, include relationships
            'users' => UserResource::collection($this->whenLoaded('users')),
        ];
    }
}
