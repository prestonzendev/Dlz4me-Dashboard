<?php

namespace App\Http\Controllers\Backend\MembershipDetail;

use App\Models\MembershipDetail\Membershipdetail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Responses\RedirectResponse;
use App\Http\Responses\ViewResponse;
use App\Http\Responses\Backend\MembershipDetail\CreateResponse;
use App\Http\Responses\Backend\MembershipDetail\EditResponse;
use App\Repositories\Backend\MembershipDetail\MembershipdetailRepository;
use App\Http\Requests\Backend\MembershipDetail\ManageMembershipdetailRequest;
use App\Http\Requests\Backend\MembershipDetail\CreateMembershipdetailRequest;
use App\Http\Requests\Backend\MembershipDetail\StoreMembershipdetailRequest;
use App\Http\Requests\Backend\MembershipDetail\EditMembershipdetailRequest;
use App\Http\Requests\Backend\MembershipDetail\UpdateMembershipdetailRequest;
use App\Http\Requests\Backend\MembershipDetail\DeleteMembershipdetailRequest;

/**
 * MembershipdetailsController
 */
class MembershipdetailsController extends Controller
{
    /**
     * variable to store the repository object
     * @var MembershipdetailRepository
     */
    protected $repository;

    /**
     * contructor to initialize repository object
     * @param MembershipdetailRepository $repository;
     */
    public function __construct(MembershipdetailRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @param  App\Http\Requests\Backend\MembershipDetail\ManageMembershipdetailRequest  $request
     * @return \App\Http\Responses\ViewResponse
     */
    public function index(ManageMembershipdetailRequest $request)
    {
        return new ViewResponse('backend.membershipdetails.index');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @param  CreateMembershipdetailRequestNamespace  $request
     * @return \App\Http\Responses\Backend\MembershipDetail\CreateResponse
     */
    public function create(CreateMembershipdetailRequest $request)
    {
        $memberships = \DB::table('memberships')->where('status', 1)->get();
        return new CreateResponse($memberships);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreMembershipdetailRequestNamespace  $request
     * @return \App\Http\Responses\RedirectResponse
     */
    public function store(StoreMembershipdetailRequest $request)
    {
        //Input received from the request
        $input = $request->except(['_token']);
        //Create the model using repository create method
        $this->repository->create($input);
        //return with successfull message
        return new RedirectResponse(route('admin.membershipdetails.index'), ['flash_success' => trans('alerts.backend.membershipdetails.created')]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  App\Models\MembershipDetail\Membershipdetail  $membershipdetail
     * @param  EditMembershipdetailRequestNamespace  $request
     * @return \App\Http\Responses\Backend\MembershipDetail\EditResponse
     */
    public function edit(Membershipdetail $membershipdetail, EditMembershipdetailRequest $request)
    {
        $memberships = \DB::table('memberships')->where('status', 1)->get();
        return new EditResponse($membershipdetail, $memberships);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateMembershipdetailRequestNamespace  $request
     * @param  App\Models\MembershipDetail\Membershipdetail  $membershipdetail
     * @return \App\Http\Responses\RedirectResponse
     */
    public function update(UpdateMembershipdetailRequest $request, Membershipdetail $membershipdetail)
    {
        //Input received from the request
        $input = $request->except(['_token']);
        //Update the model using repository update method
        $this->repository->update($membershipdetail, $input);
        //return with successfull message
        return new RedirectResponse(route('admin.membershipdetails.index'), ['flash_success' => trans('alerts.backend.membershipdetails.updated')]);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  DeleteMembershipdetailRequestNamespace  $request
     * @param  App\Models\MembershipDetail\Membershipdetail  $membershipdetail
     * @return \App\Http\Responses\RedirectResponse
     */
    public function destroy(Membershipdetail $membershipdetail, DeleteMembershipdetailRequest $request)
    {
        //Calling the delete method on repository
        $this->repository->delete($membershipdetail);
        //returning with successfull message
        return new RedirectResponse(route('admin.membershipdetails.index'), ['flash_success' => trans('alerts.backend.membershipdetails.deleted')]);
    }
}
