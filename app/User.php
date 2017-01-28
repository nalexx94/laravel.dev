<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Cartalyst\Sentinel\Users\EloquentUser as CartalystUser;

class User extends CartalystUser
{


    protected $table = 'users';
    protected $fillable = [
        'email',
        'login', /* i added this */
        'password',
        'last_name',
        'first_name',
        'permissions',
    ];


    protected $loginNames = ['email','login'];



}
