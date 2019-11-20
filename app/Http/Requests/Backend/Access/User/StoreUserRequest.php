<?php

namespace App\Http\Requests\Backend\Access\User;

use App\Http\Requests\Request;
use Illuminate\Validation\Rule;

/**
 * Class StoreUserRequest.
 */
class StoreUserRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return access()->allow('create-user');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'first_name'      => 'required|max:255',
            'last_name'       => 'required|max:255',
            'email'           => ['required', 'email', 'max:255', Rule::unique('users')],
            'phone' => 'required|numeric|digits_between:7,14',
            'zip' => 'required',
            'password'        => 'required|min:6|confirmed',
            // 'assignees_roles' => 'required',
            // 'permissions'     => 'required',
            'profilepic'      => 'bail|image|dimensions:min_width=450,min_height=530|max:30000',
            'accountname'     => ['required', 'max:255', Rule::unique('users')],
        ];
    }

    /**
     * Get the validation massages that apply to the rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'assignees_roles' => 'Please Select Role',
            'profilepic.dimensions' => 'profile pic should be 450 x 530 px',
            'zip.required' => 'Postal code is required.',
        ];
    }
}
