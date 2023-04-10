<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BlogRequest extends FormRequest
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
        return [
            'title' => 'required|min:3|unique:blogs',
            'image' => 'required|file|mimes:png,jpg,jpeg|max:512',
            'summary' => 'required|min:15|string',
            'content' =>  'required|min:50|string',
            'status' =>  'required',
            'category' => 'required'
        ];
    }
}
