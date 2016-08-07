<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    public function quest() {
  		return $this->belongsTo('App\Quest');
    }

    public function user() {
    	return $this->belongsTo('App\Models\Access\User');
    }
    
}
