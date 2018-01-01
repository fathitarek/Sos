<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class setting
 * @package App\Models
 * @version November 8, 2017, 2:02 pm UTC
 *
 * @property string name
 * @property string url
 * @property string logo
 */
class setting extends Model
{
    use SoftDeletes;

    public $table = 'settings';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'name',
        'url',
        'logo'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'name' => 'string',
        'url' => 'string',
        'logo' => 'string|mimes:jpeg,jpg,png'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required',
        'url' => 'required',
        'logo' => 'required'
    ];

    
}
