<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'category';
    protected $primaryKey = 'id';
    public $incrementing = true;
    public $timestamp = false;

    public function request(){
    	return $this->belongsTo('App\Model\RequestForm', 'id', 'id');
    }

}