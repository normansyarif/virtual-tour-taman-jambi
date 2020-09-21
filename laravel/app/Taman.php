<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Taman extends Model
{
    protected $table = 'taman';

    public function events() {
    	return $this->hasMany('App\Event', 'taman_id');
    }
}
