<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $table = 'events';

    public function taman() {
    	return $this->belongsTo('App\Taman', 'taman_id');
    }
}
