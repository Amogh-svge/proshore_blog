<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        switch ($this->method()) {
            case 'POST':

                return [
                    'title' => 'required|min:3|unique:category',
                    'image' => 'required|file|mimes:png,jpg',
                    'content' =>  'required|min:50',
                    'status' =>  'required',
                ];

            case 'PUT':
            case 'PATCH':

                return [
                    'title' => 'required|min:3',
                    'image' => 'required|file|mimes:png,jpg,jpeg',
                    'content' =>  'required|min:50',
                    'status' =>  'required',
                ];
        }
    }
}
