<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class Appointment extends Model
{
    protected $table = "appointments";

    protected $user_id;

    protected $medic_id;

    protected $clinic_id;

    protected $section_id;

    protected $reason;

    protected $date;

    protected $fillable = [
        'user_id', 'medic_id', 'clinic_id', 'section_id', 'reason', 'date'
    ];

    public function getAllAppointments() {
        $appointments = DB::table('appointments')->get();
        return $appointments;
    }

    public function createAppointment($user_id, $medic_id, $clinic_id, $section_id, $reason, $date) {

        $appointments = DB::table('appointments')->insert(
            ['user_id' => $user_id,'medic_id' => $medic_id, 'clinic_id'=> $clinic_id, 'section_id' => $section_id, 'reason' => $reason, 'date' => $date, 'created_at' => Carbon::now(),'updated_at' => Carbon::now() ]
        );
        return $appointments;
    }

    public function getAppointment($id) {

        $appointments =DB::table('appointments')->find($id);
        return $appointments;
    }

    public function updateAppointment($id, $medic_id, $clinic_id, $section_id, $date) {

        $update = DB::table('appointments')
            -> where ('id', $id)
            -> update (['medic_id' => $medic_id, 'clinic_id' => $clinic_id,'section_id' => $section_id, 'date' => $date ,'updated_at' => Carbon::now()]);
        return $update;
    }

    public function getUsers(){
        $users = DB::table('users')
            -> join('appointments', 'appointments.user_id', '=', 'users.id')
            ->select(['users.name', 'users.id'])
            ->where('type','=', 3)
            ->get();
    }

    public function getAppointments() {

        $appointments = DB::table('appointments')
            ->join('users', 'appointments.user_id', '=', 'users.id')
            ->join('users as medics', 'appointments.medic_id', '=', 'medics.id')
            ->join('clinics', 'appointments.clinic_id', '=', 'clinics.id')
            ->join('sections', 'appointments.section_id', '=', 'sections.id')
            ->select(['appointments.id', 'users.name as users_name','medics.name as medic_name', 'clinics.name as clinic_name', 'sections.name as section_name', 'appointments.reason', 'appointments.date'])
            ->get();
        return $appointments;
    }


}