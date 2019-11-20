<?php

namespace App\Http\Controllers\Backend\Review;

use App\Models\Review\Review;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Responses\RedirectResponse;
use App\Http\Responses\ViewResponse;
use App\Http\Responses\Backend\Review\CreateResponse;
use App\Http\Responses\Backend\Review\EditResponse;
use App\Http\Responses\Backend\Review\ShowResponse;
use App\Repositories\Backend\Review\ReviewRepository;
use App\Http\Requests\Backend\Review\ManageReviewRequest;
use App\Http\Requests\Backend\Review\CreateReviewRequest;
use App\Http\Requests\Backend\Review\StoreReviewRequest;
use App\Http\Requests\Backend\Review\EditReviewRequest;
use App\Http\Requests\Backend\Review\UpdateReviewRequest;
use App\Http\Requests\Backend\Review\DeleteReviewRequest;
use App\Http\Requests\Backend\Review\ShowReviewRequest;

/**
 * ReviewsController
 */
class ReviewsController extends Controller
{
    /**
     * variable to show status value
     * @var ReviewRepository
     */
    protected $status = [
        '0' => 'InActive',
        '1' => 'Active',
    ];

    /**
     * variable to store the repository object
     * @var ReviewRepository
     */
    protected $repository;

    /**
     * contructor to initialize repository object
     * @param ReviewRepository $repository;
     */
    public function __construct(ReviewRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @param  App\Http\Requests\Backend\Review\ManageReviewRequest  $request
     * @return \App\Http\Responses\ViewResponse
     */
    public function index(ManageReviewRequest $request)
    {
        return new ViewResponse('backend.reviews.index');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @param  CreateReviewRequestNamespace  $request
     * @return \App\Http\Responses\Backend\Review\CreateResponse
     */
    public function create(CreateReviewRequest $request)
    {
        return new CreateResponse($this->status);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreReviewRequestNamespace  $request
     * @return \App\Http\Responses\RedirectResponse
     */
    public function store(StoreReviewRequest $request)
    {
        //Input received from the request
        $input = $request->except(['_token']);
        //Create the model using repository create method
        $this->repository->create($input);
        //return with successfull message
        return new RedirectResponse(route('admin.reviews.index'), ['flash_success' => trans('alerts.backend.reviews.created')]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  App\Models\Review\Review  $review
     * @param  EditReviewRequestNamespace  $request
     * @return \App\Http\Responses\Backend\Review\EditResponse
     */
    public function edit(Review $review, EditReviewRequest $request)
    {
        return new EditResponse($review, $this->status);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateReviewRequestNamespace  $request
     * @param  App\Models\Review\Review  $review
     * @return \App\Http\Responses\RedirectResponse
     */
    public function update(UpdateReviewRequest $request, Review $review)
    {
        //Input received from the request
        $input = $request->except(['_token']);
        //Update the model using repository update method
        $this->repository->update( $review, $input );
        //return with successfull message
        return new RedirectResponse(route('admin.reviews.index'), ['flash_success' => trans('alerts.backend.reviews.updated')]);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  DeleteReviewRequestNamespace  $request
     * @param  App\Models\Review\Review  $review
     * @return \App\Http\Responses\RedirectResponse
     */
    public function destroy(Review $review, DeleteReviewRequest $request)
    {
        //Calling the delete method on repository
        $this->repository->delete($review);
        //returning with successfull message
        return new RedirectResponse(route('admin.reviews.index'), ['flash_success' => trans('alerts.backend.reviews.deleted')]);
    }

    /**
     * @param  App\Models\Review\Review  $review
     * @return \App\Http\Responses\RedirectResponse
     *
     * @return \App\Http\Responses\Backend\Review\ShowResponse
     */
    public function showreview( $review, ShowReviewRequest $request) {
        $review = Review::find($review);
        return new ShowResponse($review);
    }
    
}
