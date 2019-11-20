<?php

namespace App\Http\Controllers\Backend\Event;

use App\Models\Event\Event;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Responses\RedirectResponse;
use App\Http\Responses\ViewResponse;
use App\Http\Responses\Backend\Event\CreateResponse;
use App\Http\Responses\Backend\Event\EditResponse;
use App\Repositories\Backend\Event\EventRepository;
use App\Http\Requests\Backend\Event\ManageEventRequest;

/**
 * EventsController
 */
class EventsController extends Controller
{
    /**
     * variable to store the repository object
     * @var EventRepository
     */
    protected $repository;

    /**
     * contructor to initialize repository object
     * @param EventRepository $repository;
     */
    public function __construct(EventRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @param  App\Http\Requests\Backend\Event\ManageEventRequest  $request
     * @return \App\Http\Responses\ViewResponse
     */
    public function index(ManageEventRequest $request)
    {
        return new ViewResponse('backend.events.index');
    }
    
}
