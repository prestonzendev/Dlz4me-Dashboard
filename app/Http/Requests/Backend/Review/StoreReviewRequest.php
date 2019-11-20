<?php

namespace App\Http\Requests\Backend\Review;

use Illuminate\Foundation\Http\FormRequest;

class StoreReviewRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return access()->allow('store-review');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'photo' => 'bail|image|dimensions:min_width=140,min_height=140',
            'name' => 'required',
            'message' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'photo.dimensions' => 'Reviewer photo should be 140 x 140 px',
            'message.required' => 'Please add review comment.',
        ];
    }
}
