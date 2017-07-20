<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class Section extends Model
{
    protected $table = 'sections';

    protected $id;
    protected $name;

    protected $fillable = [
        'name'
    ];

    public function getAllSections() {
        $section = Section::all();
        return $section;
    }

    public function addSection($input)
    {
        $section = DB::table('sections')->insert(
            ['name' => $input, 'created_at' => Carbon::now(),'updated_at' => Carbon::now()]
        );
        return $section;

    }

    public function getSection($id){

        $sections = Section::find($id);
        return $sections;
    }

    public function updateSection($id, $name) {

        $update = DB::table('sections')
            -> where ('id', $id)
            -> update (['name' => $name,  'updated_at' => Carbon::now()]);
        return $update;
    }

    public function deleteSection($id) {

        $delete = DB::table('sections')->where('id',$id)->delete();
        return $delete;
    }



}
