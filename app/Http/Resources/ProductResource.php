<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "id" => $this->id,
            "title" => $this->title,
            "description" => $this->description,
            "is_free" => $this->is_free,
            "price" => $this->price,
            "condition" => $this->condition,
            "images" => ProductImageResource::collection($this->whenLoaded('images')),
            "category" => new CategoryResource($this->whenLoaded('category')),
        ];
    }
}
