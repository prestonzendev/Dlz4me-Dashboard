<?php

namespace App\Http\Requests\Backend\Banner;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;

class UpdateBannerRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return access()->allow('update-banner');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(Request $request)
    {
        $id = $this->route()->banner->id;
        return [
            'bannerfile' => 'bail|image|dimensions:min_width=1920,min_height=760',
            'title' => ['required', Rule::unique('banners')],
            'title' => 'unique:banners,title,'.$id,
        ];
    } 

    public function messages()
    {
        return [
            'bannerfile.dimensions' => 'Banner image should be 1920 x 760 px',
        ];
    }
}
