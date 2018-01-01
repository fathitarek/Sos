<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class specialty
 * @package App\Models
 * @version November 6, 2017, 11:10 am UTC
 *
 * @property string name_en
 * @property string name_ar
 * @property tinyint published
 * @property tinyint approved
 */
class specialty extends Model
{
    use SoftDeletes;

    public $table = 'specialties';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'name_en',
        'name_ar',
        'published',
        'approved'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'name_en' => 'string',
        'name_ar' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name_en' => 'required',
        'name_ar' => 'required'
    ];

    public function doctor() {
        return $this->hasMany('App\Doctor');
    } 

}
