<?php

namespace App\Http\Requests\Backend\Faqcategory;

use Illuminate\Foundation\Http\FormRequest;

class StoreFaqcategoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return access()->allow('store-faqcategory');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'bail|required|unique:' . config('module.faqcategories.table'),
            //Put your rules for the request in here
            //For Example : 'title' => 'required'
            //Further, see the documentation : https://laravel.com/docs/5.4/validation#creating-form-requests
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'You need to fill the name of faq catyegory.',
            'name.unique' => 'The faq category name is already taken.'
            //The Custom messages would go in here
            //For Example : 'title.required' => 'You need to fill in the title field.'
            //Further, see the documentation : https://laravel.com/docs/5.4/validation#customizing-the-error-messages
        ];
    }
}
