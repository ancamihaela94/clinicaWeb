<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class Clinic extends Model
{
    protected $table = 'clinics';

    const STATUS_ACTIVE = 1;
    const STATUS_INACTIVE = 0;

    /**
     * @var integer
     */
    protected $id;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var integer
     */
    protected $city_id;

    /**
     * @var integer
     */
    protected $status;

    /**
     * @var \DateTime
     */
    protected $created_at;

    /**
     * @var \DateTime
     */
    protected $updated_at;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name' , 'city_id', 'status'
    ];

    public function cities() {
        return $this->hasOne(City::class, 'city_id', 'id');
    }

    public function getAllClinics() {
        $clinics = Clinic::all();
        return $clinics;
    }

    public function getCities(){

        $clinics = Clinic::join('cities', 'clinics.city_id', '=', 'cities.id')
            ->select(['clinics.id', 'clinics.name as clinic_name', 'clinics.status', 'cities.name'])
            ->get();
        return $clinics;
    }

    public function createClinic($clinicName, $status, $city_id ) {

        $clinic = DB::table('clinics')->insert(
            ['name' => $clinicName, 'status' => $status, 'city_id' => $city_id, 'created_at' => Carbon::now(),'updated_at' => Carbon::now() ]
        );
        return $clinic;
    }

    public function getClinic($id) {

        $clinic = Clinic::find($id);
        return $clinic;
    }

    public function updateClinic($id, $status) {

        $update = DB::table('clinics')
            -> where ('id', $id)
            -> update (['status' => $status,  'updated_at' => Carbon::now()]);
        return $update;
    }

    public function deleteClinic($id) {

        $delete = DB::table('clinics')->where('id',$id)->delete();
        return $delete;
    }

    public function getSections($id) {
        $clinic = DB::table('sections')
            ->join('clinics_sections', 'sections.id', '=', 'clinics_sections.section_id')
            ->join('clinics', 'clinics.id', '=', 'clinics_sections.clinic_id')
            ->select('sections.id', 'sections.name', 'sections.created_at', 'sections.updated_at')
            ->where('clinics.id', '=', $id)
            ->get();
        return $clinic;
    }

    public function associateSection($clinic_id, $section_id) {
        $clinic = DB::table('clinics_sections')
            ->insert(['section_id' => $section_id, 'clinic_id' => $clinic_id, 'created_at' => Carbon::now(),'updated_at' => Carbon::now() ]);
        return $clinic;
    }

    public function deleteAssociatedSections($clinic_id) {
        $clinic = DB::table('clinics_sections')
            ->where('clinic_id' ,'=', $clinic_id)
            ->delete();
    }


}
