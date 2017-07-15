<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
    //
    public function meetplace()
    {
    	return $this->hasOne('App\Model\Meetplace', 'pid');
    }
}
