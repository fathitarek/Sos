<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class menuItems
 * @package App\Models
 * @version November 9, 2017, 7:09 am UTC
 *
 * @property string name
 * @property string display_name
 * @property string url
 * @property integer menu_id
 */
class menuItems extends Model
{
    use SoftDeletes;

    public $table = 'menu_items';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'name',
        'display_name',
        'url',
        'menu_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'name' => 'string',
        'display_name' => 'string',
        'url' => 'string',
        'menu_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required',
        'display_name' => 'required',
        'url' => 'required',
        'menu_id' => 'required'
    ];
       public function menu() {
      return $this->belongsTo('App\Menu');
  }
    
}
