<?php

namespace App\Http\Controllers\Backend\Preferencesoption;

use App\Models\Preferencesoption\Preferencesoption;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Responses\RedirectResponse;
use App\Http\Responses\ViewResponse;
use App\Http\Responses\Backend\Preferencesoption\CreateResponse;
use App\Http\Responses\Backend\Preferencesoption\EditResponse;
use App\Repositories\Backend\Preferencesoption\PreferencesoptionRepository;
use App\Http\Requests\Backend\Preferencesoption\ManagePreferencesoptionRequest;
use App\Http\Requests\Backend\Preferencesoption\CreatePreferencesoptionRequest;
use App\Http\Requests\Backend\Preferencesoption\StorePreferencesoptionRequest;
use App\Http\Requests\Backend\Preferencesoption\EditPreferencesoptionRequest;
use App\Http\Requests\Backend\Preferencesoption\UpdatePreferencesoptionRequest;
use App\Http\Requests\Backend\Preferencesoption\DeletePreferencesoptionRequest;
use App\Models\Preference\Preference;
use App\OptionField;
use App\PreferencesOptionsValue;

/**
 * PreferencesoptionsController
 */
class PreferencesoptionsController extends Controller {

    /**
     * variable to store the repository object
     * @var PreferencesoptionRepository
     */
    protected $repository;

    /**
     * contructor to initialize repository object
     * @param PreferencesoptionRepository $repository;
     */
    public function __construct(PreferencesoptionRepository $repository) {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @param  App\Http\Requests\Backend\Preferencesoption\ManagePreferencesoptionRequest  $request
     * @return \App\Http\Responses\ViewResponse
     */
    public function index(ManagePreferencesoptionRequest $request) {
        return new ViewResponse('backend.preferencesoptions.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param  CreatePreferencesoptionRequestNamespace  $request
     * @return \App\Http\Responses\Backend\Preferencesoption\CreateResponse
     */
    public function create(CreatePreferencesoptionRequest $request) {

        $conditions   = ['is_active' => 1, 'deleted_at' => null];
        $preference   = Preference::getCustomSelectData('title', $conditions);
        $optionfields = OptionField::getSelectData();

        return new CreateResponse('backend.preferencesoptions.create', $preference, $optionfields);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StorePreferencesoptionRequestNamespace  $request
     * @return \App\Http\Responses\RedirectResponse
     */
    public function store(StorePreferencesoptionRequest $request) {
        //Input received from the request
        $input = $request->except(['_token']);
        //Create the model using repository create method

        $this->repository->create($input);
        //return with successfull message
        return new RedirectResponse(route('admin.preferencesoptions.index'), ['flash_success' => trans('alerts.backend.preferencesoptions.created')]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  App\Models\Preferencesoption\Preferencesoption  $preferencesoption
     * @param  EditPreferencesoptionRequestNamespace  $request
     * @return \App\Http\Responses\Backend\Preferencesoption\EditResponse
     */
    public function edit(Preferencesoption $preferencesoption, EditPreferencesoptionRequest $request) {

        $conditions             = ['is_active' => 1, 'deleted_at' => null];
        $preference             = Preference::getCustomSelectData('title', $conditions);
        $optionfields           = OptionField::getSelectData();
        $conditions             = ['preferences_option_id' => $preferencesoption->id, 'deleted_at' => null];
        $optionPreferenceValues = PreferencesOptionsValue::getCustomSelectData('title', $conditions);
        return new EditResponse($preferencesoption, $preference, $optionfields, $optionPreferenceValues);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdatePreferencesoptionRequestNamespace  $request
     * @param  App\Models\Preferencesoption\Preferencesoption  $preferencesoption
     * @return \App\Http\Responses\RedirectResponse
     */
    public function update(UpdatePreferencesoptionRequest $request, Preferencesoption $preferencesoption) {
        //Input received from the request
        $input = $request->except(['_token']);
        //Update the model using repository update method

        $this->repository->update($preferencesoption, $input);
        //return with successfull message
        return new RedirectResponse(route('admin.preferencesoptions.index'), ['flash_success' => trans('alerts.backend.preferencesoptions.updated')]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  DeletePreferencesoptionRequestNamespace  $request
     * @param  App\Models\Preferencesoption\Preferencesoption  $preferencesoption
     * @return \App\Http\Responses\RedirectResponse
     */
    public function destroy(Preferencesoption $preferencesoption, DeletePreferencesoptionRequest $request) {
        //Calling the delete method on repository
        $this->repository->delete($preferencesoption);
        //returning with successfull message
        return new RedirectResponse(route('admin.preferencesoptions.index'), ['flash_success' => trans('alerts.backend.preferencesoptions.deleted')]);
    }

    /**
     * Remove the specified option values from storage.
     *
     * @param  DeletePreferencesoptionValuesRequestNamespace  $request
     * @param  App\Models\Subscriptionplan\Subscriptionplan  $subscriptionplan
     * @return \App\Http\Responses\RedirectResponse
     */
    public function deleteOptionValue(Preferencesoption $preferencesoption, Request $request) {
        $status     = 'error';
        $deleteData = \App\PreferencesOptionsValue::where(['id' => $request->id])->delete();
        if ($deleteData) {
            $status = 'success';
        }
        return response()->json(['status' => $status]);
    }

}
