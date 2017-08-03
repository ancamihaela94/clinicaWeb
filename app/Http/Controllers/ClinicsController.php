<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Clinic;
use App\City;
use App\Section;
use Illuminate\Support\Facades\Session;


class ClinicsController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $clinics = new Clinic();
        $data = $clinics->getCities();
        return view('clinics/clinics')->with(
            ['clinics' => json_decode($data, true)]
        );
    }

    public function add() {
        $citiesModel = new City();
        $cities = $citiesModel->getAllCities();
        return view('clinics/create')->with([
            'cities' => $cities
        ]);
    }

    public function create(Request $request)
    {
        $name = $request->input('clinicName');
        $status = $request->input('status');
        $cityId = $request->input('cityId');
//        dd($status);
        if (empty($name) || empty($status) || empty($cityId)) {

            Session::flash('error_message','Clinica nu a putut fi adaugata!' );
        }
        else {
            $clinic = new Clinic();
            $data = $clinic->createClinic($name, $status, $cityId);
            Session::flash('flash_message','Clinica a fost salvata cu succes!' );

        }
        return redirect('/clinics');
    }

    public function show($id)
    {
        $clinic = new Clinic();
        $data = $clinic->getClinic($id);
        if ($data) {
            return view('clinics/edit')->with('clinic',$data);
        }
        else {
            Session::flash('error_message','Clinica nu a putut fi gasita!' );
            return redirect('/clinics');
        }

    }


    public function update(Request $request, $id)
    {
        $status = $request->input('status');
        $clinic = new Clinic();
        $clinicExists = $clinic->getClinic($id);
        if (empty($status) || is_null($clinicExists)) {
            Session::flash('error_message','Clinica nu a putut fi editata! Te rugam sa verifici datele introduse!' );
        }
        else {

            $data = $clinic->updateClinic($id, $status);
            Session::flash('flash_message','Clinica a fost editata cu succes!' );
        }
        return redirect('/clinics');
    }


    public function delete($id)
    {

        $clinic = new Clinic();
        $data = $clinic->getClinic($id);
        if ($data) {
            $data = $clinic->deleteClinic($id);
            Session::flash('flash_message','Clinica a fost stearsa cu succes!' );
        }
        else {
            Session::flash('error_message','Clinica nu a putut fi stearsa!' );
        }

        return redirect('/clinics');
    }

    public function showAssociateSections($id) {

        $clinic = new Clinic();
        $clinicData = $clinic->getClinic($id);
        $data = $clinic->getSections($id);
        if ($data) {
            return view('clinics/showSections')->with(['sections' => json_decode($data, true),
                'clinics' =>$clinicData

            ]);
        }
        else {
            Session::flash('error_message','Clinica nu a putut fi gasita!' );
            return redirect('/clinics');
        }

    }


    public function formAssociateSections($clinic_id){


//        $citiesModel = new City();
//        $cities = $citiesModel->getAllCities();
//        return view('clinics/create')->with([
//            'cities' => $cities
//        ]);
        $sectionsModel = new Section();
        $sections = $sectionsModel->getAllSections();
        $clinic = new Clinic();
        $data = $clinic->getClinic($clinic_id);
        if ($data) {
            return view('clinics/associateSections')->with(['clinics' => $data,
                'sections' => $sections]);
        }
        else {
            Session::flash('error_message','Clinica nu a putut fi gasita!' );
            return redirect('/clinics');
        }

    }

    public function associateSections(Request $request, $id)
    {

        $section_id = $request->input('section_id');
        $clinic = new Clinic();
        $clinicExists = $clinic->getClinic($id);

        if (empty($section_id) || empty($id) || empty($clinicExists)) {

            Session::flash('error_message', 'Sectia nu a putut fi adaugata!');
            return redirect()->route('showSections', $id);
        } else {
            $deletePreviousSections = $clinic->deleteAssociatedSections($id);
            foreach ($section_id as $sections){
//                $clinic = new Clinic();
                $sectionAssociate = $clinic->associateSection($id, $sections);
            }
            Session::flash('flash_message', 'Sectia a fost adaugata cu succes a fost salvata cu succes!');
            return redirect()->route('showSections', $id);
        }
    }










    // API METHODS
    /**
     * Display a listing of the resource.
     *
     * @return array
     */

    public function apiIndex()
    {
        $clinics = new Clinic();
        $data = $clinics->getAllClinics();

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
     * @return array
     */

    public function apiCreate(Request $request)
    {
        $name = $request->input('name');
        $status = $request->input('status');
        $cityId = $request->input('cityId');

        if (empty($name) || empty($status) || empty($cityId)) {
            return [
                'status' => 400,
                'message' => "Bad request!"
            ];
        }
        else {
            $clinic = new Clinic();
            $data = $clinic->createClinic($name, $status, $cityId);
            return  [
                'status' => 201,
                'data' => $data
            ];
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */

    public function apiShow($id)
    {
        $clinic = new Clinic();
        $data = $clinic->getClinic($id);
        if ($data) {
            return [
                'status' => 200,
                'data' =>  $data
            ];
        }
        else return [
            'status' => 400,
            'message' =>  "Bad request"
        ];
    }


    /**
     * Update the specified resource in storage.
     *
     *
     * @param  int  $id
     * @return array
     */
    public function apiUpdate(Request $request, $id)
    {
        $status = $request->input('status');
        $clinic = new Clinic();
        $clinicExists = $clinic->getClinic($id);

        if (empty($status) || is_null($clinicExists))
        {
            return [
                'status' => 400,
                'message' =>  "Bad request"
            ];
        }
        else {
            $data = $clinic->updateClinic($id, $status);

            return  [
                'status' => 201,
                'data' => $data
            ];
        }

    }

    public function apiDestroy($id)
    {
        $clinic = new Clinic();
        $clinicExists = $clinic->getClinic($id);
        if (is_null($clinicExists)) {
            return [
                'status' => 400,
                'message' =>  "Bad request"
            ];
        }
        else {
            $data = $clinic->deleteClinic($id);
            return  [
                'status' => 204
            ];
        }

    }

    /**
     * @param $id
     * @return array
     */
    public function getClinicsByCityId($id){

        $clinic = new Clinic();
        $clinicsByCity = $clinic->getClinicsByCityId($id);
        $response = [
            'status' => 200,
            'data' => $clinicsByCity
        ];

        return $response;

    }

}
