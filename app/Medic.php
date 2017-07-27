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

    public function createMedic($medicName, $email, $password, $phone_no, $status, $section,$clinic) {

        $medics = DB::table('users')->insert(
            ['name' => $medicName,'email' => $email, 'password'=> $password, 'phone_number' => $phone_no, 'status' => $status, 'type' => 2, 'section_id'=>$section,'clinic_id' =>$clinic, 'created_at' => Carbon::now(),'updated_at' => Carbon::now() ]
        );
        return $medics;
    }

    public function getMedic($id) {

        $medics =DB::table('users')->find($id);
        return $medics;
    }

    public function updateMedic($id, $status, $phoneNo) {

        $update = DB::table('users')
            -> where ('id', $id)
            -> update (['status' => $status, 'phone_number' =>$phoneNo, 'updated_at' => Carbon::now()]);
        return $update;
    }

    public function deleteMedic($id) {

        $delete = DB::table('users')->where('id',$id)->delete();
        return $delete;
    }

    public function getMedicSectionAndClinic(){

        $sections = DB::table('users')
            ->join('sections', 'users.section_id', '=', 'sections.id')
            ->join('clinics','users.clinic_id', '=','clinics.id')
            ->select(['users.id', 'users.name', 'users.email','users.phone_number','users.status', 'sections.name as section_name','clinics.name as clinic_name'])
            ->where('type', '=', 2)
            ->get();
        return $sections;

    }

    public function getMedicBySectionAndClinic($section_id, $clinic_id){

        $medic = DB::table('users')
            ->join('sections', 'users.section_id', '=', 'sections.id')
            ->join('clinics','users.clinic_id', '=','clinics.id')
            ->select(['users.name', 'users.id'])
            ->where([
                ['users.type','=','2'],
                ['section_id', '=',$section_id],
                ['clinic_id', '=',$clinic_id],
            ])
            ->get();
        return $medic;
    }

}
