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

    public function getUserByEmail($email) {

        $user = DB::table('users')
            ->select('id', 'name', 'email', 'type', 'remember_token')
            ->where([
                ['email', '=', $email],
                ['type', '=', '3']
            ])
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

    public function getUserByName($name) {

        $user = DB::table('users')
            ->where([
                ['name','LIKE', '%'.$name.'%'],
                ['type', '=', '3']
            ])
            ->orWhere([
                ['email', 'LIKE','%'.$name.'%'],
                ['type', '=', '3']
            ])
            ->orWhere([
                ['phone_number', 'LIKE', '%'.$name.'%'],
                ['type', '=', '3']
            ])
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



    public function getUserType($id) {
        $user_type = DB::table('users')
            ->select ('users.type')
            ->where ('id', $id)
            ->get();
        return $user_type;
    }

    public function isAdmin($id) {
        $user = new User();
        $typeCollection = $user->getUserType($id);
        $type = $typeCollection[0]->type;
        if ($type == 1 )
            return true;

        return false;
    }


    public function isMedic($id) {
        $user = new User();
        $typeCollection = $user->getUserType($id);
        $type = $typeCollection[0]->type;
        if ($type == 2 || $type == 1)
            return true;

        return false;
    }

    public function isUser($id) {
        $user = new User();
        $typeCollection = $user->getUserType($id);
        $type = $typeCollection[0]->type;
        if ($type == 3)
            return true;

        return false;
    }

}
