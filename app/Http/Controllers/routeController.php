<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreaterouteRequest;
use App\Http\Requests\UpdaterouteRequest;
use App\Repositories\routeRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use App\Models\role;
class routeController extends AppBaseController
{
    /** @var  routeRepository */
    private $routeRepository;

    public function __construct(routeRepository $routeRepo)
    {
        $this->routeRepository = $routeRepo;
        $this->middleware('CheckRoute');
    }

    /**
     * Display a listing of the route.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->routeRepository->pushCriteria(new RequestCriteria($request));
        $routes = $this->routeRepository->all();

      //  dd($routes[0]->role->id);
        return view('routes.index')
            ->with('routes', $routes);
    }

    /**
     * Show the form for creating a new route.
     *
     * @return Response
     */
    public function create()
    {
        $role = role::latest()->pluck('role','id');
        return view('routes.create')->with('role', $role);
    }

    /**
     * Store a newly created route in storage.
     *
     * @param CreaterouteRequest $request
     *
     * @return Response
     */
    public function store(CreaterouteRequest $request)
    {
        $input = $request->all();

        $route = $this->routeRepository->create($input);

        Flash::success('Route saved successfully.');

        return redirect(route('routes.index'));
    }

    /**
     * Display the specified route.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $route = $this->routeRepository->findWithoutFail($id);

        if (empty($route)) {
            Flash::error('Route not found');

            return redirect(route('routes.index'));
        }

        return view('routes.show')->with('route', $route);
    }

    /**
     * Show the form for editing the specified route.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $route = $this->routeRepository->findWithoutFail($id);
        $role = role::latest()->pluck('role','id');
        if (empty($route)) {
            Flash::error('Route not found');

            return redirect(route('routes.index'));
        }

        return view('routes.edit')->with('route', $route)->with('role', $role);
    }

    /**
     * Update the specified route in storage.
     *
     * @param  int              $id
     * @param UpdaterouteRequest $request
     *
     * @return Response
     */
    public function update($id, UpdaterouteRequest $request)
    {
        $route = $this->routeRepository->findWithoutFail($id);

        if (empty($route)) {
            Flash::error('Route not found');

            return redirect(route('routes.index'));
        }

        $route = $this->routeRepository->update($request->all(), $id);

        Flash::success('Route updated successfully.');

        return redirect(route('routes.index'));
    }

    /**
     * Remove the specified route from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $route = $this->routeRepository->findWithoutFail($id);

        if (empty($route)) {
            Flash::error('Route not found');

            return redirect(route('routes.index'));
        }

        $this->routeRepository->delete($id);

        Flash::success('Route deleted successfully.');

        return redirect(route('routes.index'));
    }
}
