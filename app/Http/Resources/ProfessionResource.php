<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProfessionResource extends JsonResource
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
            'description' => $this->description,
            // Include other attributes as needed
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            // Optionally, include relationships
            'users' => UserResource::collection($this->whenLoaded('users')),
        ];
    }
}
