<?php

namespace App\Http\Controllers\Backend\Redeem;

use App\Models\Redeem\Redeem;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Responses\RedirectResponse;
use App\Http\Responses\ViewResponse;
use App\Http\Responses\Backend\Redeem\CreateResponse;
use App\Http\Responses\Backend\Redeem\EditResponse;
use App\Repositories\Backend\Redeem\RedeemRepository;
use App\Http\Requests\Backend\Redeem\ManageRedeemRequest;
use App\Http\Requests\Backend\Redeem\CreateRedeemRequest;
use App\Http\Requests\Backend\Redeem\StoreRedeemRequest;
use App\Http\Requests\Backend\Redeem\EditRedeemRequest;
use App\Http\Requests\Backend\Redeem\UpdateRedeemRequest;
use App\Http\Requests\Backend\Redeem\DeleteRedeemRequest;
use App\Models\Access\User\User;

/**
 * redeemsController
 */
class redeemsController extends Controller {

    protected $status = [
        '0' => 'Pending',
        '1' => 'Approved',
    ];

    /**
     * variable to store the repository object
     * @var RedeemRepository
     */
    protected $repository;

    /**
     * contructor to initialize repository object
     * @param RedeemRepository $repository;
     */
    public function __construct(RedeemRepository $repository) {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @param  App\Http\Requests\Backend\Redeem\ManageRedeemRequest  $request
     * @return \App\Http\Responses\ViewResponse
     */
    public function index(ManageRedeemRequest $request) {
        return new ViewResponse('backend.redeems.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param  CreateRedeemRequestNamespace  $request
     * @return \App\Http\Responses\Backend\Redeem\CreateResponse
     */
    public function create(CreateRedeemRequest $request) {
        return new CreateResponse($this->status);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  App\Models\Redeem\Redeem  $Redeem
     * @param  EditRedeemRequestNamespace  $request
     * @return \App\Http\Responses\Backend\Redeem\EditResponse
     */
    public function edit(Redeem $Redeem, EditRedeemRequest $request) {
        return new EditResponse($this->status, $Redeem);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateRedeemRequestNamespace  $request
     * @param  App\Models\Redeem\Redeem  $Redeem
     * @return \App\Http\Responses\RedirectResponse
     */
    public function update(UpdateRedeemRequest $request, Redeem $Redeem) {
        //Input received from the request
        $input = $request->except(['_token']);
        //Update the model using repository update method
        $this->repository->update($Redeem, $input);
        //return with successfull message
        return new RedirectResponse(route('admin.redeems.index'), ['flash_success' => trans('alerts.backend.redeems.updated')]);
    }

     public function changeStat(Request $request) {
        $id = $request->id;
        $status = $request->status;
        Redeem::where('id', $id)
          ->update(['status' => $status]);
        return response()->json(['success'=>'Redeem Approved']);
    }

}
