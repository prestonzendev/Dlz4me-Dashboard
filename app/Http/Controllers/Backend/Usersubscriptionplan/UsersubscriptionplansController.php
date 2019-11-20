<?php

namespace App\Http\Controllers\Backend\Usersubscriptionplan;

use App\Models\Usersubscriptionplan\Usersubscriptionplan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Responses\RedirectResponse;
use App\Http\Responses\ViewResponse;
use App\Http\Responses\Backend\Usersubscriptionplan\CreateResponse;
use App\Http\Responses\Backend\Usersubscriptionplan\EditResponse;
use App\Repositories\Backend\Usersubscriptionplan\UsersubscriptionplanRepository;
use App\Http\Requests\Backend\Usersubscriptionplan\ManageUsersubscriptionplanRequest;
use App\Http\Requests\Backend\Usersubscriptionplan\CreateUsersubscriptionplanRequest;
use App\Http\Requests\Backend\Usersubscriptionplan\StoreUsersubscriptionplanRequest;
use App\Http\Requests\Backend\Usersubscriptionplan\EditUsersubscriptionplanRequest;
use App\Http\Requests\Backend\Usersubscriptionplan\UpdateUsersubscriptionplanRequest;
use App\Http\Requests\Backend\Usersubscriptionplan\DeleteUsersubscriptionplanRequest;

/**
 * UsersubscriptionplansController
 */
class UsersubscriptionplansController extends Controller
{
    /**
     * variable to store the repository object
     * @var UsersubscriptionplanRepository
     */
    protected $repository;

    /**
     * contructor to initialize repository object
     * @param UsersubscriptionplanRepository $repository;
     */
    public function __construct(UsersubscriptionplanRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @param  App\Http\Requests\Backend\Usersubscriptionplan\ManageUsersubscriptionplanRequest  $request
     * @return \App\Http\Responses\ViewResponse
     */
    public function index(ManageUsersubscriptionplanRequest $request)
    {
        return new ViewResponse('backend.usersubscriptionplans.index');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @param  CreateUsersubscriptionplanRequestNamespace  $request
     * @return \App\Http\Responses\Backend\Usersubscriptionplan\CreateResponse
     */
    public function create(CreateUsersubscriptionplanRequest $request)
    {
        return new CreateResponse('backend.usersubscriptionplans.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreUsersubscriptionplanRequestNamespace  $request
     * @return \App\Http\Responses\RedirectResponse
     */
    public function store(StoreUsersubscriptionplanRequest $request)
    {
        //Input received from the request
        $input = $request->except(['_token']);
        //Create the model using repository create method
        $this->repository->create($input);
        //return with successfull message
        return new RedirectResponse(route('admin.usersubscriptionplans.index'), ['flash_success' => trans('alerts.backend.usersubscriptionplans.created')]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  App\Models\Usersubscriptionplan\Usersubscriptionplan  $usersubscriptionplan
     * @param  EditUsersubscriptionplanRequestNamespace  $request
     * @return \App\Http\Responses\Backend\Usersubscriptionplan\EditResponse
     */
    public function edit(Usersubscriptionplan $usersubscriptionplan, EditUsersubscriptionplanRequest $request)
    {
        return new EditResponse($usersubscriptionplan);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateUsersubscriptionplanRequestNamespace  $request
     * @param  App\Models\Usersubscriptionplan\Usersubscriptionplan  $usersubscriptionplan
     * @return \App\Http\Responses\RedirectResponse
     */
    public function update(UpdateUsersubscriptionplanRequest $request, Usersubscriptionplan $usersubscriptionplan)
    {
        //Input received from the request
        $input = $request->except(['_token']);
        //Update the model using repository update method
        $this->repository->update( $usersubscriptionplan, $input );
        //return with successfull message
        return new RedirectResponse(route('admin.usersubscriptionplans.index'), ['flash_success' => trans('alerts.backend.usersubscriptionplans.updated')]);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  DeleteUsersubscriptionplanRequestNamespace  $request
     * @param  App\Models\Usersubscriptionplan\Usersubscriptionplan  $usersubscriptionplan
     * @return \App\Http\Responses\RedirectResponse
     */
    public function destroy(Usersubscriptionplan $usersubscriptionplan, DeleteUsersubscriptionplanRequest $request)
    {
        //Calling the delete method on repository
        $this->repository->delete($usersubscriptionplan);
        //returning with successfull message
        return new RedirectResponse(route('admin.usersubscriptionplans.index'), ['flash_success' => trans('alerts.backend.usersubscriptionplans.deleted')]);
    }
    
}
