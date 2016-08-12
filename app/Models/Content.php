<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Content extends Model
{


    public function course() {
    	return $this->hasOne('App\Course');
    }

    public function files() {
    	return $this->belongsToMany('App\FileAttachment');
    }
}
