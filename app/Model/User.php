<?php

namespace App\Model;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'user';
    protected $primaryKey = 'id';
    public $incrementing = true;
    public $timestamp = true;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username','role','name', 'no_hp', 'email', 'line',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function role(){
        return $this->hasOne('App\Model\Role', 'id', 'id');
    }

    public function lodgers(){
        return $this->hasMany('App\Model\Lodger', 'user_id', 'id');
    }

    public function statuss(){
        return $this->hasMany('App\Model\Status', 'user_id', 'id');
    }
}
