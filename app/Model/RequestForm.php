<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class RequestForm extends Model
{
    protected $table = 'request';

    public function people()
    {
    	return $this->hasMany('App\Model\Lodger', 'form_id', 'id');
    }
}