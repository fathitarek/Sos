<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatespecialtyRequest;
use App\Http\Requests\UpdatespecialtyRequest;
use App\Repositories\specialtyRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class specialtyController extends AppBaseController {

    /** @var  specialtyRepository */
    private $specialtyRepository;

    public function __construct(specialtyRepository $specialtyRepo) {
        $this->specialtyRepository = $specialtyRepo;
        $this->middleware('CheckRoute');
    }

    /**
     * Display a listing of the specialty.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request) {
        $this->specialtyRepository->pushCriteria(new RequestCriteria($request));
        $specialties = $this->specialtyRepository->all();

        return view('specialties.index')->with('specialties', $specialties);
    }

    /**
     * Show the form for creating a new specialty.
     *
     * @return Response
     */
    public function create() {
        return view('specialties.create');
    }

    /**
     * Store a newly created specialty in storage.
     *
     * @param CreatespecialtyRequest $request
     *
     * @return Response
     */
    public function store(CreatespecialtyRequest $request) {
        $request = setCheckbox($request, 'approved');
        $request = setCheckbox($request, 'published');
        $input = $request->all();
       // return $input;
     
        $specialty = $this->specialtyRepository->create($input);

        Flash::success('Specialty saved successfully.');

        return redirect(route('specialties.index'));
    }

    /**
     * Display the specified specialty.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id) {
        $specialty = $this->specialtyRepository->findWithoutFail($id);

        if (empty($specialty)) {
            Flash::error('Specialty not found');

            return redirect(route('specialties.index'));
        }

        return view('specialties.show')->with('specialty', $specialty);
    }

    /**
     * Show the form for editing the specified specialty.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id) {
        $specialty = $this->specialtyRepository->findWithoutFail($id);

        if (empty($specialty)) {
            Flash::error('Specialty not found');

            return redirect(route('specialties.index'));
        }

        return view('specialties.edit')->with('specialty', $specialty);
    }

    /**
     * Update the specified specialty in storage.
     *
     * @param  int              $id
     * @param UpdatespecialtyRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatespecialtyRequest $request) {
        $specialty = $this->specialtyRepository->findWithoutFail($id);
        $specialty = updateCheckbox($request, $specialty, 'approved');
        $specialty = updateCheckbox($request, $specialty, 'published');
        if (empty($specialty)) {
            Flash::error('Specialty not found');

            return redirect(route('specialties.index'));
        }

        $specialty = $this->specialtyRepository->update($request->all(), $id);

        Flash::success('Specialty updated successfully.');

        return redirect(route('specialties.index'));
    }

    /**
     * Remove the specified specialty from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id) {
        $specialty = $this->specialtyRepository->findWithoutFail($id);

        if (empty($specialty)) {
            Flash::error('Specialty not found');

            return redirect(route('specialties.index'));
        }

        $this->specialtyRepository->delete($id);

        Flash::success('Specialty deleted successfully.');

        return redirect(route('specialties.index'));
    }

}
