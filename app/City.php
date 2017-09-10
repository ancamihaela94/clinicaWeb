<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class City extends Model
{
    protected $table = 'cities';

    /**
     * @var integer
     */
    protected $id;

    /**
     * @var string
     */
    protected $name;

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
        'name'
    ];


    public function getAllCities()
    {
        $cities = DB::table('cities')->get();
        return $cities;
    }


    public function addCity($input)
    {
        $city = DB::table('cities')->insert(
            ['name' => $input, 'created_at' => Carbon::now(),'updated_at' => Carbon::now()]
        );
        return $city;

    }



    public function getCity($id) {

        $city = City::find($id);
        return $city;
    }

    public function updateCity($id, $name) {

        $city = DB::table('cities')
            -> where ('id', $id)
            -> update (['name' => $name, 'updated_at' => Carbon::now()]);
        return $city;
    }

    public function deleteCity($id){

        $city = DB::table('cities')->where('id',$id)->delete();
        return $city;
    }

    public function clinics() {
        return $this->hasMany(City::class, 'city_id', 'id');
    }
}
