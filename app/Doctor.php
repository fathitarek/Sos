<?php

namespace App;

use Laravel\Passport\HasApiTokens;
use App\Notifications\DoctorResetPassword;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Doctor extends Authenticatable {

    use HasApiTokens , Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'gender', 'address', 'mobile', 'card_type', 'card_name', 'number_expiry_date', 'medical_syndicate'
        , 'date_medical_syndicate_id', 'license_ministry_health_id', 'ccv', 'national_id', 'image_national_id', 'specialty_id',
        'active', 'approved', 'verify', 'rejected', 'pending', 'approved_terms', 'user_id', 'remember_token','personal_photo','back_medical_syndicate',
        'front_medical_syndicate','card_number','back_national_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Send the password reset notification.
     *
     * @param  string  $token
     * @return void
     */
    public function sendPasswordResetNotification($token) {
        $this->notify(new DoctorResetPassword($token));
    }

    public function user() {
        return $this->belongsTo('App\User');
    }

    public function role() {
        return $this->belongsTo('App\Models\role');
    }
    
    
   public function specialty() {
        return $this->belongsTo('App\Models\specialty');
    } 
    
    public function isActive() {
        return $this->active==1?true:false;
    }

}
