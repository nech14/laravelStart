<?php

namespace App\Http\Resources\Position;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PositionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'user_id' => $this->user_id,
            'working_position' => $this->working_position,
            'city' => $this->city,
            'organization' => $this->organization,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}
