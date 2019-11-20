<?php

namespace App\Http\Responses\Backend\Review;

use Illuminate\Contracts\Support\Responsable;

class EditResponse implements Responsable
{
    /**
     * @var App\Models\Review\Review
     */
    protected $reviews;
    protected $status;

    /**
     * @param App\Models\Review\Review $reviews
     */
    public function __construct($reviews, $status)
    {
        $this->reviews = $reviews;
        $this->status  = $status;
    }

    /**
     * To Response
     *
     * @param \App\Http\Requests\Request $request
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function toResponse($request)
    {
        $entry = \DB::table('reviews')->find($this->reviews->id);
        $status = $entry->status;
        $grade = $entry->grade;
        return view('backend.reviews.edit')->with([
            'review' => $this->reviews,
            'status' => $status,
            'grade' => $grade,
        ]);
    }
}