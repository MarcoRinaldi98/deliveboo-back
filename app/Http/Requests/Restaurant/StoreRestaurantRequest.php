<?php

namespace App\Http\Requests\Restaurant;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreRestaurantRequest extends FormRequest
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
            'description' => 'nullable',
            'address' => 'required',
            'vat' => 'required|min:11',
            'phone' => 'phone|min:9',
            'types' => 'exists:types,id',
        ];
    }
}