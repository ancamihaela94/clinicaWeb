<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\DB;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * Status values
     */
    const STATUS_ACTIVE = 1;
    const STATUS_INACTIVE = 0;

    /**
     * User types values
     */
    const TYPE_ADMIN = 1;
    const TYPE_DOCTOR = 2;
    const TYPE_USER = 3;


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'phone_number', 'type', 'status'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public static function getUserByEmail($email) {

        $user = DB::table('users')
            ->where('email', '=', $email)
            ->get();
        return $user;

    }

    public static function getUserByToken($token) {

        $user = DB::table('users')
            ->where('token', '=', $token)
            ->get();
        return $user;

    }
}
