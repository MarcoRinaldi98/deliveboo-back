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
            'address' => ['required', 'string', 'max:50'],
            'phone' => 'required|min:9|max:15',
            'vat' => ['required', 'max:11', 'min:11'],
            'image' => ['nullable', 'image', 'mimes:jpg,png,jpeg,gif,svg'],
            'description' => ['nullable', 'min:10', 'max:500'],
            'types' => 'exists:types,id',
        ];
        
    }
    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            if (!$this->has('types') || empty($this->input('types'))) {
                $validator->errors()->add('types', 'Devi selezionare almeno un tipo.');
            }
        });
    }
}