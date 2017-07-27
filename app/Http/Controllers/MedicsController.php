<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Medic;
use App\Section;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class MedicsController extends Controller
{
        /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $medics = new Medic();
        $data = $medics->getMedicSectionAndClinic();
        return view('medics/medics')->with(
            ['medics' => json_decode($data, true)]
        );
    }


    public function add (){

        $sections = new Section();
        $sectionData = $sections->getAllSections();
        return view('medics/create')->with(['sections' => $sectionData]);
    }

    public function create(Request $request)
    {
        $medicName = $request->input('medicName');
        $email = $request->input('email');
        $password = Hash::make($request->input('password'));
        $phone_no = $request->input('phoneNo');
        $status = $request->input('status');
        $section = $request->input('section_id');
        $clinic = $request->input('clinic_id');

        if (empty($medicName) || empty($email) || empty($phone_no) || empty($status) || empty($password) || empty($section) || empty($clinic)) {

            Session::flash('error_message','Cadrul medical nu a putut fi adaugat!' );
        }
        else {
            $medics = new Medic();
            $data = $medics->createMedic($medicName, $email, $password, $phone_no, $status, $section,$clinic);
            Session::flash('flash_message','Cadrul medical a fost salvata cu succes!' );

        }
        return redirect('/medics');
    }


    public function show($id)
    {

        $medics = new Medic();

        $data = $medics->getMedic($id);

        if ($data) {
            return view('medics/edit')->with([
                'medic'=>$data
            ]);
        }
        else {
            Session::flash('error_message','Cadrul medical nu a putut fi gasit!' );
            return redirect('/medics');
        }

    }


    public function update(Request $request, $id)
    {
        $status = $request->input('status');
        $phoneNo = $request->input('phoneNo');
        $medic = new Medic();
        $medicExists = $medic->getMedic($id);
        if (empty($status) || empty($phoneNo) || is_null($medicExists)) {
            Session::flash('error_message','Cadrul medical nu a putut fi editat! Te rugam sa verifici datele introduse!' );
        }
        else {

            $data = $medic->updateMedic($id, $status, $phoneNo);
            Session::flash('flash_message','Cadrul medical a fost editat cu succes!' );
        }
        return redirect('/medics');
    }


    public function delete($id)
    {

        $medic = new Medic();
        $data = $medic->getMedic($id);

        if ($data) {
            $data = $medic->deleteMedic($id);
            Session::flash('flash_message','Cadrul medical a fost stears cu succes!' );
        }
        else {
            Session::flash('error_message','Cadrul medical nu a putut fi stears!' );
        }

        return redirect('/medics');
    }






    //------------------------------------------------------------------------------------


    // API METHODS

    public function apiIndex()
    {
        $medics = new Medic();
        $data = $medics->getAllMedics();

        $response = [
            'status' => 200,
            'data' => $data
        ];

        return $response;
    }

    /**
     * @param Request $request
     * @return array
     */
    public function apiCreate(Request $request)
    {

        $medicName = $request->input('medicName');
        $email = $request->input('email');
        $password = Hash::make($request->input('password'));
        $phone_no = $request->input('phoneNo');
        $status = $request->input('status');
        $section = $request->input('section_id');
        $clinic = $request->input('clinic_id');


        if (empty($medicName) || empty($email) || empty($phone_no) || empty($status) || empty($password) || empty($section)) {
            return [
                'status' => 400,
                'message' => "Bad request!"
            ];
        }
        else {
            $medic = new Medic();
            $data = $medic->createMedic($medicName, $email, $password, $phone_no, $status, $section,$clinic);
            return  [
                'status' => 201,
                'data' => $data
            ];
        }

    }

    /**
     * @param $id
     * @return array
     */

    public function apiShow($id)
    {
        $medic = new Medic();
        $data = $medic->getMedic($id);
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
     * @param Request $request
     * @param $id
     * @return array
     */
    public function apiUpdate(Request $request, $id)
    {
        $status = $request->input('status');
        $phoneNo = $request->input('phoneNo');
        $medic = new Medic();
        $medicExists = $medic->getMedic($id);

        if (empty($status) || empty($phoneNo) || is_null($medicExists))
        {
            return [
                'status' => 400,
                'message' =>  "Bad request"
            ];
        }
        else {
            $data = $medic->updateMedic($id, $status, $phoneNo);

            return  [
                'status' => 201,
                'data' => $data
            ];
        }

    }

    /**
     * @param $id
     * @return array
     */
    public function apiDestroy($id)
    {
        $medic = new Medic();
        $medicExists = $medic->getMedic($id);
        if (is_null($medicExists)) {
            return [
                'status' => 400,
                'message' =>  "Bad request"
            ];
        }
        else {
            $data = $medic->deleteMedic($id);
            return  [
                'status' => 204
            ];
        }

    }

    /**
     * @param $clinic_id
     * @param $section_id
     * @return array
     */
    public function apiGetMedicBySectionAndClinic($clinic_id, $section_id){

        $medic = new Medic();
        $medicData = $medic->getMedicBySectionAndClinic($section_id,$clinic_id);
        return [
            'status' => 200,
            'data' => $medicData
        ];
    }

}
