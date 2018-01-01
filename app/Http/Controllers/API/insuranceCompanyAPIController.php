<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateinsuranceCompanyAPIRequest;
use App\Http\Requests\API\UpdateinsuranceCompanyAPIRequest;
use App\Models\insuranceCompany;
use App\Repositories\insuranceCompanyRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class insuranceCompanyController
 * @package App\Http\Controllers\API
 */

class insuranceCompanyAPIController extends AppBaseController
{
    /** @var  insuranceCompanyRepository */
    private $insuranceCompanyRepository;

    public function __construct(insuranceCompanyRepository $insuranceCompanyRepo)
    {
        $this->insuranceCompanyRepository = $insuranceCompanyRepo;
    }

    /**
     * Display a listing of the insuranceCompany.
     * GET|HEAD /insuranceCompanies
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->insuranceCompanyRepository->pushCriteria(new RequestCriteria($request));
        $this->insuranceCompanyRepository->pushCriteria(new LimitOffsetCriteria($request));
        $insuranceCompanies = $this->insuranceCompanyRepository->all();

        return $this->sendResponse($insuranceCompanies->toArray(), 'Insurance Companies retrieved successfully');
    }

    /**
     * Store a newly created insuranceCompany in storage.
     * POST /insuranceCompanies
     *
     * @param CreateinsuranceCompanyAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateinsuranceCompanyAPIRequest $request)
    {
        $input = $request->all();

        $insuranceCompanies = $this->insuranceCompanyRepository->create($input);

        return $this->sendResponse($insuranceCompanies->toArray(), 'Insurance Company saved successfully');
    }

    /**
     * Display the specified insuranceCompany.
     * GET|HEAD /insuranceCompanies/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var insuranceCompany $insuranceCompany */
        $insuranceCompany = $this->insuranceCompanyRepository->findWithoutFail($id);

        if (empty($insuranceCompany)) {
            return $this->sendError('Insurance Company not found');
        }

        return $this->sendResponse($insuranceCompany->toArray(), 'Insurance Company retrieved successfully');
    }

    /**
     * Update the specified insuranceCompany in storage.
     * PUT/PATCH /insuranceCompanies/{id}
     *
     * @param  int $id
     * @param UpdateinsuranceCompanyAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateinsuranceCompanyAPIRequest $request)
    {
        $input = $request->all();

        /** @var insuranceCompany $insuranceCompany */
        $insuranceCompany = $this->insuranceCompanyRepository->findWithoutFail($id);

        if (empty($insuranceCompany)) {
            return $this->sendError('Insurance Company not found');
        }

        $insuranceCompany = $this->insuranceCompanyRepository->update($input, $id);

        return $this->sendResponse($insuranceCompany->toArray(), 'insuranceCompany updated successfully');
    }

    /**
     * Remove the specified insuranceCompany from storage.
     * DELETE /insuranceCompanies/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var insuranceCompany $insuranceCompany */
        $insuranceCompany = $this->insuranceCompanyRepository->findWithoutFail($id);

        if (empty($insuranceCompany)) {
            return $this->sendError('Insurance Company not found');
        }

        $insuranceCompany->delete();

        return $this->sendResponse($id, 'Insurance Company deleted successfully');
    }
}
