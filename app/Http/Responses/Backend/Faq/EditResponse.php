<?php

namespace App\Http\Responses\Backend\Faq;

use Illuminate\Contracts\Support\Responsable;

class EditResponse implements Responsable
{
    /**
     * @var \App\Models\Faqs\Faq
     */
    protected $faq;

    /**
     * @param \App\Models\Faqs\Faq $faq
     */
    public function __construct($faq, $faqCategories)
    {
        $this->faq = $faq;
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
        return view('backend.faqs.edit')
            ->with([
                'faq' => $this->faq,
                'faqCategories' => $this->faqCategories,
                'selectedCategory' => $this->faq->category_id,
            ]);
    }
}
