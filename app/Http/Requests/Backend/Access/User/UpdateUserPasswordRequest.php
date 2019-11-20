<?php

namespace App\Http\Requests\Backend\Access\User;

use App\Http\Requests\Request;

/**
 * Class UpdateUserPasswordRequest.
 */
class UpdateUserPasswordRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return access()->allow('edit-user');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'old_password' => 'required',
            'password'     => 'required|min:8|confirmed', //regex:"^[a-z0-9_\-]+$"
        ];
    }

    /**
     * @return array
     */
    public function messages()
    {
        return [
           // 'password.regex' => 'Password contain lowercase letters and digits only.',
        ];
    }
}
