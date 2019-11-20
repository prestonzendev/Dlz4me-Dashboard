<?php

namespace App\Http\Controllers\Backend\PolicyType;

use App\Models\PolicyType\Policytype;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Responses\RedirectResponse;
use App\Http\Responses\ViewResponse;
use App\Http\Responses\Backend\PolicyType\CreateResponse;
use App\Http\Responses\Backend\PolicyType\EditResponse;
use App\Repositories\Backend\PolicyType\PolicytypeRepository;
use App\Http\Requests\Backend\PolicyType\ManagePolicytypeRequest;
use App\Http\Requests\Backend\PolicyType\CreatePolicytypeRequest;
use App\Http\Requests\Backend\PolicyType\StorePolicytypeRequest;
use App\Http\Requests\Backend\PolicyType\EditPolicytypeRequest;
use App\Http\Requests\Backend\PolicyType\UpdatePolicytypeRequest;
use App\Http\Requests\Backend\PolicyType\DeletePolicytypeRequest;

/**
 * PolicytypesController
 */
class PolicytypesController extends Controller
{
    protected $status = [
        '0' => 'InActive',
        '1' => 'Active',
    ];

    /**
     * variable to store the repository object
     * @var PolicytypeRepository
     */
    protected $repository;

    /**
     * contructor to initialize repository object
     * @param PolicytypeRepository $repository;
     */
    public function __construct(PolicytypeRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @param  App\Http\Requests\Backend\PolicyType\ManagePolicytypeRequest  $request
     * @return \App\Http\Responses\ViewResponse
     */
    public function index(ManagePolicytypeRequest $request)
    {
        return new ViewResponse('backend.policytypes.index');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @param  CreatePolicytypeRequestNamespace  $request
     * @return \App\Http\Responses\Backend\PolicyType\CreateResponse
     */
    public function create(CreatePolicytypeRequest $request)
    {
        return new CreateResponse($this->status);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  StorePolicytypeRequestNamespace  $request
     * @return \App\Http\Responses\RedirectResponse
     */
    public function store(StorePolicytypeRequest $request)
    {
        //Input received from the request
        $input = $request->except(['_token']);
        //Create the model using repository create method
        $this->repository->create($input);
        //return with successfull message
        return new RedirectResponse(route('admin.policytypes.index'), ['flash_success' => trans('alerts.backend.policytypes.created')]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  App\Models\PolicyType\Policytype  $policytype
     * @param  EditPolicytypeRequestNamespace  $request
     * @return \App\Http\Responses\Backend\PolicyType\EditResponse
     */
    public function edit(Policytype $policytype, EditPolicytypeRequest $request)
    {
        return new EditResponse($policytype);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  UpdatePolicytypeRequestNamespace  $request
     * @param  App\Models\PolicyType\Policytype  $policytype
     * @return \App\Http\Responses\RedirectResponse
     */
    public function update(UpdatePolicytypeRequest $request, Policytype $policytype)
    {
        //Input received from the request
        $input = $request->except(['_token']);
        //Update the model using repository update method
        $this->repository->update($policytype, $input);
        //return with successfull message
        return new RedirectResponse(route('admin.policytypes.index'), ['flash_success' => trans('alerts.backend.policytypes.updated')]);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  DeletePolicytypeRequestNamespace  $request
     * @param  App\Models\PolicyType\Policytype  $policytype
     * @return \App\Http\Responses\RedirectResponse
     */
    public function destroy(Policytype $policytype, DeletePolicytypeRequest $request)
    {
        //Calling the delete method on repository
        $this->repository->delete($policytype);
        //returning with successfull message
        return new RedirectResponse(route('admin.policytypes.index'), ['flash_success' => trans('alerts.backend.policytypes.deleted')]);
    }
}
