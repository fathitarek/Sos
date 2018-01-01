<?php

namespace App\Http\Controllers\PatientAuth;

use App\Patient;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use App\Models\city;
use App\Models\region ;

class RegisterController extends Controller {
    /*
      |--------------------------------------------------------------------------
      | Register Controller
      |--------------------------------------------------------------------------
      |
      | This controller handles the registration of new users as well as their
      | validation and creation. By default this controller uses a trait to
      | provide this functionality without requiring any additional code.
      |
     */

use RegistersUsers;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/patient/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('patient.guest');
    }

    /*
      function uploadFile($field_name, $destination) {
      if (!is_null(Input::file($field_name))) {
      $file = Input::file($field_name)->getClientOriginalName();

      $input[$field_name] = $file;

      $file1 = Input::file($field_name);

      $uploadSuccess = $file1->move($destination, $file);
      return $file;
      } else {
      return false;
      }
      } */

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data) {
        return Validator::make($data, [
                    'name' => 'required|max:255',
                    'email' => 'required|email|max:255|unique:patients',
                    'password' => 'required|min:6|confirmed',
                    'gender' => 'required',
                    'address' => 'required',
                    'mobile' => 'required',
                    'card_type' => 'required',
                    'card_name' => 'required',
                    'number_expiry_date' => 'required',
                    'national_id' => 'required',
                    'personal_image' => 'required',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return Patient
     */
    protected function create(array $data) {
        // $upload_image_national_id = $this->uploadFile('image_national_id', public_path() . '/upload');
        $upload_personal_image = uploadFile('personal_image', public_path() . '/upload');
        //  $upload_front_medical_syndicate_card = $this->uploadFile('front_medical_syndicate_card', public_path() . '/upload');
        // $upload_back_medical_syndicate_card = $this->uploadFile('back_medical_syndicate_card', public_path() . '/upload');
        if (gettype($upload_personal_image) === 'string') {
            return Patient::create([
                        'name' => $data['name'],
                        'email' => $data['email'],
                        'password' => bcrypt($data['password']),
                        'gender' => $data['gender'],
                        'address' => $data['address'],
                        'mobile' => $data['mobile'],
                        'card_type' => $data['card_type'],
                        'card_name' => $data['card_name'],
                        'number_expiry_date' => $data['number_expiry_date'],
                        'national_id' => $data['national_id'],
                        'active' => 0,
                        'personal_image' => $upload_personal_image,
                        'approved_terms' => 0,
                        'user_id' => 0,
                        'remember_token' => $data['remember_token'],
            ]);
        } else {
            $this->showRegistrationForm();
        }
    }

    /**
     * Show the application registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showRegistrationForm() {
        $regions = region::all();
        $cities = city::all();
        //dd($cities);
        return view('patient.auth.register')->with('cities' , $cities)->with('regions' , $regions);
    }

    /**
     * Get the guard to be used during registration.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard() {
        return Auth::guard('patient');
    }

}
