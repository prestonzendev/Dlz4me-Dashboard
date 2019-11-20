<?php

namespace App\Http\Controllers\Backend\Preferencesoption;

use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use App\Repositories\Backend\Preferencesoption\PreferencesoptionRepository;
use App\Http\Requests\Backend\Preferencesoption\ManagePreferencesoptionRequest;

/**
 * Class PreferencesoptionsTableController.
 */
class PreferencesoptionsTableController extends Controller {

    /**
     * variable to store the repository object
     * @var PreferencesoptionRepository
     */
    protected $preferencesoption;

    /**
     * contructor to initialize repository object
     * @param PreferencesoptionRepository $preferencesoption;
     */
    public function __construct(PreferencesoptionRepository $preferencesoption) {
        $this->preferencesoption = $preferencesoption;
    }

    /**
     * This method return the data of the model
     * @param ManagePreferencesoptionRequest $request
     *
     * @return mixed
     */
    public function __invoke(ManagePreferencesoptionRequest $request) {
        return Datatables::of($this->preferencesoption->getForDataTable())
                        ->escapeColumns(['id'])
                        ->addColumn('created_at', function ($preferencesoption) {
                            return Carbon::parse($preferencesoption->created_at)->toDateString();
                        })
                        ->addColumn('status', function ($preferencesoption) {
                            return $preferencesoption->status_label;
                        })
                        ->addColumn('actions', function ($preferencesoption) {
                            return $preferencesoption->action_buttons;
                        })
                        ->make(true);
    }

}
