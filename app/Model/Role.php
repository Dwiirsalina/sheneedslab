<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = 'role';
    protected $primaryKey = 'id';
    public $incrementing = true;
    public $timestamp = false;
    
    public function users(){
    	return $this->belongsTo('App\Model\User', 'id', 'id');
    }

}