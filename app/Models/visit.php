<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class visit
 * @package App\Models
 * @version November 26, 2017, 2:21 pm UTC
 *
 * @property integer patient_id
 * @property integer doctor_id
 * @property time start_time
 * @property time end_time
 * @property integer status
 * @property string charage
 */
class visit extends Model
{
    use SoftDeletes;

    public $table = 'visits';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'patient_id',
        'doctor_id',
        'start_time',
        'end_time',
        'status',
        'charage'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'patient_id' => 'integer',
        'doctor_id' => 'integer',
        'status' => 'integer',
        'charage' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'patient_id' => 'required',
        'doctor_id' => 'required',
        'start_time' => 'required',
        'end_time' => 'required',
        'status' => 'required'
    ];

    
}
