<?php

namespace App\Http\Requests\Backend\Subscriptionplan;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UpdateSubscriptionplanRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return access()->allow('update-subscriptionplan');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(Request $request)
    {
        $id = $this->route()->subscriptionplan->id;
        return [
            'title' => 'unique:subscription_plans,title,'.$id,
            'price' => 'required|numeric|min:0.01',
        ];
    }

    public function messages()
    {
        return [
            //The Custom messages would go in here
            //For Example : 'title.required' => 'You need to fill in the title field.'
            //Further, see the documentation : https://laravel.com/docs/5.4/validation#customizing-the-error-messages
            'price.min' => 'Price should be greater then zero.',
        ];
    }
}
