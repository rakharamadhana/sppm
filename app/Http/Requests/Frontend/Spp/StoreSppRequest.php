<?php

namespace App\Http\Requests\Frontend\Spp;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class CalculateRequest
 * @package App\Http\Requests\Frontend\Contact
 */
class StoreSppRequest extends FormRequest
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
            'gender' => 'required',
            'group' => 'required',
            'year' => 'required',
            'month' => 'required',
            'amount' => 'required',
        ];
    }

    /**
     * @return array
     */
    public function messages()
    {
        return [
            'g-recaptcha-response.required_if' => __('validation.required', ['attribute' => 'captcha']),
        ];
    }
}
