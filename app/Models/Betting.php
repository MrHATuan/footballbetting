<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Betting extends Model
{
    protected $table = 'bettings';
    protected $guarded = [];

    public function matchs() {
    	return $this->belongsTo('App\Models\Match');
    }

    public function users() {
    	return $this->belongsTo('App\Models\User');
    }
}
