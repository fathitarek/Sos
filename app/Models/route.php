<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class route
 * @package App\Models
 * @version November 1, 2017, 3:03 pm UTC
 *
 * @property string route
 * @property integer role_id
 */
class route extends Model
{
    use SoftDeletes;

    public $table = 'routes';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'route',
        'role_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'route' => 'string',
        'role_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'route' => 'required',
        'role_id' => 'required'
    ];
    
    public function role() {
        return $this->belongsTo('App\Models\role');
    }
    
}
