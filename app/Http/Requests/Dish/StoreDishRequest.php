<?php

namespace App\Http\Requests\Dish;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreDishRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|max:150|unique:restaurants',
            'image' => 'nullable|image|max:1024',
            'price' => 'required|decimal:2',
            'description' => 'nullable|max:255',
            'available' => 'boolean',
            'phone' => 'phone|min:9',
            'restaurant_id' => 'nullable|exists:restaurants,id',
            'orders' => 'exists:orders,id',
        ];
    }
}