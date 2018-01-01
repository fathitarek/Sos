<?php

namespace App;

use Laravel\Passport\HasApiTokens;
use App\Notifications\PatientResetPassword;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\User ;

class Patient extends Authenticatable
{
    use HasApiTokens , Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','gender','address','mobile','card_type','card_name','number_expiry_date',
        'national_id','active','personal_image','approved_terms','user_id','remember_token'

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
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new PatientResetPassword($token));
    }

    public function user()
    {
      return $this->belongsTo('App\User');
    }

    public function mangedBy(User $user)
    {
        if($this->user)
          return $user == $this->user ;
    }
}
