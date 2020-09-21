<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Partisipasi extends Model
{
    protected $table = 'partisipasi';

    public function user() {
    	return $this->belongsTo('App\User', 'user_id');
    }

}
