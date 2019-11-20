<?php

namespace App\Http\Responses\Backend\Review;

use Illuminate\Contracts\Support\Responsable;

class ShowResponse implements Responsable
{
    /**
     * @var \App\Models\Access\User\User
     */
    protected $review;

    /**
     * @param \App\Models\Access\User\User $user
     */
    public function __construct($review)
    {
        $this->review = $review;
    }

    /**
     * In Response.
     *
     * @param \App\Http\Requests\Request $request
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function toResponse($request)
    {
        return view('backend.reviews.show')->with([
            'review' => $this->review,
        ]);
    }
}
