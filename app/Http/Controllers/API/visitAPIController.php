<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatevisitAPIRequest;
use App\Http\Requests\API\UpdatevisitAPIRequest;
use App\Models\visit;
use App\Repositories\visitRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class visitController
 * @package App\Http\Controllers\API
 */

class visitAPIController extends AppBaseController
{
    /** @var  visitRepository */
    private $visitRepository;

    public function __construct(visitRepository $visitRepo)
    {
        $this->visitRepository = $visitRepo;
    }

    /**
     * Display a listing of the visit.
     * GET|HEAD /visits
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->visitRepository->pushCriteria(new RequestCriteria($request));
        $this->visitRepository->pushCriteria(new LimitOffsetCriteria($request));
        $visits = $this->visitRepository->all();

        return $this->sendResponse($visits->toArray(), 'Visits retrieved successfully');
    }

    /**
     * Store a newly created visit in storage.
     * POST /visits
     *
     * @param CreatevisitAPIRequest $request
     *
     * @return Response
     */
    public function store(CreatevisitAPIRequest $request)
    {
        $input = $request->all();

        $visits = $this->visitRepository->create($input);

        return $this->sendResponse($visits->toArray(), 'Visit saved successfully');
    }

    /**
     * Display the specified visit.
     * GET|HEAD /visits/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var visit $visit */
        $visit = $this->visitRepository->findWithoutFail($id);

        if (empty($visit)) {
            return $this->sendError('Visit not found');
        }

        return $this->sendResponse($visit->toArray(), 'Visit retrieved successfully');
    }

    /**
     * Update the specified visit in storage.
     * PUT/PATCH /visits/{id}
     *
     * @param  int $id
     * @param UpdatevisitAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatevisitAPIRequest $request)
    {
        $input = $request->all();

        /** @var visit $visit */
        $visit = $this->visitRepository->findWithoutFail($id);

        if (empty($visit)) {
            return $this->sendError('Visit not found');
        }

        $visit = $this->visitRepository->update($input, $id);

        return $this->sendResponse($visit->toArray(), 'visit updated successfully');
    }

    /**
     * Remove the specified visit from storage.
     * DELETE /visits/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var visit $visit */
        $visit = $this->visitRepository->findWithoutFail($id);

        if (empty($visit)) {
            return $this->sendError('Visit not found');
        }

        $visit->delete();

        return $this->sendResponse($id, 'Visit deleted successfully');
    }
}
