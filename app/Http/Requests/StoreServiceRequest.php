<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreServiceRequest extends FormRequest
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
            'name_ar' => 'required|string|max:255',
            'name_fr' => 'required|string|max:255',
            'name_en' => 'required|string|max:255',
            'description_ar' => 'required|string',
            'description_fr' => 'required|string',
            'description_en' => 'required|string',
            'price' => 'required|numeric',
            'newPrice' => 'nullable|numeric',
            'specialPrice' => 'nullable|numeric',
            'specialPriceStart' => 'nullable|date',
            'specialPriceEnd' => 'nullable|date',
            'image' => 'required|image',
        ];
    }
}