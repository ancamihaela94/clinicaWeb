<?php

namespace App\Http\Controllers;

use App\Record;
use Illuminate\Http\Request;
use App\User;
use App\Section;
use App\Clinic;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class RecordsController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $records = new Record();
        $data = $records->getRecords();
        return view('records/records')->with(['records' => json_decode($data, true)]);
    }

    public function showRecords($id){

        $users = new User();
        $userData = $users->getUser($id);

        $records = new Record();
        $recordData = $records->getRecordsByUser($id);

        if ($recordData) {


            return view('records/showRecords')->with(['records' => json_decode($recordData, true),
                'users' => $userData
            ]);
        }
        else {
            Session::flash('error_message','Nu exista fisa pentru pacientul selectat!' );
            return redirect('/users');
        }
    }

    public function addRecords($id)
    {
        $users = new User();
        $userData = $users->getUser($id);

        $clinic = new Clinic();
        $clinicData = $clinic->getAllClinics();

        $sections = new Section();
        $sectionData = $sections->getAllSections();

        return view('records/create')->with([
            'users' => $userData,
            'clinics' =>$clinicData,
            'sections' => $sectionData
        ]);
    }

    public function createRecords(Request $request, $id)
    {

        $medic_id = Auth::id();
        $section_id = $request->input('section_id');
        $clinic_id =$request->input('clinic_id');
        $description = $request->input('description');

//        dd($clinic_id);

        if (empty($section_id) || empty($id) || empty($clinic_id)) {

            Session::flash('error_message', 'Fisa medicala nu a putut fi adaugata!');
            return redirect()->route('showRecords', $id);
        } else {

            $record = new Record();
            $recordData = $record->createRecord($id, $medic_id, $clinic_id, $section_id, $description);
            Session::flash('flash_message', 'Fisa medicala a fost adaugata cu succes a fost adaugata cu succes!');
            return redirect()->route('showRecords', $id);
        }
    }
//--------------------------------------------------------------------------------------------------------------


    // API METHODS
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function apiIndex()
    {
        $records = new Record();
        $data = $records->getRecords();

        $response = [
            'status' => 200,
            'data' => $data
        ];

        return $response;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function apiShow($id)
    {
        $records = new Record();
        $recordData = $records->getRecordsByUser($id);

        if ($recordData) {
            return [
                'status' => 200,
                'data' =>  $recordData
            ];
        }
        else return [
            'status' => 400,
            'message' =>  "Bad request"
        ];
    }


}
