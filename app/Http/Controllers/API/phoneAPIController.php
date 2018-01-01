<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatespecialtyAPIRequest;
use App\Http\Requests\API\UpdatespecialtyAPIRequest;
use App\Models\specialty;
use App\Repositories\specialtyRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use App\Doctor;

/**
 * Class specialtyController
 * @package App\Http\Controllers\API
 */
class phoneAPIController extends AppBaseController {

    /** @var  specialtyRepository */
    private $specialtyRepository;

    public function __construct(specialtyRepository $specialtyRepo) {
        $this->specialtyRepository = $specialtyRepo;
    }

    /**
     * Display a listing of the specialty.
     * GET|HEAD /specialties
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request) {
        if ($request) {
            $id = $request->id;
            $data = Doctor::latest()->where('specialty_id', $id)->get();
            return response()->json(['doctors' => $data]);
        }
    }

    /**
     * Store a newly created specialty in storage.
     * POST /specialties
     *
     * @param CreatespecialtyAPIRequest $request
     *
     * @return Response
     */
    public function store(CreatespecialtyAPIRequest $request) {
        $input = $request->all();

        $specialties = $this->specialtyRepository->create($input);

        return $this->sendResponse($specialties->toArray(), 'Specialty saved successfully');
    }

    /**
     * Display the specified specialty.
     * GET|HEAD /specialties/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id) {
        /** @var specialty $specialty */
        $specialty = $this->specialtyRepository->findWithoutFail($id);

        if (empty($specialty)) {
            return $this->sendError('Specialty not found');
        }

        return $this->sendResponse($specialty->toArray(), 'Specialty retrieved successfully');
    }

    /**
     * Update the specified specialty in storage.
     * PUT/PATCH /specialties/{id}
     *
     * @param  int $id
     * @param UpdatespecialtyAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatespecialtyAPIRequest $request) {
        $input = $request->all();

        /** @var specialty $specialty */
        $specialty = $this->specialtyRepository->findWithoutFail($id);

        if (empty($specialty)) {
            return $this->sendError('Specialty not found');
        }

        $specialty = $this->specialtyRepository->update($input, $id);

        return $this->sendResponse($specialty->toArray(), 'specialty updated successfully');
    }

    /**
     * Remove the specified specialty from storage.
     * DELETE /specialties/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id) {
        /** @var specialty $specialty */
        $specialty = $this->specialtyRepository->findWithoutFail($id);

        if (empty($specialty)) {
            return $this->sendError('Specialty not found');
        }

        $specialty->delete();

        return $this->sendResponse($id, 'Specialty deleted successfully');
    }

}
