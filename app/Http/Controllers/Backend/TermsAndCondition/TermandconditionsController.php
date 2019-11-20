<?php

namespace App\Http\Controllers\Backend\TermsAndCondition;

use App\Models\TermsAndCondition\Termandcondition;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Responses\RedirectResponse;
use App\Http\Responses\ViewResponse;
use App\Http\Responses\Backend\TermsAndCondition\CreateResponse;
use App\Http\Responses\Backend\TermsAndCondition\EditResponse;
use App\Repositories\Backend\TermsAndCondition\TermandconditionRepository;
use App\Http\Requests\Backend\TermsAndCondition\ManageTermandconditionRequest;
use App\Http\Requests\Backend\TermsAndCondition\CreateTermandconditionRequest;
use App\Http\Requests\Backend\TermsAndCondition\StoreTermandconditionRequest;
use App\Http\Requests\Backend\TermsAndCondition\EditTermandconditionRequest;
use App\Http\Requests\Backend\TermsAndCondition\UpdateTermandconditionRequest;
use App\Http\Requests\Backend\TermsAndCondition\DeleteTermandconditionRequest;
use App\Models\PolicyType\Policytype;

/**
 * TermandconditionsController
 */
class TermandconditionsController extends Controller
{
    protected $status = [
        '0' => 'InActive',
        '1' => 'Active',
    ];

    /**
     * variable to store the repository object
     * @var TermandconditionRepository
     */
    protected $repository;

    /**
     * contructor to initialize repository object
     * @param TermandconditionRepository $repository;
     */
    public function __construct(TermandconditionRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @param  App\Http\Requests\Backend\TermsAndCondition\ManageTermandconditionRequest  $request
     * @return \App\Http\Responses\ViewResponse
     */
    public function index(ManageTermandconditionRequest $request)
    {
        return new ViewResponse('backend.termandconditions.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param  CreateTermandconditionRequestNamespace  $request
     * @return \App\Http\Responses\Backend\TermsAndCondition\CreateResponse
     */
    public function create(CreateTermandconditionRequest $request)
    {
        $policy_types = Policytype::where('status', 1)->get();
        return new CreateResponse($policy_types);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreTermandconditionRequestNamespace  $request
     * @return \App\Http\Responses\RedirectResponse
     */
    public function store(StoreTermandconditionRequest $request)
    {
        //Input received from the request
        $input = $request->except(['_token']);
        //Create the model using repository create method
        $this->repository->create($input);
        //return with successfull message
        return new RedirectResponse(route('admin.termandconditions.index'), ['flash_success' => trans('alerts.backend.termandconditions.created')]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  App\Models\TermsAndCondition\Termandcondition  $termandcondition
     * @param  EditTermandconditionRequestNamespace  $request
     * @return \App\Http\Responses\Backend\TermsAndCondition\EditResponse
     */
    public function edit(Termandcondition $termandcondition, EditTermandconditionRequest $request)
    {
        $policy_types = Policytype::where('status', 1)->get();
        return new EditResponse($termandcondition, $policy_types);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateTermandconditionRequestNamespace  $request
     * @param  App\Models\TermsAndCondition\Termandcondition  $termandcondition
     * @return \App\Http\Responses\RedirectResponse
     */
    public function update(UpdateTermandconditionRequest $request, Termandcondition $termandcondition)
    {
        //Input received from the request
        $input = $request->except(['_token']);
        //Update the model using repository update method
        $this->repository->update($termandcondition, $input);
        //return with successfull message
        return new RedirectResponse(route('admin.termandconditions.index'), ['flash_success' => trans('alerts.backend.termandconditions.updated')]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  DeleteTermandconditionRequestNamespace  $request
     * @param  App\Models\TermsAndCondition\Termandcondition  $termandcondition
     * @return \App\Http\Responses\RedirectResponse
     */
    public function destroy(Termandcondition $termandcondition, DeleteTermandconditionRequest $request)
    {
        //Calling the delete method on repository
        $this->repository->delete($termandcondition);
        //returning with successfull message
        return new RedirectResponse(route('admin.termandconditions.index'), ['flash_success' => trans('alerts.backend.termandconditions.deleted')]);
    }
}
