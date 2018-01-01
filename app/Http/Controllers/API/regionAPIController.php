<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateregionAPIRequest;
use App\Http\Requests\API\UpdateregionAPIRequest;
use App\Models\region;
use App\Repositories\regionRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class regionController
 * @package App\Http\Controllers\API
 */

class regionAPIController extends AppBaseController
{
    /** @var  regionRepository */
    private $regionRepository;

    public function __construct(regionRepository $regionRepo)
    {
        $this->regionRepository = $regionRepo;
    }

    /**
     * Display a listing of the region.
     * GET|HEAD /regions
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->regionRepository->pushCriteria(new RequestCriteria($request));
        $this->regionRepository->pushCriteria(new LimitOffsetCriteria($request));
        $regions = $this->regionRepository->all();

        return $this->sendResponse($regions->toArray(), 'Regions retrieved successfully');
    }

    /**
     * Store a newly created region in storage.
     * POST /regions
     *
     * @param CreateregionAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateregionAPIRequest $request)
    {
        $input = $request->all();

        $regions = $this->regionRepository->create($input);

        return $this->sendResponse($regions->toArray(), 'Region saved successfully');
    }

    /**
     * Display the specified region.
     * GET|HEAD /regions/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var region $region */
        $region = $this->regionRepository->findWithoutFail($id);

        if (empty($region)) {
            return $this->sendError('Region not found');
        }

        return $this->sendResponse($region->toArray(), 'Region retrieved successfully');
    }

    /**
     * Update the specified region in storage.
     * PUT/PATCH /regions/{id}
     *
     * @param  int $id
     * @param UpdateregionAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateregionAPIRequest $request)
    {
        $input = $request->all();

        /** @var region $region */
        $region = $this->regionRepository->findWithoutFail($id);

        if (empty($region)) {
            return $this->sendError('Region not found');
        }

        $region = $this->regionRepository->update($input, $id);

        return $this->sendResponse($region->toArray(), 'region updated successfully');
    }

    /**
     * Remove the specified region from storage.
     * DELETE /regions/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var region $region */
        $region = $this->regionRepository->findWithoutFail($id);

        if (empty($region)) {
            return $this->sendError('Region not found');
        }

        $region->delete();

        return $this->sendResponse($id, 'Region deleted successfully');
    }
}
