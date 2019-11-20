<?php

namespace App\Http\Controllers\Backend\PolicyType;

use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use App\Repositories\Backend\PolicyType\PolicytypeRepository;
use App\Http\Requests\Backend\PolicyType\ManagePolicytypeRequest;

/**
 * Class PolicytypesTableController.
 */
class PolicytypesTableController extends Controller
{
    /**
     * variable to store the repository object
     * @var PolicytypeRepository
     */
    protected $policytype;

    /**
     * contructor to initialize repository object
     * @param PolicytypeRepository $policytype;
     */
    public function __construct(PolicytypeRepository $policytype)
    {
        $this->policytype = $policytype;
    }

    /**
     * This method return the data of the model
     * @param ManagePolicytypeRequest $request
     *
     * @return mixed
     */
    public function __invoke(ManagePolicytypeRequest $request)
    {
        return Datatables::of($this->policytype->getForDataTable())
            ->escapeColumns(['id'])
            ->addColumn('created_at', function ($policytype) {
                return Carbon::parse($policytype->created_at)->toDateString();
            })
            ->addColumn('actions', function ($policytype) {
                return $policytype->action_buttons;
            })
            ->make(true);
    }
}
