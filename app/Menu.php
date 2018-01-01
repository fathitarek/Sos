<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
  protected $fillable = [
      'name', 'display_name','description','published','url'

  ];

public function user(){
  return $this->belongsTo(User::class);
}
public function static_page(){
  return $this->hasMany(StaticPage::class);
}
     public function menuItems() {
      return $this->hasMany('App\Models\menuItems');
  }
}
