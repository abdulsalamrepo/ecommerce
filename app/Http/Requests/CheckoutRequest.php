<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CheckoutRequest extends FormRequest
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
            'fname'      => 'required|max:50',
            'lname'      => 'required|max:50',
            'phone'       => 'required|numeric',
            'city'   => 'required',
            'country'  => 'required',
            'state'   => 'required',
            'zip'  => 'required',
            'street'   => 'required',
            'notes'  => 'required',
            'swish'  => 'required|numeric',
        ];
    }
}
