<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\Events\DoctorRequested ;
use App\Doctor ;
use App\Patient ;
Route::get('/trigger/{id}', function ($id) {
    $doctor = Doctor::find($id);
    $patient = Patient::find(1);
   // return $patient->id;
    event(new DoctorRequested($doctor , $patient));
});

Route::post('/doctors/accept', 'DoctorController@acceptVisit');
Route::post('/doctors/cancel', 'DoctorController@cancelVisit');


Route::get('/', function () {
    //return view('welcome');
    return view('public.home');
});



Route::get('/doctor/registered', function () {
    //return view('welcome');
    return view('public.doctor.successfullRegisteration');
});

Route::get('/welcome', 'HomeController@homeEn');
Route::get('/switchLanguage/{lang}', 'HomeController@switchLang')->name('switch');
//Route::get('/ar', 'HomeController@homeAr');

Route::get('/register-now' , function(){
    return view('public.en.register-now');
});

// Route::get('/en/register-now' , function(){
//     return view('public.en.register-now');
// });

Route::get('admin/doctors/filter', 'DoctorController@filter')->name('doctors.filter');
Route::resource('admin/doctors','DoctorController');

Route::get('/home', 'HomeController@index')->name('home');

  Auth::routes();

//Route::group(['prefix' => 'admin'], function () {
//  Route::get('/login', 'AdminAuth\LoginController@showLoginForm')->name('admin.login');
//  Route::post('/login', 'AdminAuth\LoginController@login');
//  Route::post('/logout', 'AdminAuth\LoginController@logout')->name('admin.logout');
//
//  Route::get('/register', 'AdminAuth\RegisterController@showRegistrationForm')->name('admin.register');
//  Route::post('/register', 'AdminAuth\RegisterController@register');
//
//  Route::post('/password/email', 'AdminAuth\ForgotPasswordController@sendResetLinkEmail')->name('admin.password.request');
//  Route::post('/password/reset', 'AdminAuth\ResetPasswordController@reset')->name('admin.password.email');
//  Route::get('/password/reset', 'AdminAuth\ForgotPasswordController@showLinkRequestForm')->name('admin.password.reset');
//  Route::get('/password/reset/{token}', 'AdminAuth\ResetPasswordController@showResetForm');
//
//});

// Route::group(['prefix' => '/ar/doctor'], function () {
//   Route::get('register', 'DoctorAuth\RegisterController@showArabicRegistrationForm')->name('doctor.arabic.register');
//   Route::post('register', 'DoctorAuth\RegisterController@register');
// });

Route::group(['prefix' => 'doctor'], function () {
  Route::get('/login', 'DoctorAuth\LoginController@showLoginForm')->name('doctor.login');
  Route::post('/login', 'DoctorAuth\LoginController@login');
  Route::post('/logout', 'DoctorAuth\LoginController@logout')->name('doctor.logout');

  Route::get('/register', 'DoctorAuth\RegisterController@showRegistrationForm')->name('doctor.register');
  Route::post('/register', 'DoctorAuth\RegisterController@register');

  Route::post('/password/email', 'DoctorAuth\ForgotPasswordController@sendResetLinkEmail')->name('doctor.password.request');
  Route::post('/password/reset', 'DoctorAuth\ResetPasswordController@reset')->name('doctor.password.email');
  Route::get('/password/reset', 'DoctorAuth\ForgotPasswordController@showLinkRequestForm')->name('doctor.password.reset');
  Route::get('/password/reset/{token}', 'DoctorAuth\ResetPasswordController@showResetForm');

  Route::post('/accept', 'DoctorController@acceptVisit');
  Route::post('/cancel', 'DoctorController@cancelVisit');

    Route::get('/rate', function () {
    return view('public.doctor.rateLast');
});

Route::get('/visits', function () {
    //return view('welcome');
    return view('public.doctor.visits');
});

});

Route::group(['prefix' => 'patient'], function () {
  Route::get('/login', 'PatientAuth\LoginController@showLoginForm')->name('patient.login');
  Route::post('/login', 'PatientAuth\LoginController@login');
  Route::post('/logout', 'PatientAuth\LoginController@logout')->name('patient.logout');

  Route::get('/register', 'PatientAuth\RegisterController@showRegistrationForm')->name('patient.register');
  Route::post('/register', 'PatientAuth\RegisterController@register');

  Route::post('/password/email', 'PatientAuth\ForgotPasswordController@sendResetLinkEmail')->name('patient.password.request');
  Route::post('/password/reset', 'PatientAuth\ResetPasswordController@reset')->name('patient.password.email');
  Route::get('/password/reset', 'PatientAuth\ForgotPasswordController@showLinkRequestForm')->name('patient.password.reset');
  Route::get('/password/reset/{token}', 'PatientAuth\ResetPasswordController@showResetForm');
  Route::post('/requestDoctor', 'PatientController@requestDoctor');
  Route::get('/showRequestForm', 'PatientController@showRequestForm');

  Route::get('/cancelDoctor', 'PatientController@cancelVisit');

Route::get('/registered', function () {
    //return view('welcome');
    return view('public.patient.successfullRegisteration');
});

Route::get('/book', function () {
    return view('public.patient.bookAppointment');
});

Route::get('/doctorCanceled', function () {
    return view('public.patient.doctorCanceled');
});

Route::get('/cancel', function () {
    return view('public.patient.cancel');
});



Route::get('/sosed', function () {
    return view('public.patient.sosed');
});

Route::get('/visits', function () {
    //return view('welcome');
    return view('public.patient.visits');
});

Route::get('/rate', function () {
    return view('public.patient.rateLast');
});

});

Auth::routes();

//Route::get('/home', 'HomeController@index');


Route::resource('admin/users', 'UserController');

Route::resource('admin/cities', 'cityController');

Route::resource('admin/regions', 'regionController');



Route::resource('locations', 'locationsController');

Route::resource('roles', 'roleController');

Route::resource('routes', 'routeController');

Route::resource('specialties', 'specialtyController');

Route::resource('employers', 'employerController');

Route::resource('/admin/patients', 'PatientController');

Route::resource('insuranceCompanies', 'insuranceCompanyController');

Route::resource('/admin/menus','MenuController');

Route::get('/firebase/{id}','FirebaseController@index');

Route::get('/create-firebase/','FirebaseController@create');

Route::post('/filter-firebase/{id}','FirebaseController@filter');

Route::get('/event',function(){

});


Route::resource('settings', 'settingController');

Route::resource('menuItems', 'menuItemsController');

Route::post('/insurance_add_manger/{id}', 'insuranceCompanyController@add_manger')->name('add.manger');
Route::post('/insurance_remove_manger/{id}', 'insuranceCompanyController@remove_manger')->name('remove.manger');


Route::resource('visits', 'visitController');
