<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable {

    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'role_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public static $rules = [
        'name' => 'required',
        'email' => 'required|unique:users',
        'password' => 'required|confirmed|min:6'
    ];

    public static $Updaterules = [
        'name' => 'nullable',
        'password' => 'nullable|confirmed|min:6'
    ];

    public function isSuperUser(){
      return $this->role->role == "Super User";
    }

    public function isdoctorAdmin(){
      return $this->role->role == "Doctors Admin";
    }

    public function isCompanyAdmin(){
      return $this->role->role == "Company Manger";
    }

    public function isHrAdmin(){
      return $this->role->role == "HR Admin";
    }

    public function doctors() {
        return $this->hasMany('App\Doctor');
    }

    public function role() {
        return $this->belongsTo('App\Models\role');
    }

    public function insuranceCompany() {
        return $this->hasOne('App\Models\insuranceCompany');
    }

    public function menu(){
      return $this->hasMany(Menu::class);
    }

    public function setPasswordAttribute($value){
        $this->attributes['password'] = bcrypt($value);
    }

//    public function canAccess($requested_route) {
//        //$uri = \Request::path();
//        $requested_route = '/' . $requested_route;
//        //$=array();
//        $my_routes = $this->role->routes;
//        // dd($my_routes);
//        foreach ($my_routes as $route) {
//            //dd ($requested_route);
//            if ($route->route == $requested_route) {
//                return true;
//            }
//        }
//        return false;
//    }

}
