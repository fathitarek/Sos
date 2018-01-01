<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class locations
 * @package App\Models
 * @version November 1, 2017, 11:14 am UTC
 *
 * @property string name
 * @property string address
 * @property string phone
 * @property string latitude
 * @property string longitude
 * @property integer city_id
 * @property integer region_id
 * @property integer patient_id
 */
class locations extends Model {

    use SoftDeletes;

    public $table = 'locations';
    protected $dates = ['deleted_at'];
    public $fillable = [
        'name',
        'address',
        'phone',
        'latitude',
        'longitude',
        'city_id',
        'region_id',
        'patient_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'name' => 'string',
        'address' => 'string',
        'phone' => 'string',
        'latitude' => 'string',
        'longitude' => 'string',
        'region_id' => 'integer',
        'patient_id' => 'integer',
        'city_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required',
        'address' => 'required',
        'phone' => 'required',
        'latitude' => 'required',
        'longitude' => 'required',
        'city_id' => 'required',
        'region_id' => 'required',
        'patient_id' => 'required'
    ];

    public function city() {
        return $this->belongsTo('App\Models\city');
    }

    public function region() {
        return $this->belongsTo('App\Models\region');
    }
    public function patient() {
        return $this->belongsTo('App\Patient');
    }

}
