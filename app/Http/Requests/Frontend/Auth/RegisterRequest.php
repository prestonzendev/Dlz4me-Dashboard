<?php

namespace App\Http\Requests\Frontend\Auth;

use App\Http\Requests\Request;
use Illuminate\Validation\Rule;

/**
 * Class RegisterRequest.
 */
class RegisterRequest extends Request
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
            'first_name'           => 'required|max:255',
            'last_name'            => 'required|max:255',
            'email'                => ['required', 'email', 'max:255', Rule::unique('users')],
            'password'             => 'required|min:8|confirmed', //|regex:"^[a-z0-9_\-]+$"
            'is_term_accept'       => 'required',
            //'g-recaptcha-response' => 'required_if:captcha_status,true|captcha',
           // 'profilepic' => 'image|dimensions:min_width=450,min_height=530|max:30000',
        ];
    }

    /**
     * @return array
     */
    public function messages()
    {
        return [
            //'g-recaptcha-response.required_if' => trans('validation.required', ['attribute' => 'captcha']),
            //'password.regex'                   => 'Password contain lowercase letters and digits only.',
            //'profilepic.dimensions' => 'Profile photo should be 450 x 530 px',
            //'profilepic.image' => 'Profile photo must be an image',
        ];
    }
}
