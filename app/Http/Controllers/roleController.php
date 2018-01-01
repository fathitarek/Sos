<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateroleRequest;
use App\Http\Requests\UpdateroleRequest;
use App\Repositories\roleRepository;
use App\Repositories\routeRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Route;

class roleController extends AppBaseController {

    /** @var  roleRepository */
    private $roleRepository;
    private $routeRepository;

    public function __construct(roleRepository $roleRepo , routeRepository $routeRepo) {
        $this->roleRepository = $roleRepo;
        $this->routeRepository = $routeRepo;
        $this->middleware('CheckRoute');
        // $this->middleware('auth');
        // $this->middleware('doctor.guest');
    }

    /**
     * Display a listing of the role.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request) {
        $this->roleRepository->pushCriteria(new RequestCriteria($request));
        $roles = $this->roleRepository->all();

        return view('roles.index')->with('roles', $roles);
    }

    /**
     * Show the form for creating a new role.
     *
     * @return Response
     */
    public function create() {
        $allRoutes = Route::getRoutes() ;
        $routes = array();
        foreach($allRoutes as $oneRoute){
            if(!is_null($oneRoute->getName()))
                array_push($routes , $oneRoute->getName());
        }
        return view('roles.create' , compact('routes'));
    }

    /**
     * Store a newly created role in storage.
     *
     * @param CreateroleRequest $request
     *
     * @return Response
     */
    public function store(CreateroleRequest $request) {
        $input = $request->except(['role_route']);
        // return $input;
        $logo = uploadFile('logo', public_path() . '/upload');
        if (gettype($logo) === 'string') {

             $input['logo']=$logo;
//return $input;
            $role = $this->roleRepository->create($input);

            $roleRoutes = $request->role_route ;
            if($roleRoutes){
                foreach($roleRoutes as $roleRoute){
                    $this->routeRepository->create([
                        "route" => $roleRoute ,
                        "role_id" => $role->id ,
                    ]);
                }
            }

            Flash::success('Role saved successfully.');

            return redirect(route('roles.index'));
        } else {
            Flash::error('Role Not saved successfully.');

            return redirect(route('roles.index'));
        }
    }

    /**
     * Display the specified role.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id) {
        $role = $this->roleRepository->findWithoutFail($id);

        if (empty($role)) {
            Flash::error('Role not found');

            return redirect(route('roles.index'));
        }

        return view('roles.show')->with('role', $role);
    }

    /**
     * Show the form for editing the specified role.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id) {
        $role = $this->roleRepository->findWithoutFail($id);

        if (empty($role)) {
            Flash::error('Role not found');

            return redirect(route('roles.index'));
        }
        // create Routes Array
        $allRoutes = Route::getRoutes() ;
        $array1 = array();
        foreach($allRoutes as $oneRoute){
            if(!is_null($oneRoute->getName()))
                array_push($array1 , $oneRoute->getName());
        }
        
        // create role routes array
        $roleRoutes = $role->routes ;
        $array2 = array();
        foreach($roleRoutes as $roleRoute){
            array_push($array2 , $roleRoute->route);
        }

        $routes = array_diff($array1, $array2) ;

        return view('roles.edit' , compact('role' , 'routes'));
    }

    /**
     * Update the specified role in storage.
     *
     * @param  int              $id
     * @param UpdateroleRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateroleRequest $request) {
        $role = $this->roleRepository->findWithoutFail($id);

        if (empty($role)) {
            Flash::error('Role not found');

            return redirect(route('roles.index'));
        }

        if(!is_null(Input::file('logo'))){
          $logo = $this->uploadFile('logo',public_path() . '/upload');
         if (gettype($logo) == 'string'){$input['logo'] = $logo;}
        }

        $roleData = $request->except(['role_route']);
        $roleRoutes = $request->role_route ;

        if($roleRoutes){
            foreach($roleRoutes as $roleRoute){
                $this->routeRepository->create([
                    "route" => $roleRoute ,
                    "role_id" => $id ,
                ]);
            }
        }
        $role = $this->roleRepository->update($request->all(), $id);

        Flash::success('Role updated successfully.');

        return redirect(route('roles.index'));
    }


    /**
     * Remove the specified role from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id) {
        $role = $this->roleRepository->findWithoutFail($id);

        if (empty($role)) {
            Flash::error('Role not found');

            return redirect(route('roles.index'));
        }

        $this->roleRepository->delete($id);

        Flash::success('Role deleted successfully.');

        return redirect(route('roles.index'));
    }

}
