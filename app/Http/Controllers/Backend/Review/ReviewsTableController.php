<?php

namespace App\Http\Controllers\Backend\Review;

use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use App\Repositories\Backend\Review\ReviewRepository;
use App\Http\Requests\Backend\Review\ManageReviewRequest;

/**
 * Class ReviewsTableController.
 */
class ReviewsTableController extends Controller
{
    /**
     * variable to store the repository object
     * @var ReviewRepository
     */
    protected $review;

    /**
     * contructor to initialize repository object
     * @param ReviewRepository $review;
     */
    public function __construct(ReviewRepository $review)
    {
        $this->review = $review;
    }

    /**
     * This method return the data of the model
     * @param ManageReviewRequest $request
     *
     * @return mixed
     */
    public function __invoke(ManageReviewRequest $request)
    {
        return Datatables::of($this->review->getForDataTable())
            ->escapeColumns(['id'])
            ->addColumn('created_at', function ($review) {
                return Carbon::parse($review->created_at)->toDateString();
            })
            ->addColumn('actions', function ($review) {
                return $review->action_buttons;
            })
            ->make(true);
    }
}
