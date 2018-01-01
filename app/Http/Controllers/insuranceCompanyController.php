<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateinsuranceCompanyRequest;
use App\Http\Requests\UpdateinsuranceCompanyRequest;
use App\Repositories\insuranceCompanyRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use App\User ;
use Response;
use App\Models\insuranceCompany ;

class insuranceCompanyController extends AppBaseController {

    /** @var  insuranceCompanyRepository */
    private $insuranceCompanyRepository;

    public function __construct(insuranceCompanyRepository $insuranceCompanyRepo) {
        $this->insuranceCompanyRepository = $insuranceCompanyRepo;
        $this->middleware('CheckRoute');
        $this->middleware('manger' , [ 'only' =>['show' , 'edit' , 'update' , 'delete']]);
    }

    /**
     * Display a listing of the insuranceCompany.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request) {
        $this->insuranceCompanyRepository->pushCriteria(new RequestCriteria($request));
        $insuranceCompanies = $this->insuranceCompanyRepository->all();

        return view('insurance_companies.index')
                        ->with('insuranceCompanies', $insuranceCompanies);
    }

    /**
     * Show the form for creating a new insuranceCompany.
     *
     * @return Response
     */
    public function create() {
        return view('insurance_companies.create');
    }

    /**
     * Store a newly created insuranceCompany in storage.
     *
     * @param CreateinsuranceCompanyRequest $request
     *
     * @return Response
     */
    public function store(CreateinsuranceCompanyRequest $request) {
        $request = setCheckbox($request, 'approved');
        $request = setCheckbox($request, 'published');
        $input = $request->except(['approved' , 'published']);

        $insuranceCompany = $this->insuranceCompanyRepository->create($input);

        Flash::success('Insurance Company saved successfully.');

        return redirect(route('insuranceCompanies.index'));
    }

    /**
     * Display the specified insuranceCompany.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id) {
        $insuranceCompany = $this->insuranceCompanyRepository->findWithoutFail($id);
        if (empty($insuranceCompany)) {
            Flash::error('Insurance Company not found');

            return redirect(route('insuranceCompanies.index'));
        }

        return view('insurance_companies.show')->with('insuranceCompany', $insuranceCompany);
    }

    /**
     * Show the form for editing the specified insuranceCompany.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id) {
        $insuranceCompany = $this->insuranceCompanyRepository->findWithoutFail($id);

        if (empty($insuranceCompany)) {
            Flash::error('Insurance Company not found');

            return redirect(route('insuranceCompanies.index'));
        }

          $users = User::all();

        return view('insurance_companies.edit')->with('insuranceCompany', $insuranceCompany)->with('users', $users);
    }

    /**
     * Update the specified insuranceCompany in storage.
     *
     * @param  int              $id
     * @param UpdateinsuranceCompanyRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateinsuranceCompanyRequest $request) {
        $insuranceCompany = $this->insuranceCompanyRepository->findWithoutFail($id);
        $insuranceCompany = updateCheckbox($request, $insuranceCompany, 'approved');
        $insuranceCompany = updateCheckbox($request, $insuranceCompany, 'published');
        //return $insuranceCompany;
        if (empty($insuranceCompany)) {
            Flash::error('Insurance Company not found');

            return redirect(route('insuranceCompanies.index'));
        }

        // if($request->remove_manger == "on"){
        //     $request->user_id = null ;
        //     $insuranceCompany = $this->insuranceCompanyRepository->update($request->except(['approved' , 'published']), $id);
        // }
        // else{
        //     $insuranceCompany = $this->insuranceCompanyRepository->update($request->except(['approved' , 'published' , 'user_id']), $id);
        // }

        $insuranceCompany = $this->insuranceCompanyRepository->update($request->except(['approved' , 'published']), $id);

        Flash::success('Insurance Company updated successfully.');

        return redirect(route('insuranceCompanies.index'));
    }

    /**
     * Remove the specified insuranceCompany from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $insuranceCompany = insuranceCompany::findWithoutFail($id);

        if (empty($insuranceCompany)) {
            Flash::error('Insurance Company not found');

            return redirect(route('insuranceCompanies.index'));
        }

        $this->insuranceCompanyRepository->delete($id);

        Flash::success('Insurance Company deleted successfully.');

        return redirect(route('insuranceCompanies.index'));
    }

    public function add_manger(Request $request , $id)
    {
      $insuranceCompany = $this->insuranceCompanyRepository->findWithoutFail($id);

      if (empty($insuranceCompany)) {
          Flash::error('Insurance Company not found');

          return redirect(route('insuranceCompanies.index'));
      }

      $insuranceCompany->update([
          'user_id' => $request->manger ,
      ]);

      return redirect(route('insuranceCompanies.index'));

    }

    public function remove_manger(Request $request , $id)
    {
      $insuranceCompany = $this->insuranceCompanyRepository->findWithoutFail($id);

      if (empty($insuranceCompany)) {
          Flash::error('Insurance Company not found');

          return redirect(route('insuranceCompanies.index'));
      }

      $insuranceCompany->update([
          'user_id' => null  ,
      ]);

      return redirect(route('insuranceCompanies.index'));

    }

}
