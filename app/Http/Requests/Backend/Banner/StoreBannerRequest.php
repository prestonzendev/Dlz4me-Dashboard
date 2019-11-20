<?php

namespace App\Http\Requests\Backend\Banner;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreBannerRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return access()->allow('store-banner');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'bannerfile' => 'bail|image|dimensions:min_width=1920,min_height=760',
            'title' => ['required', Rule::unique('banners')],
        ];
    }

    public function messages()
    {
        return [
            'bannerfile.dimensions' => 'Banner image should be 1920 x 760 px',
        ];
    }
}
