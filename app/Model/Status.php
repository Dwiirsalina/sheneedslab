<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    protected $table = 'status';
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