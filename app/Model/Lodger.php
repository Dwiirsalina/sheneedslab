<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Lodger extends Model
{
    protected $table = 'lodger';
    protected $primaryKey = 'id';
    public $incrementing = true;
    public $timestamp = true;

    public function user(){
    	return $this->belongsTo('App\Model\User', 'user_id', 'id');
    }

    public function request(){
    	return $this->belongsTo('App\Model\RequestForm', 'request_id', 'id');
    }
}