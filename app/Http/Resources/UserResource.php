<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'username' => $this->username,
            'image' => $this->image ? asset('storage/' . $this->image) : null,
            'location' => $this->location,
            'mobile_number' => $this->mobile_number
                                    
        ];
    }
}
