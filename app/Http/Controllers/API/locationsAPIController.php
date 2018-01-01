<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatelocationsAPIRequest;
use App\Http\Requests\API\UpdatelocationsAPIRequest;
use App\Models\locations;
use App\Repositories\locationsRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class locationsController
 * @package App\Http\Controllers\API
 */

class locationsAPIController extends AppBaseController
{
    /** @var  locationsRepository */
    private $locationsRepository;

    public function __construct(locationsRepository $locationsRepo)
    {
        $this->locationsRepository = $locationsRepo;
    }

    /**
     * Display a listing of the locations.
     * GET|HEAD /locations
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->locationsRepository->pushCriteria(new RequestCriteria($request));
        $this->locationsRepository->pushCriteria(new LimitOffsetCriteria($request));
        $locations = $this->locationsRepository->all();

        return $this->sendResponse($locations->toArray(), 'Locations retrieved successfully');
    }

    /**
     * Store a newly created locations in storage.
     * POST /locations
     *
     * @param CreatelocationsAPIRequest $request
     *
     * @return Response
     */
    public function store(CreatelocationsAPIRequest $request)
    {
        $input = $request->all();

        $locations = $this->locationsRepository->create($input);

        return $this->sendResponse($locations->toArray(), 'Locations saved successfully');
    }

    /**
     * Display the specified locations.
     * GET|HEAD /locations/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var locations $locations */
        $locations = $this->locationsRepository->findWithoutFail($id);

        if (empty($locations)) {
            return $this->sendError('Locations not found');
        }

        return $this->sendResponse($locations->toArray(), 'Locations retrieved successfully');
    }

    /**
     * Update the specified locations in storage.
     * PUT/PATCH /locations/{id}
     *
     * @param  int $id
     * @param UpdatelocationsAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatelocationsAPIRequest $request)
    {
        $input = $request->all();

        /** @var locations $locations */
        $locations = $this->locationsRepository->findWithoutFail($id);

        if (empty($locations)) {
            return $this->sendError('Locations not found');
        }

        $locations = $this->locationsRepository->update($input, $id);

        return $this->sendResponse($locations->toArray(), 'locations updated successfully');
    }

    /**
     * Remove the specified locations from storage.
     * DELETE /locations/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var locations $locations */
        $locations = $this->locationsRepository->findWithoutFail($id);

        if (empty($locations)) {
            return $this->sendError('Locations not found');
        }

        $locations->delete();

        return $this->sendResponse($id, 'Locations deleted successfully');
    }
}
