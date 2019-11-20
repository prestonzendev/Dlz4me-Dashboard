<?php

namespace App\Http\Controllers\Backend\TermsAndCondition;

use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use App\Repositories\Backend\TermsAndCondition\TermandconditionRepository;
use App\Http\Requests\Backend\TermsAndCondition\ManageTermandconditionRequest;

/**
 * Class TermandconditionsTableController.
 */
class TermandconditionsTableController extends Controller
{
    /**
     * variable to store the repository object
     * @var TermandconditionRepository
     */
    protected $termandcondition;

    /**
     * contructor to initialize repository object
     * @param TermandconditionRepository $termandcondition;
     */
    public function __construct(TermandconditionRepository $termandcondition)
    {
        $this->termandcondition = $termandcondition;
    }

    /**
     * This method return the data of the model
     * @param ManageTermandconditionRequest $request
     *
     * @return mixed
     */
    public function __invoke(ManageTermandconditionRequest $request)
    {
        return Datatables::of($this->termandcondition->getForDataTable())
            ->escapeColumns(['id'])
            ->addColumn('created_at', function ($termandcondition) {
                return Carbon::parse($termandcondition->created_at)->toDateString();
            })
            ->addColumn('actions', function ($termandcondition) {
                return $termandcondition->action_buttons;
            })
            ->make(true);
    }
}
