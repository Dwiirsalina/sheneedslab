<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class RequestForm extends Model
{
    protected $table = 'request';
    protected $primaryKey = 'id';
    public $incrementing = true;
    public $timestamp = true;

    public function category(){
    	return $this->hasOne('App\Model\Category', 'id', 'id');
    }

    public function lodgers(){
    	return $this->hasMany('App\Model\Lodger', 'request_id', 'id');
    }

    public function statuss(){
    	return $this->hasMany('App\Model\Status', 'request_id', 'id');
    }

}