<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateregionRequest;
use App\Http\Requests\UpdateregionRequest;
use App\Repositories\regionRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use App\Models\city;
class regionController extends AppBaseController
{
    /** @var  regionRepository */
    private $regionRepository;

    public function __construct(regionRepository $regionRepo)
    {
        $this->regionRepository = $regionRepo;
         $this->middleware('CheckRoute');
    }

    /**
     * Display a listing of the region.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->regionRepository->pushCriteria(new RequestCriteria($request));
        $regions = $this->regionRepository->all();

        return view('admin.regions.index')
            ->with('regions', $regions);
    }

    /**
     * Show the form for creating a new region.
     *
     * @return Response
     */
    public function create()
    {
        $city = city::latest()->pluck('display_name_en','id');
      //  return $city;
        return view('admin.regions.create')->with('city', $city);
    }

    /**
     * Store a newly created region in storage.
     *
     * @param CreateregionRequest $request
     *
     * @return Response
     */
    public function store(CreateregionRequest $request)
    {
        $input = $request->all();

        $region = $this->regionRepository->create($input);

        Flash::success('Region saved successfully.');

        return redirect(route('regions.index'));
    }

    /**
     * Display the specified region.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $region = $this->regionRepository->findWithoutFail($id);

        if (empty($region)) {
            Flash::error('Region not found');

            return redirect(route('regions.index'));
        }

        return view('admin.regions.show')->with('region', $region);
    }

    /**
     * Show the form for editing the specified region.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $region = $this->regionRepository->findWithoutFail($id);
        $city = city::latest()->pluck('display_name_en','id');

        if (empty($region)) {
            Flash::error('Region not found');

            return redirect(route('regions.index'));
        }

        return view('admin.regions.edit')->with('region', $region)->with('city', $city);
    }

    /**
     * Update the specified region in storage.
     *
     * @param  int              $id
     * @param UpdateregionRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateregionRequest $request)
    {
        $region = $this->regionRepository->findWithoutFail($id);

        if (empty($region)) {
            Flash::error('Region not found');

            return redirect(route('regions.index'));
        }

        $region = $this->regionRepository->update($request->all(), $id);

        Flash::success('Region updated successfully.');

        return redirect(route('regions.index'));
    }

    /**
     * Remove the specified region from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $region = $this->regionRepository->findWithoutFail($id);

        if (empty($region)) {
            Flash::error('Region not found');

            return redirect(route('regions.index'));
        }

        $this->regionRepository->delete($id);

        Flash::success('Region deleted successfully.');

        return redirect(route('regions.index'));
    }
}
