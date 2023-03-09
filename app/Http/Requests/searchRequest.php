<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class searchRequest extends FormRequest
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
            's'     => 'required',
        ];
    }

    public function attributes(){
        return [
            's' => 'search'
        ];
    }

    public function message(){
        return [
            's.required' => 'Search is required field'
        ];
    }
}
