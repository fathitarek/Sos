<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreaterouteAPIRequest;
use App\Http\Requests\API\UpdaterouteAPIRequest;
use App\Models\route;
use App\Repositories\routeRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class routeController
 * @package App\Http\Controllers\API
 */

class routeAPIController extends AppBaseController
{
    /** @var  routeRepository */
    private $routeRepository;

    public function __construct(routeRepository $routeRepo)
    {
        $this->routeRepository = $routeRepo;
    }

    /**
     * Display a listing of the route.
     * GET|HEAD /routes
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->routeRepository->pushCriteria(new RequestCriteria($request));
        $this->routeRepository->pushCriteria(new LimitOffsetCriteria($request));
        $routes = $this->routeRepository->all();

        return $this->sendResponse($routes->toArray(), 'Routes retrieved successfully');
    }

    /**
     * Store a newly created route in storage.
     * POST /routes
     *
     * @param CreaterouteAPIRequest $request
     *
     * @return Response
     */
    public function store(CreaterouteAPIRequest $request)
    {
        $input = $request->all();

        $routes = $this->routeRepository->create($input);

        return $this->sendResponse($routes->toArray(), 'Route saved successfully');
    }

    /**
     * Display the specified route.
     * GET|HEAD /routes/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var route $route */
        $route = $this->routeRepository->findWithoutFail($id);

        if (empty($route)) {
            return $this->sendError('Route not found');
        }

        return $this->sendResponse($route->toArray(), 'Route retrieved successfully');
    }

    /**
     * Update the specified route in storage.
     * PUT/PATCH /routes/{id}
     *
     * @param  int $id
     * @param UpdaterouteAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdaterouteAPIRequest $request)
    {
        $input = $request->all();

        /** @var route $route */
        $route = $this->routeRepository->findWithoutFail($id);

        if (empty($route)) {
            return $this->sendError('Route not found');
        }

        $route = $this->routeRepository->update($input, $id);

        return $this->sendResponse($route->toArray(), 'route updated successfully');
    }

    /**
     * Remove the specified route from storage.
     * DELETE /routes/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var route $route */
        $route = $this->routeRepository->findWithoutFail($id);

        if (empty($route)) {
            return $this->sendError('Route not found');
        }

        $route->delete();

        return $this->sendResponse($id, 'Route deleted successfully');
    }
}
