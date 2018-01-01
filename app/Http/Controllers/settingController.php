<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatesettingRequest;
use App\Http\Requests\UpdatesettingRequest;
use App\Repositories\settingRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use Illuminate\Support\Facades\Input;

class settingController extends AppBaseController {

    /** @var  settingRepository */
    private $settingRepository;

    public function __construct(settingRepository $settingRepo) {
        $this->settingRepository = $settingRepo;
        $this->middleware('CheckRoute');
    }

    /**
     * Display a listing of the setting.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request) {
        $this->settingRepository->pushCriteria(new RequestCriteria($request));
        $settings = $this->settingRepository->all();
        return view('settings.index')->with('settings', $settings);
    }

    /**
     * Show the form for creating a new setting.
     *
     * @return Response
     */
    public function create() {
        return view('settings.create');
    }

    /**
     * Store a newly created setting in storage.
     *
     * @param CreatesettingRequest $request
     *
     * @return Response
     */
    public function store(CreatesettingRequest $request) {
        $logo = uploadFile('logo', public_path() . '/upload');
        if (gettype($logo) === 'string') {
            $input = $request->all();
            $input['logo'] = $logo;


            $setting = $this->settingRepository->create($input);

            Flash::success('Setting saved successfully.');

            return redirect(route('settings.index'));
        } else {
            Flash::error('Setting not saved.');

            return redirect(route('settings.index'));
        }
    }

    /**
     * Display the specified setting.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id) {
        $setting = $this->settingRepository->findWithoutFail($id);

        if (empty($setting)) {
            Flash::error('Setting not found');

            return redirect(route('settings.index'));
        }

        return view('settings.show')->with('setting', $setting);
    }

    /**
     * Show the form for editing the specified setting.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id) {
        $setting = $this->settingRepository->findWithoutFail($id);

        if (empty($setting)) {
            Flash::error('Setting not found');

            return redirect(route('settings.index'));
        }

        return view('settings.edit')->with('setting', $setting);
    }

    /**
     * Update the specified setting in storage.
     *
     * @param  int              $id
     * @param UpdatesettingRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatesettingRequest $request) {
        $setting = $this->settingRepository->findWithoutFail($id);
        if (empty($setting)) {
            Flash::error('Setting not found');
            return redirect(route('settings.index'));
        }
        if (!is_null(Input::file('logo'))) {
            $logo = $this->uploadFile('logo', public_path() . '/upload');
            if (gettype($logo) == 'string') {
                $input['logo'] = $logo;
            }
        }
        $setting = $this->settingRepository->update($request->all(), $id);

        Flash::success('Setting updated successfully.');

        return redirect(route('settings.index'));
    }

    /**
     * Remove the specified setting from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id) {
        $setting = $this->settingRepository->findWithoutFail($id);
        if (empty($setting)) {
            Flash::error('Setting not found');
            return redirect(route('settings.index'));
        }
        $this->settingRepository->delete($id);
        Flash::success('Setting deleted successfully.');
        return redirect(route('settings.index'));
    }

}
