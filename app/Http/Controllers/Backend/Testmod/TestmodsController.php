<?php

namespace App\Http\Controllers\Backend\Testmod;

use App\Models\Testmod\Testmod;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Responses\RedirectResponse;
use App\Http\Responses\ViewResponse;
use App\Http\Responses\Backend\Testmod\CreateResponse;
use App\Http\Responses\Backend\Testmod\EditResponse;
use App\Repositories\Backend\Testmod\TestmodRepository;
use App\Http\Requests\Backend\Testmod\ManageTestmodRequest;
use App\Http\Requests\Backend\Testmod\CreateTestmodRequest;
use App\Http\Requests\Backend\Testmod\StoreTestmodRequest;
use App\Http\Requests\Backend\Testmod\EditTestmodRequest;
use App\Http\Requests\Backend\Testmod\UpdateTestmodRequest;
use App\Http\Requests\Backend\Testmod\DeleteTestmodRequest;

/**
 * TestmodsController
 */
class TestmodsController extends Controller
{
    /**
     * variable to store the repository object
     * @var TestmodRepository
     */
    protected $repository;

    /**
     * contructor to initialize repository object
     * @param TestmodRepository $repository;
     */
    public function __construct(TestmodRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @param  App\Http\Requests\Backend\Testmod\ManageTestmodRequest  $request
     * @return \App\Http\Responses\ViewResponse
     */
    public function index(ManageTestmodRequest $request)
    {
        return new ViewResponse('backend.testmods.index');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @param  CreateTestmodRequestNamespace  $request
     * @return \App\Http\Responses\Backend\Testmod\CreateResponse
     */
    public function create(CreateTestmodRequest $request)
    {
        return new CreateResponse('backend.testmods.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreTestmodRequestNamespace  $request
     * @return \App\Http\Responses\RedirectResponse
     */
    public function store(StoreTestmodRequest $request)
    {
        //Input received from the request
        $input = $request->except(['_token']);
        //Create the model using repository create method
        $this->repository->create($input);
        //return with successfull message
        return new RedirectResponse(route('admin.testmods.index'), ['flash_success' => trans('alerts.backend.testmods.created')]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  App\Models\Testmod\Testmod  $testmod
     * @param  EditTestmodRequestNamespace  $request
     * @return \App\Http\Responses\Backend\Testmod\EditResponse
     */
    public function edit(Testmod $testmod, EditTestmodRequest $request)
    {
        return new EditResponse($testmod);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateTestmodRequestNamespace  $request
     * @param  App\Models\Testmod\Testmod  $testmod
     * @return \App\Http\Responses\RedirectResponse
     */
    public function update(UpdateTestmodRequest $request, Testmod $testmod)
    {
        //Input received from the request
        $input = $request->except(['_token']);
        //Update the model using repository update method
        $this->repository->update( $testmod, $input );
        //return with successfull message
        return new RedirectResponse(route('admin.testmods.index'), ['flash_success' => trans('alerts.backend.testmods.updated')]);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  DeleteTestmodRequestNamespace  $request
     * @param  App\Models\Testmod\Testmod  $testmod
     * @return \App\Http\Responses\RedirectResponse
     */
    public function destroy(Testmod $testmod, DeleteTestmodRequest $request)
    {
        //Calling the delete method on repository
        $this->repository->delete($testmod);
        //returning with successfull message
        return new RedirectResponse(route('admin.testmods.index'), ['flash_success' => trans('alerts.backend.testmods.deleted')]);
    }
    
}
