<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProductRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'art' => [
                'required',
                Rule::unique('products', 'art')->ignore($this->product),
                'regex:/^[A-Za-z0-9]+$/',
            ],
            'status' => [
                'required',
                Rule::in(['available', 'unavailable']),
            ],
            'name' => 'required|min:10',
            'data' => '',
        ];
    }


    /**
     * Gather all extra field from request and put it into "data" field.
     */
    protected function prepareForValidation()
    {
        $pre_request = $this->all();
        unset($pre_request['_token']);
        unset($pre_request['_method']);
        foreach ($pre_request as $field => $value) {
            if (array_key_exists($field, $this->rules())) {
                unset($pre_request[$field]);
            }
        }
        $this->merge([
            'data' => $pre_request,
        ]);
    }

    public function messages()
    {
        return [
            'art.regex' => 'Артикул может содержать только латинские буквы и цифры',
        ];
    }
}
