<?php

namespace App\Http\Controllers\Backend\ServiceCategory;

use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use App\Repositories\Backend\ServiceCategory\ServicecategoryRepository;
use App\Http\Requests\Backend\ServiceCategory\ManageServicecategoryRequest;

/**
 * Class ServicecategoriesTableController.
 */
class ServicecategoriesTableController extends Controller
{
    /**
     * variable to store the repository object
     * @var ServicecategoryRepository
     */
    protected $servicecategory;

    /**
     * contructor to initialize repository object
     * @param ServicecategoryRepository $servicecategory;
     */
    public function __construct(ServicecategoryRepository $servicecategory)
    {
        $this->servicecategory = $servicecategory;
    }

    /**
     * This method return the data of the model
     * @param ManageServicecategoryRequest $request
     *
     * @return mixed
     */
    public function __invoke(ManageServicecategoryRequest $request)
    {
        return Datatables::of($this->servicecategory->getForDataTable())
            ->escapeColumns(['id'])
            ->addColumn('created_at', function ($servicecategory) {
                return Carbon::parse($servicecategory->created_at)->toDateString();
            })
            ->addColumn('actions', function ($servicecategory) {
                return $servicecategory->action_buttons;
            })
            ->make(true);
    }
}
