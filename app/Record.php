<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class Record extends Model
{
    protected $table = "records";

    protected $user_id;

    protected $medic_id;

    protected $clinic_id;

    protected $section_id;

    protected $description;


    protected $fillable = [
        'user_id', 'medic_id', 'clinic_id', 'section_id', 'description',
    ];

    public function getAllRecords() {
        $records = DB::table('records')->get();
        return $records;
    }

    public function createRecord($user_id, $medic_id, $clinic_id, $section_id, $description) {

        $records = DB::table('records')->insert(
            ['user_id' => $user_id,'medic_id' => $medic_id, 'clinic_id'=> $clinic_id, 'section_id' => $section_id, 'description' => $description, 'created_at' => Carbon::now(),'updated_at' => Carbon::now() ]
        );
        return $records;
    }

    public function getRecord($id) {

        $records =DB::table('records')->find($id);
        return $records;
    }

    public function updateRecord($id, $medic_id, $clinic_id, $section_id, $description) {

        $update = DB::table('records')
            -> where ('id', $id)
            -> update (['medic_id' => $medic_id, 'clinic_id' => $clinic_id,'section_id' => $section_id, 'description' => $description ,'updated_at' => Carbon::now()]);
        return $update;
    }


    public function getRecords() {

        $records = DB::table('records')
            ->join('users', 'records.user_id', '=', 'users.id')
            ->join('users as medics', 'records.medic_id', '=', 'medics.id')
            ->join('clinics', 'records.clinic_id', '=', 'clinics.id')
            ->join('sections', 'records.section_id', '=', 'sections.id')
            ->select(['records.id', 'users.name as users_name','medics.name as medic_name', 'clinics.name as clinic_name', 'sections.name as section_name', 'records.description', 'records.created_at'])
            ->get();
        return $records;
    }

    public function getRecordsByUser($user_id) {
        $records = DB::table('records')
            ->join('users', 'records.user_id', '=', 'users.id')
            ->join('users as medics', 'records.medic_id', '=', 'medics.id')
            ->join('clinics', 'records.clinic_id', '=', 'clinics.id')
            ->join('sections', 'records.section_id', '=', 'sections.id')
            ->select(['records.id', 'users.name as users_name','medics.name as medic_name', 'clinics.name as clinic_name', 'sections.name as section_name', 'records.description', 'records.created_at'])
            ->where('records.user_id', '=', $user_id)
            ->get();
        return $records;
    }


}
