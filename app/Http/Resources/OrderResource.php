<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "product" => new ProductResource($this->whenLoaded('product')),
            // "address" => new AddressResource($this->whenLoaded('address')),
            "user" => new UserResource($this->whenLoaded('user')),
            "status" => $this->status
        ];
    }
}
