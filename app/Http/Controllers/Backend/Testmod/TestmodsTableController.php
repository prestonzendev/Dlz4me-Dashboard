<?php

namespace App\Http\Controllers\Backend\Testmod;

use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use App\Repositories\Backend\Testmod\TestmodRepository;
use App\Http\Requests\Backend\Testmod\ManageTestmodRequest;

/**
 * Class TestmodsTableController.
 */
class TestmodsTableController extends Controller
{
    /**
     * variable to store the repository object
     * @var TestmodRepository
     */
    protected $testmod;

    /**
     * contructor to initialize repository object
     * @param TestmodRepository $testmod;
     */
    public function __construct(TestmodRepository $testmod)
    {
        $this->testmod = $testmod;
    }

    /**
     * This method return the data of the model
     * @param ManageTestmodRequest $request
     *
     * @return mixed
     */
    public function __invoke(ManageTestmodRequest $request)
    {
        return Datatables::of($this->testmod->getForDataTable())
            ->escapeColumns(['id'])
            ->addColumn('created_at', function ($testmod) {
                return Carbon::parse($testmod->created_at)->toDateString();
            })
            ->addColumn('actions', function ($testmod) {
                return $testmod->action_buttons;
            })
            ->make(true);
    }
}
