<?php

namespace App\Http\Controllers\Backend\Reportedissue;

use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use App\Repositories\Backend\Reportedissue\ReportedissueRepository;
use App\Http\Requests\Backend\Reportedissue\ManageReportedissueRequest;

/**
 * Class ReportedissuesTableController.
 */
class ReportedissuesTableController extends Controller
{
    /**
     * variable to store the repository object
     * @var ReportedissueRepository
     */
    protected $reportedissue;

    /**
     * contructor to initialize repository object
     * @param ReportedissueRepository $reportedissue;
     */
    public function __construct(ReportedissueRepository $reportedissue)
    {
        $this->reportedissue = $reportedissue;
    }

    /**
     * This method return the data of the model
     * @param ManageReportedissueRequest $request
     *
     * @return mixed
     */
    public function __invoke(ManageReportedissueRequest $request)
    {
        return Datatables::of($this->reportedissue->getForDataTable())
            ->escapeColumns(['id'])
            ->addColumn('created_at', function ($reportedissue) {
                return Carbon::parse($reportedissue->created_at)->toDateString();
            })
            ->addColumn('actions', function ($reportedissue) {
                return $reportedissue->action_buttons;
            })
            ->make(true);
    }
}
