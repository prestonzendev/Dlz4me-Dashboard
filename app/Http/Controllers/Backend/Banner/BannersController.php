<?php

namespace App\Http\Controllers\Backend\Banner;

use App\Models\Banner\Banner;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Responses\RedirectResponse;
use App\Http\Responses\ViewResponse;
use App\Http\Responses\Backend\Banner\CreateResponse;
use App\Http\Responses\Backend\Banner\EditResponse;
use App\Repositories\Backend\Banner\BannerRepository;
use App\Http\Requests\Backend\Banner\ManageBannerRequest;
use App\Http\Requests\Backend\Banner\CreateBannerRequest;
use App\Http\Requests\Backend\Banner\StoreBannerRequest;
use App\Http\Requests\Backend\Banner\EditBannerRequest;
use App\Http\Requests\Backend\Banner\UpdateBannerRequest;
use App\Http\Requests\Backend\Banner\DeleteBannerRequest;

/**
 * BannersController
 */
class BannersController extends Controller
{
    /**
     * variable to show status value
     * @var BannerRepository
     */
    protected $status = [
        '0' => 'InActive',
        '1' => 'Active',
    ];

    /**
     * variable to store the repository object
     * @var BannerRepository
     */
    protected $repository;

    /**
     * contructor to initialize repository object
     * @param BannerRepository $repository;
     */
    public function __construct(BannerRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @param  App\Http\Requests\Backend\Banner\ManageBannerRequest  $request
     * @return \App\Http\Responses\ViewResponse
     */
    public function index(ManageBannerRequest $request)
    {
        return new ViewResponse('backend.banners.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param  CreateBannerRequestNamespace  $request
     * @return \App\Http\Responses\Backend\Banner\CreateResponse
     */
    public function create(CreateBannerRequest $request)
    {
        return new CreateResponse($this->status);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreBannerRequestNamespace  $request
     * @return \App\Http\Responses\RedirectResponse
     */
    public function store(StoreBannerRequest $request)
    {
        //Input received from the request
        $input = $request->except(['_token']);
        //Create the model using repository create method
        $this->repository->create($input);
        //return with successfull message
        return new RedirectResponse(route('admin.banners.index'), ['flash_success' => trans('alerts.backend.banners.created')]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  App\Models\Banner\Banner  $banner
     * @param  EditBannerRequestNamespace  $request
     * @return \App\Http\Responses\Backend\Banner\EditResponse
     */
    public function edit(Banner $banner, EditBannerRequest $request)
    {
        return new EditResponse($banner, $this->status);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateBannerRequestNamespace  $request
     * @param  App\Models\Banner\Banner  $banner
     * @return \App\Http\Responses\RedirectResponse
     */
    public function update(UpdateBannerRequest $request, Banner $banner)
    {
        //Input received from the request
        $input = $request->except(['_token']);
        //Update the model using repository update method
        $this->repository->update( $banner, $input );
        //return with successfull message
        return new RedirectResponse(route('admin.banners.index'), ['flash_success' => trans('alerts.backend.banners.updated')]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  DeleteBannerRequestNamespace  $request
     * @param  App\Models\Banner\Banner  $banner
     * @return \App\Http\Responses\RedirectResponse
     */
    public function destroy(Banner $banner, DeleteBannerRequest $request)
    {
        //Calling the delete method on repository
        $this->repository->delete($banner);
        //returning with successfull message
        return new RedirectResponse(route('admin.banners.index'), ['flash_success' => trans('alerts.backend.banners.deleted')]);
    }    
}
