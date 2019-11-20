<?php

namespace App\Http\Responses\Backend\Faq;

use Illuminate\Contracts\Support\Responsable;

class CreateResponse implements Responsable
{
    /**
     * @var \App\Models\Faqcategory\
     */
    protected $faqCategories;

    /**
     * @param \App\Models\Faqs\Faq $faq
     */
    public function __construct($faqCategories)
    {
        $this->faqCategories = $faqCategories;
    }

    /**
     * toReponse.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function toResponse($request)
    {
        return view('backend.faqs.create')->with([
            'faqCategories' => $this->faqCategories,
            ]
        );
    }
}
