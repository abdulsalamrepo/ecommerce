<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MarketSettingRequest extends FormRequest
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
            'name'      => 'required|max:50',
            'tel'       => 'required|numeric',
            'email'     => 'required|email',
            'address'   => 'required',
            'language'  => 'required',
            'curreny'   => 'required',
            'facebook'  => 'required',
            'twitter'   => 'required',
            'whatsapp'  => 'required',
            'youtube'   => 'required',
            'google'    => 'required',
            'instagram' => 'required',
        ];
    }
}
