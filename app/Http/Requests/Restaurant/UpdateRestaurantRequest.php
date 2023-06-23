<?php

namespace App\Http\Requests\Restaurant;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateRestaurantRequest extends FormRequest
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
            'name' => ['required', 'max:150', Rule::unique('restaurants')->ignore($this->restaurant)],
            'surname' => ['required', 'string', 'max:255', 'alpha'],
            'address' => ['required', 'string', 'max:50'],
            'phone' => ['required', 'string', 'max:15'],
            'vat' => ['required', 'max:11', 'min:11'],
            'image' => ['nullable', 'image', 'mimes:jpg,png,jpeg,gif,svg'],
            'description' => ['nullable', 'min:10', 'max:65000'],
            'types.*' => ['exists:types,id'],
        ];
    }
}