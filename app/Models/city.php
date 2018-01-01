<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class city
 * @package App\Models
 * @version October 31, 2017, 1:02 pm UTC
 *
 * @property string name
 * @property string display_name_en
 * @property string display_name_ar
 */
class city extends Model
{
    use SoftDeletes;

    public $table = 'cities';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'name',
        'display_name_en',
        'display_name_ar'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'name' => 'string',
        'display_name_en' => 'string',
        'display_name_ar' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required',
        'display_name_en' => 'required',
        'display_name_ar' => 'required'
    ];

    public function regions() {
      return $this->hasMany('App\Models\region');
    } 
}
