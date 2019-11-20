<?php

namespace App\Http\Requests\Backend\Settings;

use App\Http\Requests\Request;

/**
 * Class UpdateSettingsRequest.
 */
class UpdateSettingsRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return access()->allow('edit-settings');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'logo' => 'bail|image|dimensions:min_width=50,min_height=67',
            'favicon' => 'bail|mimes:jpg,jpeg,png,ico|dimensions:width=16,height=16',
            'contact_name' => 'required',
            'company_contact' => 'required',
            'company_email' => 'required',
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'logo.dimensions'     => 'Invalid logo - should be minimum 50*67',
            'favicon.dimensions'  => 'Invalid favicon - should be 16*16',
            'company_contact.required' => 'The contact number field is required.',
        ];
    }
}
