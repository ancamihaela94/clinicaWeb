<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;

class Medic extends Model
{
     protected $table = "users";

     protected $name;

     protected $email;

     protected $phone_number;

     protected $status;

     protected $type;

     protected $fillable = [
         'name', 'email', 'phone_number', 'status', 'type'
     ];

     public function getAllMedics() {
         $medics = DB::table('users')->where('type', '=', 2)->get();
         return $medics;
     }

    public function createMedic($medicName, $email, $password, $phone_no, $status) {

        $medics = DB::table('users')->insert(
            ['name' => $medicName,'email' => $email, 'password'=> $password, 'phone_number' => $phone_no, 'status' => $status, 'type' => 2, 'created_at' => Carbon::now(),'updated_at' => Carbon::now() ]
        );
        return $medics;
    }

    public function getMedic($id) {

        $medics =DB::table('users')->find($id);
        return $medics;
    }

    public function updateMedic($id, $status) {

        $update = DB::table('users')
            -> where ('id', $id)
            -> update (['status' => $status,  'updated_at' => Carbon::now()]);
        return $update;
    }

    public function deleteMedic($id) {

        $delete = DB::table('users')->where('id',$id)->delete();
        return $delete;
    }
}
