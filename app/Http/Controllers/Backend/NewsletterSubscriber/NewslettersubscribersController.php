<?php

namespace App\Http\Controllers\Backend\NewsletterSubscriber;

use App\Models\NewsletterSubscriber\Newslettersubscriber;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Responses\RedirectResponse;
use App\Http\Responses\ViewResponse;
use App\Http\Responses\Backend\NewsletterSubscriber\CreateResponse;
use App\Http\Responses\Backend\NewsletterSubscriber\EditResponse;
use App\Repositories\Backend\NewsletterSubscriber\NewslettersubscriberRepository;
use App\Http\Requests\Backend\NewsletterSubscriber\ManageNewslettersubscriberRequest;
use App\Http\Requests\Backend\NewsletterSubscriber\CreateNewslettersubscriberRequest;
use App\Http\Requests\Backend\NewsletterSubscriber\StoreNewslettersubscriberRequest;
use App\Http\Requests\Backend\NewsletterSubscriber\EditNewslettersubscriberRequest;
use App\Http\Requests\Backend\NewsletterSubscriber\UpdateNewslettersubscriberRequest;
use App\Http\Requests\Backend\NewsletterSubscriber\DeleteNewslettersubscriberRequest;
use App\Exceptions\GeneralException;

/**
 * NewslettersubscribersController
 */
class NewslettersubscribersController extends Controller
{
    /**
     * variable to store the repository object
     * @var NewslettersubscriberRepository
     */
    protected $repository;

    /**
     * contructor to initialize repository object
     * @param NewslettersubscriberRepository $repository;
     */
    public function __construct(NewslettersubscriberRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @param  App\Http\Requests\Backend\NewsletterSubscriber\ManageNewslettersubscriberRequest  $request
     * @return \App\Http\Responses\ViewResponse
     */
    public function index(ManageNewslettersubscriberRequest $request)
    {
        return new ViewResponse('backend.newslettersubscribers.index');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @param  CreateNewslettersubscriberRequestNamespace  $request
     * @return \App\Http\Responses\Backend\NewsletterSubscriber\CreateResponse
     */
    public function create(CreateNewslettersubscriberRequest $request)
    {
        return new CreateResponse('backend.newslettersubscribers.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreNewslettersubscriberRequestNamespace  $request
     * @return \App\Http\Responses\RedirectResponse
     */
    public function store(StoreNewslettersubscriberRequest $request)
    {
        //Input received from the request
        $input = $request->except(['_token']);
        //Create the model using repository create method
        $this->repository->create($input);
        //return with successfull message
        return new RedirectResponse(route('admin.newslettersubscribers.index'), ['flash_success' => trans('alerts.backend.newslettersubscribers.created')]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  App\Models\NewsletterSubscriber\Newslettersubscriber  $newslettersubscriber
     * @param  EditNewslettersubscriberRequestNamespace  $request
     * @return \App\Http\Responses\Backend\NewsletterSubscriber\EditResponse
     */
    public function edit(Newslettersubscriber $newslettersubscriber, EditNewslettersubscriberRequest $request)
    {
        return new EditResponse($newslettersubscriber);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateNewslettersubscriberRequestNamespace  $request
     * @param  App\Models\NewsletterSubscriber\Newslettersubscriber  $newslettersubscriber
     * @return \App\Http\Responses\RedirectResponse
     */
    public function update(UpdateNewslettersubscriberRequest $request, Newslettersubscriber $newslettersubscriber)
    {
        //Input received from the request
        $input = $request->except(['_token']);
        //Update the model using repository update method
        $this->repository->update($newslettersubscriber, $input);
        //return with successfull message
        return new RedirectResponse(route('admin.newslettersubscribers.index'), ['flash_success' => trans('alerts.backend.newslettersubscribers.updated')]);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  DeleteNewslettersubscriberRequestNamespace  $request
     * @param  App\Models\NewsletterSubscriber\Newslettersubscriber  $newslettersubscriber
     * @return \App\Http\Responses\RedirectResponse
     */
    public function destroy(Newslettersubscriber $newslettersubscriber, DeleteNewslettersubscriberRequest $request)
    {
        //Calling the delete method on repository
        $this->repository->delete($newslettersubscriber);
        //returning with successfull message
        return new RedirectResponse(route('admin.newslettersubscribers.index'), ['flash_success' => trans('alerts.backend.newslettersubscribers.deleted')]);
    }

    /**
     * @param ManageUserRequest $request
     *
     * @return mixed
     */
    public function mark(Newslettersubscriber $newslettersubscriber, $id, $status, EditNewslettersubscriberRequest $request)
    {
        $entry = Newslettersubscriber::find($id);

        $entry->status = $status;

        if ($entry->save()) {
            return redirect()->back()->withFlashSuccess('Subscription Status changed successfully');
        } else {
            throw new GeneralException('Subscription Status couldn\'t be changed');
        }
    }
}
