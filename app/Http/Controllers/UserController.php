<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Repositories\userRepository;
use Flash;
use App\User;
use App\Models\role;
use App\Models\insuranceCompany;
class UserController extends Controller
{
    protected $userRepository ;
    public function __construct(userRepository $userRepo)
    {
        $this->userRepository = $userRepo;
        $this->middleware('CheckRoute');
    }
    public function index()
    {
        $users = User::all();
        return view('admin.users.index')->with('users', $users);
    }

    public function create()
    {
        $insuranceCompanies = insuranceCompany::all();
        $roles = role::all();
        return view('admin.users.create')->with('insuranceCompanies', $insuranceCompanies)->with('roles', $roles);
    }

    public function show($id)
    {
        $user = User::find($id);
        return view('admin.users.show')->with('user', $user);
    }
    public function store(CreateUserRequest $request)
    {
        $input = $request->except('insurance');

        $user = $this->userRepository->create($input);

        if($request->insurance){
            $insurance = insuranceCompany::find($request->insurance);
            $insurance->update([
                'user_id' => $user->id
            ]);
        }

        Flash::success('User saved successfully.');

        return redirect(route('users.index'));
    }

    public function edit($id)
    {
        $user = $this->userRepository->findWithoutFail($id);

        if (empty($user)) {
            Flash::error('User not found');

            return redirect(route('users.index'));
        }

        $roles = Role::all();

        return view('admin.users.edit')->with('user', $user)->with('roles', $roles);
    }

    public function update($id, UpdateUserRequest $request)
    {
        $user = $this->userRepository->findWithoutFail($id);
        if (empty($user)) {
            Flash::error('User not found');

            return redirect(route('users.index'));
        }
        if($request->password)
            $user = $this->userRepository->update($request->except(['email' , 'insurance']), $id);
        else
            $user = $this->userRepository->update($request->except(['email' , 'insurance' , 'password']), $id);

        Flash::success('User updated successfully.');

        return redirect(route('users.index'));
    }

    public function destroy($id)
    {
        $user = $this->userRepository->findWithoutFail($id);

        if (empty($user)) {
            Flash::error('User not found');

            return redirect(route('users.index'));
        }

        $this->userRepository->delete($id);

        Flash::success('User deleted successfully.');

        return redirect(route('users.index'));
    }


}
