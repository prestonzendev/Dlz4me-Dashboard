<?php

namespace App\Http\Controllers\Backend\Service;

use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use App\Repositories\Backend\Service\ServiceRepository;
use App\Http\Requests\Backend\Service\ManageServiceRequest;

/**
 * Class ServicesTableController.
 */
class ServicesTableController extends Controller {

    /**
     * variable to store the repository object
     * @var ServiceRepository
     */
    protected $service;

    /**
     * contructor to initialize repository object
     * @param ServiceRepository $service;
     */
    public function __construct(ServiceRepository $service) {
        $this->service = $service;
    }

    /**
     * This method return the data of the model
     * @param ManageServiceRequest $request
     *
     * @return mixed
     */
    public function __invoke(ManageServiceRequest $request) {
        return Datatables::of($this->service->getForDataTable(''))
                        ->escapeColumns(['id'])
                        ->addColumn('status', function ($service) {
                            return $service->status;
                        })
                        ->addColumn('is_featured', function ($service) {
                            return $service->is_featured;
                        })
                        ->addColumn('created_at', function ($service) {
                            return Carbon::parse($service->created_at)->toDateString();
                        })
                        ->addColumn('actions', function ($service) {
                            return $service->action_buttons;
                        })
                        ->make(true);
    }
    public function getFeatured(ManageServiceRequest $request) {
        return Datatables::of($this->service->getForDataTable(1))
                        ->escapeColumns(['id'])
                        ->addColumn('status', function ($service) {
                            return $service->status;
                        })
                        ->addColumn('is_featured', function ($service) {
                            return $service->is_featured;
                        })
                        ->addColumn('created_at', function ($service) {
                            return Carbon::parse($service->created_at)->toDateString();
                        })
                        ->addColumn('actions', function ($service) {
                            return $service->action_buttons;
                        })
                        ->addColumn('make_featured', function ($service) {
                            return '<input type="checkbox" id='.$service->id.' name="is_featured['.$service->id.']" value="2">';
                        })
                        ->make(true);
    }

}
