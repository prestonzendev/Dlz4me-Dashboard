<?php

namespace App\Http\Controllers\Backend\Faqcategory;

use App\Models\Faqcategory\Faqcategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Responses\RedirectResponse;
use App\Http\Responses\ViewResponse;
use App\Http\Responses\Backend\Faqcategory\CreateResponse;
use App\Http\Responses\Backend\Faqcategory\EditResponse;
use App\Repositories\Backend\Faqcategory\FaqcategoryRepository;
use App\Http\Requests\Backend\Faqcategory\ManageFaqcategoryRequest;
use App\Http\Requests\Backend\Faqcategory\CreateFaqcategoryRequest;
use App\Http\Requests\Backend\Faqcategory\StoreFaqcategoryRequest;
use App\Http\Requests\Backend\Faqcategory\EditFaqcategoryRequest;
use App\Http\Requests\Backend\Faqcategory\UpdateFaqcategoryRequest;
use App\Http\Requests\Backend\Faqcategory\DeleteFaqcategoryRequest;

/**
 * FaqcategoriesController
 */
class FaqcategoriesController extends Controller
{
    /**
     * variable to store the repository object
     * @var FaqcategoryRepository
     */
    protected $repository;

    protected $status = [
        '0' => 'InActive',
        '1' => 'Active',
    ];

    /**
     * contructor to initialize repository object
     * @param FaqcategoryRepository $repository;
     */
    public function __construct(FaqcategoryRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @param  App\Http\Requests\Backend\Faqcategory\ManageFaqcategoryRequest  $request
     * @return \App\Http\Responses\ViewResponse
     */
    public function index(ManageFaqcategoryRequest $request)
    {
        return new ViewResponse('backend.faqcategories.index');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @param  CreateFaqcategoryRequestNamespace  $request
     * @return \App\Http\Responses\Backend\Faqcategory\CreateResponse
     */
    public function create(CreateFaqcategoryRequest $request)
    {
        return new CreateResponse($this->status);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreFaqcategoryRequestNamespace  $request
     * @return \App\Http\Responses\RedirectResponse
     */
    public function store(StoreFaqcategoryRequest $request)
    {
        //Input received from the request
        $input = $request->except(['_token']);
        //Create the model using repository create method
        $this->repository->create($input);
        //return with successfull message
        return new RedirectResponse(route('admin.faqcategories.index'), ['flash_success' => trans('alerts.backend.faqcategories.created')]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  App\Models\Faqcategory\Faqcategory  $faqcategory
     * @param  EditFaqcategoryRequestNamespace  $request
     * @return \App\Http\Responses\Backend\Faqcategory\EditResponse
     */
    public function edit(Faqcategory $faqcategory, EditFaqcategoryRequest $request)
    {
        return new EditResponse($faqcategory, $this->status);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateFaqcategoryRequestNamespace  $request
     * @param  App\Models\Faqcategory\Faqcategory  $faqcategory
     * @return \App\Http\Responses\RedirectResponse
     */
    public function update(UpdateFaqcategoryRequest $request, Faqcategory $faqcategory)
    {
        //Input received from the request
        $input = $request->except(['_token']);
        //Update the model using repository update method
        $this->repository->update( $faqcategory, $input );
        //return with successfull message
        return new RedirectResponse(route('admin.faqcategories.index'), ['flash_success' => trans('alerts.backend.faqcategories.updated')]);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  DeleteFaqcategoryRequestNamespace  $request
     * @param  App\Models\Faqcategory\Faqcategory  $faqcategory
     * @return \App\Http\Responses\RedirectResponse
     */
    public function destroy(Faqcategory $faqcategory, DeleteFaqcategoryRequest $request)
    {
        //Calling the delete method on repository
        $this->repository->delete($faqcategory);
        //returning with successfull message
        return new RedirectResponse(route('admin.faqcategories.index'), ['flash_success' => trans('alerts.backend.faqcategories.deleted')]);
    }
    
}
