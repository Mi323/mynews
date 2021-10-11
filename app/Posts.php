<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    protected $guarded = array('id');

    public static $rules = array(
        'posts_id' => 'required',
        'greeting' => 'required',
    );
    
      public function histories()
    {
        return $this->hasMany('App\Posts');

    }
}
