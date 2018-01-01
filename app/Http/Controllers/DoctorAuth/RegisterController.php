<?php

namespace App\Http\Controllers\DoctorAuth;

use App\Doctor;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Auth;
//use Illuminate\Support\Facades\Input;
use App\Models\specialty;
use App\Http\Controllers\GeneralClass;

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
    protected $redirectTo = '/doctor/home';
    public $database;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('doctor.guest');
        $firebase = GeneralClass::firebaseGenral();
        $this->database = $firebase->getDatabase();
    }

    /* function uploadFile($field_name, $destination) {
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
        $validator =  Validator::make($data, [
                    'name' => 'required|max:255',
                    'email' => 'required|email|max:255|unique:doctors',
                    'password' => 'required|min:6|confirmed',
                    'gender' => 'required',
                    'address' => 'required',
                    'mobile' => 'required',
                    'card_type' => 'required',
                    'card_name' => 'required',
                    'number_expiry_date' => 'required|date_format:Y-m-d|after:today',
                    'medical_syndicate' => 'required',
                    'date_medical_syndicate_id' => 'required|date_format:Y-m-d|before:today',
                    'license_ministry_health_id' => 'required',
                    'ccv' => 'required|digits_between:3,4',
                    'national_id' => 'required|unique:doctors|integer',
                    'back_national_id' => 'required|image',
                    'image_national_id' => 'required|image',
                    'specialty_id' => 'required',
                    'front_medical_syndicate' => 'required|image',
                    'back_medical_syndicate' => 'required|image',
                    'personal_photo' => 'required|image',
                    'card_number' => 'required|digits_between:13,16',
        ]);
        return $validator ;
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return Doctor
     */
    protected function create(array $data) {
        // return $data;
        //$upload_file= new Controller();
        $upload = uploadFile('image_national_id', public_path() . '/upload');
        $back_national_id = uploadFile('back_national_id', public_path() . '/upload');
        $front_medical_syndicate = uploadFile('front_medical_syndicate', public_path() . '/upload');
        $back_medical_syndicate = uploadFile('back_medical_syndicate', public_path() . '/upload');
        $personal_photo = uploadFile('personal_photo', public_path() . '/upload');
        if (gettype($upload) === 'string' && gettype($back_national_id) === 'string' && $data['approved_terms'] === '1' && isset($data['approved_terms']) && gettype($front_medical_syndicate) === 'string' && gettype($back_medical_syndicate) === 'string' && gettype($personal_photo) === 'string') {


            $user = Doctor::create([
                        'name' => $data['name'],
                        'email' => $data['email'],
                        'password' => bcrypt($data['password']),
                        'gender' => $data['gender'],
                        'address' => $data['address'],
                        'mobile' => $data['mobile'],
                        'card_type' => $data['card_type'],
                        'card_name' => $data['card_name'],
                        'card_number' => $data['card_number'],
                        'number_expiry_date' => $data['number_expiry_date'],
                        'medical_syndicate' => $data['medical_syndicate'],
                        'date_medical_syndicate_id' => $data['date_medical_syndicate_id'],
                        'license_ministry_health_id' => $data['license_ministry_health_id'],
                        'ccv' => $data['ccv'],
                        'national_id' => $data['national_id'],
                        'image_national_id' => $upload,
                        'back_national_id' => $back_national_id,
                        'front_medical_syndicate' => $front_medical_syndicate,
                        'back_medical_syndicate' => $back_medical_syndicate,
                        'personal_photo' => $personal_photo,
                        'specialty_id' => $data['specialty_id'],
                        'active' => 0,
                        'approved' => 0,
                        'verify' => 0,
                        'rejected' => 0,
                        'pending' => 0,
                        'approved_terms' => $data['approved_terms'],
                        'user_id' => 0,
                        'remember_token' => $data['remember_token'],
            ]);
            $reference = $this->database->getReference('users/' . $user->id);
            $reference->set([
                "name" => $data['name'],
                "latitude" => 0,
                "longitude" => 0,
                "specialty_id" => $data['specialty_id']
            ]);
            return $user;
        } else {
            $message = "You do somthing wrong";
            //return dd($message);
            $specialty = specialty::latest()->where('published', 1)->where('approved', 1)->pluck('name_en', 'id');
            return view('doctor.auth.register')->with('specialty', $specialty)->with('message', $message);
        }
    }

    /**
     * Show the application registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showRegistrationForm() {
      $locale = app()->getLocale();

      if($locale == "en")
      {
        $specialty = specialty::latest()->where('published', 1)->where('approved', 1)->pluck('name_en', 'id');
      }

      else if($locale == "ar")
      {
        $specialty = specialty::latest()->where('published', 1)->where('approved', 1)->pluck('name_ar', 'id');
      }

      return view('doctor.auth.register')->with('specialty', $specialty);
    }

    // public function showArabicRegistrationForm() {
    //     $specialty = specialty::latest()->where('published', 1)->where('approved', 1)->pluck('name_ar', 'id');
    //     return view('doctor.auth.arabic.register')->with('specialty', $specialty);
    // }

    /**
     * Get the guard to be used during registration.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard() {
        return Auth::guard('doctor');
    }



//      Validate Credit Card
    function validateCreditCard($number)
    {

        // Strip any non-digits (useful for credit card numbers with spaces and hyphens)
        $number=preg_replace('/\D/', '', $number);

        // Set the string length and parity
        $number_length=strlen($number);
        $parity=$number_length % 2;

        // Loop through each digit and do the maths
        $total=0;
        for ($i=0; $i<$number_length; $i++) {
          $digit=$number[$i];
          // Multiply alternate digits by two
          if ($i % 2 == $parity) {
            $digit*=2;
            // If the sum is two digits, add them together (in effect)
            if ($digit > 9) {
              $digit-=9;
            }
          }
          // Total up the digits
          $total+=$digit;
        }

        // If the total mod 10 equals 0, the number is valid
        return ($total % 10 == 0) ? TRUE : FALSE;

}



}
