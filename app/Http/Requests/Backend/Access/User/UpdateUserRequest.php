<?php

namespace App\Http\Requests\Backend\Access\User;

use App\Http\Requests\Request;

/**
 * Class UpdateUserRequest.
 */
class UpdateUserRequest extends Request
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
            'email'           => 'required|email',
            'first_name'      => 'required|alpha_num',
            'last_name'       => 'required|alpha_num',
            'phone' => 'required|numeric|digits_between:7,14',
            'zip' => 'required',
            //'permissions'     => 'required',
           // 'assignees_roles' => 'required',
           // 'profilepic' => 'image|dimensions:min_width=450,min_height=530|max:30000',
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
           // 'profilepic.dimensions' => 'profile pic should be 450 x 530 px',
            'zip.required' => 'Pincode is required.',
        ];
    }
}
