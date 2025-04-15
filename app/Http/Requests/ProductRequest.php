<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "title" => "required|string|min:3|max:100",
            "slug" => "nullable|string|min:3|max:100",
            "description" => "nullable|string|min:3|max:500",
            "is_free" => "nullable|boolean",
            "price" => "nullable|numeric|min:0",
            "condition" => "required|string|in:new,used",
            "category_id" => "required|integer|exists:categories,id",
            "images.*" => "required|image|mimes:jpg,jpeg,png,gif,svg|max:2048",
        ];
    }
}
