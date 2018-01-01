<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatecityAPIRequest;
use App\Http\Requests\API\UpdatecityAPIRequest;
use App\Models\city;
use App\Repositories\cityRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class cityController
 * @package App\Http\Controllers\API
 */

class cityAPIController extends AppBaseController
{
    /** @var  cityRepository */
    private $cityRepository;

    public function __construct(cityRepository $cityRepo)
    {
        $this->cityRepository = $cityRepo;
    }

    /**
     * Display a listing of the city.
     * GET|HEAD /cities
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->cityRepository->pushCriteria(new RequestCriteria($request));
        $this->cityRepository->pushCriteria(new LimitOffsetCriteria($request));
        $cities = $this->cityRepository->all();

        return $this->sendResponse($cities->toArray(), 'Cities retrieved successfully');
    }

    /**
     * Store a newly created city in storage.
     * POST /cities
     *
     * @param CreatecityAPIRequest $request
     *
     * @return Response
     */
    public function store(CreatecityAPIRequest $request)
    {
        $input = $request->all();

        $cities = $this->cityRepository->create($input);

        return $this->sendResponse($cities->toArray(), 'City saved successfully');
    }

    /**
     * Display the specified city.
     * GET|HEAD /cities/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var city $city */
        $city = $this->cityRepository->findWithoutFail($id);

        if (empty($city)) {
            return $this->sendError('City not found');
        }

        return $this->sendResponse($city->toArray(), 'City retrieved successfully');
    }

    /**
     * Update the specified city in storage.
     * PUT/PATCH /cities/{id}
     *
     * @param  int $id
     * @param UpdatecityAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatecityAPIRequest $request)
    {
        $input = $request->all();

        /** @var city $city */
        $city = $this->cityRepository->findWithoutFail($id);

        if (empty($city)) {
            return $this->sendError('City not found');
        }

        $city = $this->cityRepository->update($input, $id);

        return $this->sendResponse($city->toArray(), 'city updated successfully');
    }

    /**
     * Remove the specified city from storage.
     * DELETE /cities/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var city $city */
        $city = $this->cityRepository->findWithoutFail($id);

        if (empty($city)) {
            return $this->sendError('City not found');
        }

        $city->delete();

        return $this->sendResponse($id, 'City deleted successfully');
    }
}
