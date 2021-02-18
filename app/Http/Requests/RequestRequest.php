<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class RequestRequest extends FormRequest
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
            'brand' => ['required', 'string', 'max:50'],
            'model' => ['required', 'string', 'max:50'],
            'part_no' => ['required', 'string', 'max:50'],
            'part_desc' => ['required', 'string', 'max:100'],
            'qty' => ['required', 'numeric', 'max:10000'],
        ];
    }
}
