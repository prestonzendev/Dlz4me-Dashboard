<?php

namespace App\Http\Requests\Frontend\User;

use App\Http\Requests\Request;
use Illuminate\Validation\Rule;

/**
 * Class UpdateProfileRequest.
 */
class UpdateProfileRequest extends Request
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
            'first_name' => 'required|max:255',
            'last_name'  => 'required|max:255',
			'zip'  => 'required',
            //'dob' => 'required|date|before_or_equal:' . \Carbon\Carbon::now()->subYears(18)->format('d/m/Y'),
            'accountname' => 'required|max:255|unique:users,accountname,'.access()->id(),
           // 'profilepic'      => 'bail|required|image|dimensions:min_width=450,min_height=530|max:30000',
            'email' => 'required|email|max:255|unique:users,email,'.access()->id(),
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
            'profilepic.dimensions' => 'profile pic should be 450 x 530 px',
            'accountname.unique' => 'The account name is already been taken.',
        ];
    }
}
