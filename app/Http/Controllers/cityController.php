<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatecityRequest;
use App\Http\Requests\UpdatecityRequest;
use App\Repositories\cityRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use Illuminate\Support\Facades\Auth;
class cityController extends AppBaseController
{
    /** @var  cityRepository */
    private $cityRepository;

    public function __construct(cityRepository $cityRepo)
    {
        $this->cityRepository = $cityRepo;
        $this->middleware('CheckRoute');
    }

    /**
     * Display a listing of the city.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->cityRepository->pushCriteria(new RequestCriteria($request));
        $cities = $this->cityRepository->all();

        return view('admin.cities.index')
            ->with('cities', $cities);
    }

    /**
     * Show the form for creating a new city.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.cities.create');
    }

    /**
     * Store a newly created city in storage.
     *
     * @param CreatecityRequest $request
     *
     * @return Response
     */
    public function store(CreatecityRequest $request)
    {
        $input = $request->all();

        $city = $this->cityRepository->create($input);

        Flash::success('City saved successfully.');

        return redirect(route('cities.index'));
    }

    /**
     * Display the specified city.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $city = $this->cityRepository->findWithoutFail($id);

        if (empty($city)) {
            Flash::error('City not found');

            return redirect(route('admin.cities.index'));
        }

        return view('admin.cities.show')->with('city', $city);
    }

    /**
     * Show the form for editing the specified city.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $city = $this->cityRepository->findWithoutFail($id);

        if (empty($city)) {
            Flash::error('City not found');

            return redirect(route('admin.cities.index'));
        }

        return view('admin.cities.edit')->with('city', $city);
    }

    /**
     * Update the specified city in storage.
     *
     * @param  int              $id
     * @param UpdatecityRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatecityRequest $request)
    {
        $city = $this->cityRepository->findWithoutFail($id);

        if (empty($city)) {
            Flash::error('City not found');

            return redirect(route('cities.index'));
        }

        $city = $this->cityRepository->update($request->all(), $id);

        Flash::success('City updated successfully.');

        return redirect(route('cities.index'));
    }

    /**
     * Remove the specified city from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $city = $this->cityRepository->findWithoutFail($id);

        if (empty($city)) {
            Flash::error('City not found');

            return redirect(route('cities.index'));
        }

        $this->cityRepository->delete($id);

        Flash::success('City deleted successfully.');

        return redirect(route('cities.index'));
    }
}
