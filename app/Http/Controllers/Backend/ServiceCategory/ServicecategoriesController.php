<?php

namespace App\Http\Controllers\Backend\ServiceCategory;

use App\Models\ServiceCategory\Servicecategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Responses\RedirectResponse;
use App\Http\Responses\ViewResponse;
use App\Http\Responses\Backend\ServiceCategory\CreateResponse;
use App\Http\Responses\Backend\ServiceCategory\EditResponse;
use App\Repositories\Backend\ServiceCategory\ServicecategoryRepository;
use App\Http\Requests\Backend\ServiceCategory\ManageServicecategoryRequest;
use App\Http\Requests\Backend\ServiceCategory\CreateServicecategoryRequest;
use App\Http\Requests\Backend\ServiceCategory\StoreServicecategoryRequest;
use App\Http\Requests\Backend\ServiceCategory\EditServicecategoryRequest;
use App\Http\Requests\Backend\ServiceCategory\UpdateServicecategoryRequest;
use App\Http\Requests\Backend\ServiceCategory\DeleteServicecategoryRequest;

/**
 * ServicecategoriesController
 */
class ServicecategoriesController extends Controller
{
    protected $status = [
        '0' => 'InActive',
        '1' => 'Active',
    ];

    /**
     * variable to store the repository object
     * @var ServicecategoryRepository
     */
    protected $repository;

    /**
     * contructor to initialize repository object
     * @param ServicecategoryRepository $repository;
     */
    public function __construct(ServicecategoryRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @param  App\Http\Requests\Backend\ServiceCategory\ManageServicecategoryRequest  $request
     * @return \App\Http\Responses\ViewResponse
     */
    public function index(ManageServicecategoryRequest $request)
    {
        return new ViewResponse('backend.servicecategories.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param  CreateServicecategoryRequestNamespace  $request
     * @return \App\Http\Responses\Backend\ServiceCategory\CreateResponse
     */
    public function create(CreateServicecategoryRequest $request)
    {
        return new CreateResponse($this->status);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreServicecategoryRequestNamespace  $request
     * @return \App\Http\Responses\RedirectResponse
     */
    public function store(StoreServicecategoryRequest $request)
    {
        //Input received from the request
        $input = $request->except(['_token']);
        //Create the model using repository create method
        $this->repository->create($input);
        //return with successfull message
        return new RedirectResponse(route('admin.servicecategories.index'), ['flash_success' => trans('alerts.backend.servicecategories.created')]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  App\Models\ServiceCategory\Servicecategory  $servicecategory
     * @param  EditServicecategoryRequestNamespace  $request
     * @return \App\Http\Responses\Backend\ServiceCategory\EditResponse
     */
    public function edit(Servicecategory $servicecategory, EditServicecategoryRequest $request)
    {
        return new EditResponse($servicecategory, $this->status);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateServicecategoryRequestNamespace  $request
     * @param  App\Models\ServiceCategory\Servicecategory  $servicecategory
     * @return \App\Http\Responses\RedirectResponse
     */
    public function update(UpdateServicecategoryRequest $request, Servicecategory $servicecategory)
    {
        //Input received from the request
        $input = $request->except(['_token']);
        //Update the model using repository update method
        $this->repository->update($servicecategory, $input);
        //return with successfull message
        return new RedirectResponse(route('admin.servicecategories.index'), ['flash_success' => trans('alerts.backend.servicecategories.updated')]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  DeleteServicecategoryRequestNamespace  $request
     * @param  App\Models\ServiceCategory\Servicecategory  $servicecategory
     * @return \App\Http\Responses\RedirectResponse
     */
    public function destroy(Servicecategory $servicecategory, DeleteServicecategoryRequest $request)
    {
        //Calling the delete method on repository
        $this->repository->delete($servicecategory);
        //returning with successfull message
        return new RedirectResponse(route('admin.servicecategories.index'), ['flash_success' => trans('alerts.backend.servicecategories.deleted')]);
    }
}
