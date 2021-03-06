<?php


namespace App\Http\Requests\Frontend\Options;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class GroupRequest
 * @package App\Http\Requests\Frontend\Options
 */
class GroupRequest extends FormRequest
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
            'gender' => 'string|required',
            'code' => 'string|required',
            'name' => 'string|required',
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
