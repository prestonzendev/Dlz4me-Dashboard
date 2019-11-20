<?php

namespace App\Http\Controllers\Backend\Contact;

use App\Models\Contact\Contact;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Responses\RedirectResponse;
use App\Http\Responses\ViewResponse;
use App\Http\Responses\Backend\Contact\CreateResponse;
use App\Http\Responses\Backend\Contact\EditResponse;
use App\Repositories\Backend\Contact\ContactRepository;
use App\Http\Requests\Backend\Contact\ManageContactRequest;
use App\Http\Requests\Backend\Contact\CreateContactRequest;
use App\Http\Requests\Backend\Contact\StoreContactRequest;
use App\Http\Requests\Backend\Contact\EditContactRequest;
use App\Http\Requests\Backend\Contact\UpdateContactRequest;
use App\Http\Requests\Backend\Contact\DeleteContactRequest;

/**
 * ContactsController
 */
class ContactsController extends Controller
{
    /**
     * variable to store the repository object
     * @var ContactRepository
     */
    protected $repository;

    /**
     * contructor to initialize repository object
     * @param ContactRepository $repository;
     */
    public function __construct(ContactRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @param  App\Http\Requests\Backend\Contact\ManageContactRequest  $request
     * @return \App\Http\Responses\ViewResponse
     */
    public function index(ManageContactRequest $request)
    {
        return new ViewResponse('backend.contacts.index');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @param  CreateContactRequestNamespace  $request
     * @return \App\Http\Responses\Backend\Contact\CreateResponse
     */
    public function create(CreateContactRequest $request)
    {
        return new CreateResponse('backend.contacts.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreContactRequestNamespace  $request
     * @return \App\Http\Responses\RedirectResponse
     */
    public function store(StoreContactRequest $request)
    {
        //Input received from the request
        $input = $request->except(['_token']);
        //Create the model using repository create method
        $this->repository->create($input);
        //return with successfull message
        return new RedirectResponse(route('admin.contacts.index'), ['flash_success' => trans('alerts.backend.contacts.created')]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  App\Models\Contact\Contact  $contact
     * @param  EditContactRequestNamespace  $request
     * @return \App\Http\Responses\Backend\Contact\EditResponse
     */
    public function edit(Contact $contact, EditContactRequest $request)
    {
        return new EditResponse($contact);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateContactRequestNamespace  $request
     * @param  App\Models\Contact\Contact  $contact
     * @return \App\Http\Responses\RedirectResponse
     */
    public function update(UpdateContactRequest $request, Contact $contact)
    {
        //Input received from the request
        $input = $request->except(['_token']);
        //Update the model using repository update method
        $this->repository->update( $contact, $input );
        //return with successfull message
        return new RedirectResponse(route('admin.contacts.index'), ['flash_success' => trans('alerts.backend.contacts.updated')]);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  DeleteContactRequestNamespace  $request
     * @param  App\Models\Contact\Contact  $contact
     * @return \App\Http\Responses\RedirectResponse
     */
    public function destroy(Contact $contact, DeleteContactRequest $request)
    {
        //Calling the delete method on repository
        $this->repository->delete($contact);
        //returning with successfull message
        return new RedirectResponse(route('admin.contacts.index'), ['flash_success' => trans('alerts.backend.contacts.deleted')]);
    }
    
}
