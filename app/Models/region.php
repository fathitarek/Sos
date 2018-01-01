<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class region
 * @package App\Models
 * @version November 1, 2017, 6:32 am UTC
 *
 * @property string name
 * @property string display_name_en
 * @property string display_name_ar
 * @property integer city_id
 */
class region extends Model
{
    use SoftDeletes;

    public $table = 'regions';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'name',
        'display_name_en',
        'display_name_ar',
        'city_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'name' => 'string',
        'display_name_en' => 'string',
        'display_name_ar' => 'string',
        'city_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required',
        'display_name_en' => 'required',
        'display_name_ar' => 'required',
        'city_id' => 'required'
    ];

          public function city() {
      return $this->belongsTo('App\Models\city');
  }
}
