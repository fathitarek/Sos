<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class employer
 * @package App\Models
 * @version November 6, 2017, 11:45 am UTC
 *
 * @property string name
 * @property string address
 * @property string email
 * @property string contact_person
 * @property string mobile
 * @property tinyint published
 * @property tinyint approved
 */
class employer extends Model
{
    use SoftDeletes;

    public $table = 'employers';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'name',
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
        'email' => 'required |email',
        'contact_person' => 'required',
        'mobile' => 'required'
    ];

    
}
