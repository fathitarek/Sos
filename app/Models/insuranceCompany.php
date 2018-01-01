<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class insuranceCompany
 * @package App\Models
 * @version November 6, 2017, 1:13 pm UTC
 *
 * @property string name
 * @property string address
 * @property string email
 * @property string contact_person
 * @property string mobile
 */
class insuranceCompany extends Model
{
    use SoftDeletes;

    public $table = 'insurance_companies';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'name',
        'user_id',
        'address',
        'email',
        'contact_person',
        'mobile',
        'published',
        'approved'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'name' => 'string',
        'address' => 'string',
        'email' => 'string',
        'contact_person' => 'string',
        'mobile' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required',
        'address' => 'required',
        'email' => 'required | email',
        'contact_person' => 'required',
        'mobile' => 'required'
    ];

    public function manger()
    {
        return $this->belongsTo('\App\User', 'user_id', 'id');        
    }

    public function ownedBy($user)
    {
        if($this->manger->id == $user->id)
            return true ;
        else 
            return false ;
    }

    
}
