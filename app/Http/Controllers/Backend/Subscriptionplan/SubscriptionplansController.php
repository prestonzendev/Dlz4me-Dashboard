<?php

namespace App\Http\Controllers\Backend\Subscriptionplan;

use App\Models\Subscriptionplan\Subscriptionplan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Responses\RedirectResponse;
use App\Http\Responses\ViewResponse;
use App\Http\Responses\Backend\Subscriptionplan\CreateResponse;
use App\Http\Responses\Backend\Subscriptionplan\EditResponse;
use App\Repositories\Backend\Subscriptionplan\SubscriptionplanRepository;
use App\Http\Requests\Backend\Subscriptionplan\ManageSubscriptionplanRequest;
use App\Http\Requests\Backend\Subscriptionplan\CreateSubscriptionplanRequest;
use App\Http\Requests\Backend\Subscriptionplan\StoreSubscriptionplanRequest;
use App\Http\Requests\Backend\Subscriptionplan\EditSubscriptionplanRequest;
use App\Http\Requests\Backend\Subscriptionplan\UpdateSubscriptionplanRequest;
use App\Http\Requests\Backend\Subscriptionplan\DeleteSubscriptionplanRequest;
use App\SubscriptionPlansFeature;

/**
 * SubscriptionplansController
 */
class SubscriptionplansController extends Controller
{
    /**
     * variable to store the repository object
     * @var SubscriptionplanRepository
     */
    protected $repository;

    /**
     * contructor to initialize repository object
     * @param SubscriptionplanRepository $repository;
     */
    public function __construct(SubscriptionplanRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @param  App\Http\Requests\Backend\Subscriptionplan\ManageSubscriptionplanRequest  $request
     * @return \App\Http\Responses\ViewResponse
     */
    public function index(ManageSubscriptionplanRequest $request)
    {
        return new ViewResponse('backend.subscriptionplans.index');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @param  CreateSubscriptionplanRequestNamespace  $request
     * @return \App\Http\Responses\Backend\Subscriptionplan\CreateResponse
     */
    public function create(CreateSubscriptionplanRequest $request)
    {
        return new CreateResponse('backend.subscriptionplans.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreSubscriptionplanRequestNamespace  $request
     * @return \App\Http\Responses\RedirectResponse
     */
    public function store(StoreSubscriptionplanRequest $request)
    {
        //Input received from the request
        $input = $request->except(['_token']);
        //Create the model using repository create method
        $this->repository->create($input);
        //return with successfull message
        return new RedirectResponse(route('admin.subscriptionplans.index'), ['flash_success' => trans('alerts.backend.subscriptionplans.created')]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  App\Models\Subscriptionplan\Subscriptionplan  $subscriptionplan
     * @param  EditSubscriptionplanRequestNamespace  $request
     * @return \App\Http\Responses\Backend\Subscriptionplan\EditResponse
     */
    public function edit(Subscriptionplan $subscriptionplan, EditSubscriptionplanRequest $request)
    {
        $conditions             = ['subscription_plan_id' => $subscriptionplan->id];
        $planFeaturesValues = SubscriptionPlansFeature::getCustomSelectData('description', $conditions);
        return new EditResponse($subscriptionplan,$planFeaturesValues);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateSubscriptionplanRequestNamespace  $request
     * @param  App\Models\Subscriptionplan\Subscriptionplan  $subscriptionplan
     * @return \App\Http\Responses\RedirectResponse
     */
    public function update(UpdateSubscriptionplanRequest $request, Subscriptionplan $subscriptionplan)
    {
        //Input received from the request
        $input = $request->except(['_token']);
        //Update the model using repository update method
        $this->repository->update( $subscriptionplan, $input );
        //return with successfull message
        return new RedirectResponse(route('admin.subscriptionplans.index'), ['flash_success' => trans('alerts.backend.subscriptionplans.updated')]);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  DeleteSubscriptionplanRequestNamespace  $request
     * @param  App\Models\Subscriptionplan\Subscriptionplan  $subscriptionplan
     * @return \App\Http\Responses\RedirectResponse
     */
    public function destroy(Subscriptionplan $subscriptionplan, DeleteSubscriptionplanRequest $request)
    {
        //Calling the delete method on repository
        $this->repository->delete($subscriptionplan);
        //returning with successfull message
        return new RedirectResponse(route('admin.subscriptionplans.index'), ['flash_success' => trans('alerts.backend.subscriptionplans.deleted')]);
    }
    
     /**
     * Remove the specified plan feature from storage.
     *
     * @param  DeleteSubscriptionplanFeaturesRequestNamespace  $request
     * @param  App\Models\Subscriptionplan\Subscriptionplan  $subscriptionplan
     * @return \App\Http\Responses\RedirectResponse
     */
    public function deletePlanFeature(Subscriptionplan $subscriptionplan,Request $request){
        $status = 'error';
        $deleteData = \App\SubscriptionPlansFeature::where(['id' => $request->id])->delete();
        if($deleteData) {
            $status = 'success';
        }
        return response()->json(['status'  => $status]);
    }
    
     /**
     * @param \App\Models\Subscriptionplan\Subscriptionplan $subscriptionplan
     * @param $id
     * @param \App\Http\Requests\Backend\Subscriptionplan\ManageFaqsRequest $request
     *
     * @return mixed
     */
    public function view($id)
    {
       $subsdata = Subscriptionplan::find($id);
       $planFeaturesValues = $subsdata->subscriptionPlansFeatures->all();

        return view('backend.subscriptionplans.show',compact(['subsdata','planFeaturesValues']));
    }
    
}
