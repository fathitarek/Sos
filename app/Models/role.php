<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class role
 * @package App\Models
 * @version November 1, 2017, 2:56 pm UTC
 *
 * @property string role
 * @property string description
 * @property string logo
 */
class role extends Model
{
    use SoftDeletes;

    public $table = 'roles';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'role',
        'description',
        'logo'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'role' => 'string',
        'description' => 'string',
        'logo' => 'string|mimes:jpeg,jpg,png'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'role' => 'required',
        'description' => 'required',
        'logo' => 'required'
    ];
        public function routes() {
            return $this->hasMany('App\Models\route');
        }
    
}
