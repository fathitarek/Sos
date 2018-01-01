<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatelocationsRequest;
use App\Http\Requests\UpdatelocationsRequest;
use App\Repositories\locationsRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use App\Models\city;
use App\Models\region;
use App\Patient;
use Illuminate\Support\Facades\Auth;

class locationsController extends AppBaseController {

    /** @var  locationsRepository */
    private $locationsRepository;

    public function __construct(locationsRepository $locationsRepo) {
        $this->locationsRepository = $locationsRepo;
          $this->middleware('CheckRoute');
    }

    /**
     * Display a listing of the locations.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request) {

        //return Auth::user();
        $this->locationsRepository->pushCriteria(new RequestCriteria($request));
        $locations = $this->locationsRepository->all();

        return view('locations.index')
                        ->with('locations', $locations);
    }

    /**
     * Show the form for creating a new locations.
     *
     * @return Response
     */
    public function create() {
        $city = city::latest()->pluck('display_name_en', 'id');
        $regions = region::latest()->pluck('display_name_en', 'id');
        $patients = Patient::latest()->pluck('name', 'id');

        return view('locations.create')->with('city', $city)->with('regions', $regions)->with('patients', $patients);
    }

    /**
     * Store a newly created locations in storage.
     *
     * @param CreatelocationsRequest $request
     *
     * @return Response
     */
    public function store(CreatelocationsRequest $request) {
        $input = $request->all();

        $locations = $this->locationsRepository->create($input);

        Flash::success('Locations saved successfully.');

        return redirect(route('locations.index'));
    }

    /**
     * Display the specified locations.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id) {
        $locations = $this->locationsRepository->findWithoutFail($id);

        if (empty($locations)) {
            Flash::error('Locations not found');

            return redirect(route('locations.index'));
        }

        return view('locations.show')->with('locations', $locations);
    }

    /**
     * Show the form for editing the specified locations.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id) {
        $locations = $this->locationsRepository->findWithoutFail($id);
        $city = city::latest()->pluck('display_name_en', 'id');
        $regions = region::latest()->pluck('display_name_en', 'id');
        $patients = Patient::latest()->pluck('name', 'id');
        if (empty($locations)) {
            Flash::error('Locations not found');

            return redirect(route('locations.index'));
        }

        return view('locations.edit')->with('locations', $locations)->with('city', $city)->with('regions', $regions)->with('patients', $patients);
    }

    /**
     * Update the specified locations in storage.
     *
     * @param  int              $id
     * @param UpdatelocationsRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatelocationsRequest $request) {
        $locations = $this->locationsRepository->findWithoutFail($id);

        if (empty($locations)) {
            Flash::error('Locations not found');

            return redirect(route('locations.index'));
        }

        $locations = $this->locationsRepository->update($request->all(), $id);

        Flash::success('Locations updated successfully.');

        return redirect(route('locations.index'));
    }

    /**
     * Remove the specified locations from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id) {
        $locations = $this->locationsRepository->findWithoutFail($id);

        if (empty($locations)) {
            Flash::error('Locations not found');

            return redirect(route('locations.index'));
        }

        $this->locationsRepository->delete($id);

        Flash::success('Locations deleted successfully.');

        return redirect(route('locations.index'));
    }

}
