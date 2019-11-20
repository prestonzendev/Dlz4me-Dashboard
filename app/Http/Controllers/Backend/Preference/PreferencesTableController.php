<?php

namespace App\Http\Controllers\Backend\Preference;

use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use App\Repositories\Backend\Preference\PreferenceRepository;
use App\Http\Requests\Backend\Preference\ManagePreferenceRequest;

/**
 * Class PreferencesTableController.
 */
class PreferencesTableController extends Controller
{
    /**
     * variable to store the repository object
     * @var PreferenceRepository
     */
    protected $preference;

    /**
     * contructor to initialize repository object
     * @param PreferenceRepository $preference;
     */
    public function __construct(PreferenceRepository $preference)
    {
        $this->preference = $preference;
    }

    /**
     * This method return the data of the model
     * @param ManagePreferenceRequest $request
     *
     * @return mixed
     */
    public function __invoke(ManagePreferenceRequest $request)
    {
        return Datatables::of($this->preference->getForDataTable())
            ->escapeColumns(['id'])
            ->addColumn('is_active', function ($preference) {
                return $preference->isActive_label;
            })
            ->addColumn('created_at', function ($preference) {
                return Carbon::parse($preference->created_at)->toDateString();
            })
            ->addColumn('actions', function ($preference) {
                return $preference->action_buttons;
            })
            ->make(true);
    }
}
