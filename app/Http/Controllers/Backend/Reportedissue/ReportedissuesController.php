<?php

namespace App\Http\Controllers\Backend\Reportedissue;

use App\Models\Reportedissue\Reportedissue;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Responses\RedirectResponse;
use App\Http\Responses\ViewResponse;
use App\Http\Responses\Backend\Reportedissue\CreateResponse;
use App\Http\Responses\Backend\Reportedissue\EditResponse;
use App\Repositories\Backend\Reportedissue\ReportedissueRepository;
use App\Http\Requests\Backend\Reportedissue\ManageReportedissueRequest;
use App\Http\Requests\Backend\Reportedissue\CreateReportedissueRequest;
use App\Http\Requests\Backend\Reportedissue\StoreReportedissueRequest;
use App\Http\Requests\Backend\Reportedissue\EditReportedissueRequest;
use App\Http\Requests\Backend\Reportedissue\UpdateReportedissueRequest;
use App\Http\Requests\Backend\Reportedissue\DeleteReportedissueRequest;

/**
 * ReportedissuesController
 */
class ReportedissuesController extends Controller
{
    /**
     * variable to store the repository object
     * @var ReportedissueRepository
     */
    protected $repository;

    /**
     * contructor to initialize repository object
     * @param ReportedissueRepository $repository;
     */
    public function __construct(ReportedissueRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @param  App\Http\Requests\Backend\Reportedissue\ManageReportedissueRequest  $request
     * @return \App\Http\Responses\ViewResponse
     */
    public function index(ManageReportedissueRequest $request)
    {
        return new ViewResponse('backend.reportedissues.index');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @param  CreateReportedissueRequestNamespace  $request
     * @return \App\Http\Responses\Backend\Reportedissue\CreateResponse
     */
    public function create(CreateReportedissueRequest $request)
    {
        return new CreateResponse('backend.reportedissues.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreReportedissueRequestNamespace  $request
     * @return \App\Http\Responses\RedirectResponse
     */
    public function store(StoreReportedissueRequest $request)
    {
        //Input received from the request
        $input = $request->except(['_token']);
        //Create the model using repository create method
        $this->repository->create($input);
        //return with successfull message
        return new RedirectResponse(route('admin.reportedissues.index'), ['flash_success' => trans('alerts.backend.reportedissues.created')]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  App\Models\Reportedissue\Reportedissue  $reportedissue
     * @param  EditReportedissueRequestNamespace  $request
     * @return \App\Http\Responses\Backend\Reportedissue\EditResponse
     */
    public function edit(Reportedissue $reportedissue, EditReportedissueRequest $request)
    {
        return new EditResponse($reportedissue);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateReportedissueRequestNamespace  $request
     * @param  App\Models\Reportedissue\Reportedissue  $reportedissue
     * @return \App\Http\Responses\RedirectResponse
     */
    public function update(UpdateReportedissueRequest $request, Reportedissue $reportedissue)
    {
        //Input received from the request
        $input = $request->except(['_token']);
        //Update the model using repository update method
        $this->repository->update( $reportedissue, $input );
        //return with successfull message
        return new RedirectResponse(route('admin.reportedissues.index'), ['flash_success' => trans('alerts.backend.reportedissues.updated')]);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  DeleteReportedissueRequestNamespace  $request
     * @param  App\Models\Reportedissue\Reportedissue  $reportedissue
     * @return \App\Http\Responses\RedirectResponse
     */
    public function destroy(Reportedissue $reportedissue, DeleteReportedissueRequest $request)
    {
        //Calling the delete method on repository
        $this->repository->delete($reportedissue);
        //returning with successfull message
        return new RedirectResponse(route('admin.reportedissues.index'), ['flash_success' => trans('alerts.backend.reportedissues.deleted')]);
    }
    
}
