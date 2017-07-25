<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

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
            ->select('id', 'name', 'email', 'type', 'remember_token')
            ->where('email', '=', $email)
            ->paginate(15)
            ->get();
        return $user;

    }

    public static function getUserByToken($token) {

        $user = DB::table('users')
            ->select('id', 'name', 'email', 'type', 'remember_token')
            ->where('token', '=', $token)
            ->get();
        return $user;

    }

    public function getUsers(){
        $user = DB::table('users')
            ->select('id', 'name', 'email', 'phone_number','status')
            ->where('type', '=', 3)
            ->get();
        return $user;
    }

    public function getUser($id) {

        $user =DB::table('users')->find($id);
        return $user;
    }

    public function updateUser($id, $status) {

        $update = DB::table('users')
            -> where ('id', $id)
            -> update (['status' => $status, 'updated_at' => Carbon::now()]);
        return $update;
    }
}
