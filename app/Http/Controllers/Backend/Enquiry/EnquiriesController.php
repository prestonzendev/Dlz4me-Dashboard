<?php

namespace App\Http\Controllers\Backend\Enquiry;

use App\Models\Enquiry\Enquiry;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Responses\RedirectResponse;
use App\Http\Responses\ViewResponse;
use App\Http\Responses\Backend\Enquiry\CreateResponse;
use App\Http\Responses\Backend\Enquiry\EditResponse;
use App\Repositories\Backend\Enquiry\EnquiryRepository;
use App\Http\Requests\Backend\Enquiry\ManageEnquiryRequest;
use App\Http\Requests\Backend\Enquiry\CreateEnquiryRequest;
use App\Http\Requests\Backend\Enquiry\StoreEnquiryRequest;
use App\Http\Requests\Backend\Enquiry\EditEnquiryRequest;
use App\Http\Requests\Backend\Enquiry\UpdateEnquiryRequest;
use App\Http\Requests\Backend\Enquiry\DeleteEnquiryRequest;

/**
 * EnquiriesController
 */
class EnquiriesController extends Controller
{
    /**
     * variable to store the repository object
     * @var EnquiryRepository
     */
    protected $repository;

    /**
     * contructor to initialize repository object
     * @param EnquiryRepository $repository;
     */
    public function __construct(EnquiryRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @param  App\Http\Requests\Backend\Enquiry\ManageEnquiryRequest  $request
     * @return \App\Http\Responses\ViewResponse
     */
    public function index(ManageEnquiryRequest $request)
    {
        return new ViewResponse('backend.enquiries.index');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @param  CreateEnquiryRequestNamespace  $request
     * @return \App\Http\Responses\Backend\Enquiry\CreateResponse
     */
    public function create(CreateEnquiryRequest $request)
    {
        return new CreateResponse('backend.enquiries.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreEnquiryRequestNamespace  $request
     * @return \App\Http\Responses\RedirectResponse
     */
    public function store(StoreEnquiryRequest $request)
    {
        //Input received from the request
        $input = $request->except(['_token']);
        //Create the model using repository create method
        $this->repository->create($input);
        //return with successfull message
        return new RedirectResponse(route('admin.enquiries.index'), ['flash_success' => trans('alerts.backend.enquiries.created')]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  App\Models\Enquiry\Enquiry  $enquiry
     * @param  EditEnquiryRequestNamespace  $request
     * @return \App\Http\Responses\Backend\Enquiry\EditResponse
     */
    public function edit(Enquiry $enquiry, EditEnquiryRequest $request)
    {
        return new EditResponse($enquiry);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateEnquiryRequestNamespace  $request
     * @param  App\Models\Enquiry\Enquiry  $enquiry
     * @return \App\Http\Responses\RedirectResponse
     */
    public function update(UpdateEnquiryRequest $request, Enquiry $enquiry)
    {
        //Input received from the request
        $input = $request->except(['_token']);
        //Update the model using repository update method
        $this->repository->update( $enquiry, $input );
        //return with successfull message
        return new RedirectResponse(route('admin.enquiries.index'), ['flash_success' => trans('alerts.backend.enquiries.updated')]);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  DeleteEnquiryRequestNamespace  $request
     * @param  App\Models\Enquiry\Enquiry  $enquiry
     * @return \App\Http\Responses\RedirectResponse
     */
    public function destroy(Enquiry $enquiry, DeleteEnquiryRequest $request)
    {
        //Calling the delete method on repository
        $this->repository->delete($enquiry);
        //returning with successfull message
        return new RedirectResponse(route('admin.enquiries.index'), ['flash_success' => trans('alerts.backend.enquiries.deleted')]);
    }
    
}
