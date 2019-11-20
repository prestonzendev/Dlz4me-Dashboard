<?php

namespace App\Http\Controllers\Backend\Preference;

use App\Models\Preference\Preference;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Responses\RedirectResponse;
use App\Http\Responses\ViewResponse;
use App\Http\Responses\Backend\Preference\CreateResponse;
use App\Http\Responses\Backend\Preference\EditResponse;
use App\Repositories\Backend\Preference\PreferenceRepository;
use App\Http\Requests\Backend\Preference\ManagePreferenceRequest;
use App\Http\Requests\Backend\Preference\CreatePreferenceRequest;
use App\Http\Requests\Backend\Preference\StorePreferenceRequest;
use App\Http\Requests\Backend\Preference\EditPreferenceRequest;
use App\Http\Requests\Backend\Preference\UpdatePreferenceRequest;
use App\Http\Requests\Backend\Preference\DeletePreferenceRequest;
use Illuminate\Support\Facades\Validator;

/**
 * PreferencesController
 */
class PreferencesController extends Controller
{
    protected $isActive = [
        '0' => 'InActive',
        '1' => 'Active',
    ];
    
    /**
     * variable to store the repository object
     * @var PreferenceRepository
     */
    protected $repository;

    /**
     * contructor to initialize repository object
     * @param PreferenceRepository $repository;
     */
    public function __construct(PreferenceRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @param  App\Http\Requests\Backend\Preference\ManagePreferenceRequest  $request
     * @return \App\Http\Responses\ViewResponse
     */
    public function index(ManagePreferenceRequest $request)
    {
        return new ViewResponse('backend.preferences.index');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @param  CreatePreferenceRequestNamespace  $request
     * @return \App\Http\Responses\Backend\Preference\CreateResponse
     */
    public function create(CreatePreferenceRequest $request)
    {
        return new CreateResponse($this->isActive);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  StorePreferenceRequestNamespace  $request
     * @return \App\Http\Responses\RedirectResponse
     */
    public function store(StorePreferenceRequest $request)
    {
        //Input received from the request
        $input = $request->except(['_token']);
        //Create the model using repository create method
        
        try {
           
            // define validation rules on form fields
            $validationRules = [
              'title' => 'required|max:150|unique:preferences'
            ];            
            
            // call validation object
            $validator = Validator::make($input, $validationRules);
            
            // check if validation fails then redirect to create page with errors
            if($validator->fails()) {
               return redirect()->route('admin.preferences.create')->withErrors($validator)->withInput();
            }
            
            $this->repository->create($input);
            
        } catch (\Exception $ex) {            
            return redirect()->route('admin.preferences.create')->with('error', $ex->getMessage());
        }
        
        //return with successfull message
        return new RedirectResponse(route('admin.preferences.index'), ['flash_success' => trans('alerts.backend.preferences.created')]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  App\Models\Preference\Preference  $preference
     * @param  EditPreferenceRequestNamespace  $request
     * @return \App\Http\Responses\Backend\Preference\EditResponse
     */
    public function edit(Preference $preference, EditPreferenceRequest $request)
    {
        return new EditResponse($preference);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  UpdatePreferenceRequestNamespace  $request
     * @param  App\Models\Preference\Preference  $preference
     * @return \App\Http\Responses\RedirectResponse
     */
    public function update(UpdatePreferenceRequest $request, Preference $preference)
    {
        //Input received from the request
        $input = $request->except(['_token']);
        
        // define validation rules on form fields
        $validationRules = [
            'title' => 'required|max:150|unique:preferences,title,'.$preference['id']
        ];            

        // call validation object
        $validator = Validator::make($input, $validationRules);

        // check if validation fails then redirect to edit page with errors
        if($validator->fails()) {
            return redirect()->route('admin.preferences.edit', $preference['id'])->withErrors($validator)->withInput();
        }
        
        //Update the model using repository update method
        $this->repository->update( $preference, $input );
        //return with successfull message
        return new RedirectResponse(route('admin.preferences.index'), ['flash_success' => trans('alerts.backend.preferences.updated')]);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  DeletePreferenceRequestNamespace  $request
     * @param  App\Models\Preference\Preference  $preference
     * @return \App\Http\Responses\RedirectResponse
     */
    public function destroy(Preference $preference, DeletePreferenceRequest $request)
    {
        //Calling the delete method on repository
        $this->repository->delete($preference);
        
        // update flag of delete        
        $input = $request->except(['_token']);
        $input['is_deleted'] = 1;
        $this->repository->update( $preference, $input);
        
        //returning with successfull message
        return new RedirectResponse(route('admin.preferences.index'), ['flash_success' => trans('alerts.backend.preferences.deleted')]);
    }
    
}
