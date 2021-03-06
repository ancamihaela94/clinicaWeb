<?php

namespace App\Http\Controllers;

use App\Appointment;
use App\User;
use App\Medic;
use App\Clinic;
use App\Section;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AppointmentsController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $appointments = new Appointment();
        $data = $appointments->getAppointments();
        return view('appointments/appointments')->with(['appointments' => json_decode($data, true)]);
    }


    public function add() {
        $userModel = new User();
        $users = $userModel->getUsers();

        $medicModel = new Medic();
        $medics = $medicModel->getAllMedics();

        $clinicModel = new Clinic();
        $clinics = $clinicModel->getAllClinics();

//        $sections = $clinicModel->getSections($clinics->id);

        $sectionModel = new Section();
        $sections = $sectionModel->getAllSections();

        return view('appointments/create')->with([
            'users' => $users,
            'medics' => $medics,
            'clinics' => $clinics,
            'sections' =>$sections
        ]);
    }


    public function create(Request $request)
    {
        $user_id = $request->input('user_id');
        $medic_id = $request->input('medic_id');
        $clinic_id = $request->input('clinic_id');
        $section_id = $request->input('section_id');
        $reason = $request->input('reason');
        $date = $request->input('date');
//        dd($status);
        if (empty($user_id) || empty($medic_id) || empty($clinic_id) || empty($section_id) || empty($date)) {

            Session::flash('error_message','Programarea nu a putut fi adaugata!' );
        }
        else {
            $appointment = new Appointment();
            $data = $appointment->createAppointment($user_id, $medic_id, $clinic_id, $section_id, $reason, $date);
            Session::flash('flash_message','Programarea a fost salvata cu succes!' );

        }
        return redirect('/appointments');
    }


    public function show($id)
    {

        $sectionModel = new Section();
        $sections = $sectionModel->getAllSections();

        $clinicModel = new Clinic();
        $clinics = $clinicModel->getAllClinics();

        $medicModel = new Medic();
        $medics = $medicModel->getAllMedics();

        $appointment = new Appointment();
        $data = $appointment->getAppointment($id);
        if ($data) {
            return view('appointments/edit')->with(['appointment'=>$data,
                    'clinics' =>$clinics,
                    'medics' => $medics,
                    'sections'=>$sections
            ]);
        }
        else {
            Session::flash('error_message','Programarea nu a putut fi gasita!' );
            return redirect('/appointments');
        }

    }



    public function update(Request $request, $id)
    {
        $medic_id = $request->input('medic_id');
        $clinic_id = $request->input('clinic_id');
        $section_id = $request->input('section_id');
        $date = $request->input('date');
        $status = $request->input('status');
        $appointment = new Appointment();
        $appointmentExists = $appointment->getAppointment($id);
        if (empty($medic_id) || empty($clinic_id) || is_null($appointmentExists)) {
            Session::flash('error_message','Programarea nu a putut fi editata! Te rugam sa verifici datele introduse!' );
        }
        else {

            $data = $appointment->updateAppointment($id, $medic_id, $clinic_id, $section_id, $date, $status);
            Session::flash('flash_message','Programarea a fost editata cu succes!' );
        }
        return redirect('/appointments');
    }

    public function showUpdateStatus($id) {
        $appointment = new Appointment();
        $appointmentExists = $appointment->getAppointment($id);

        if($appointmentExists) {
            return view('appointments/editStatus')->with(['appointments' => $appointmentExists]);
        }
        else {
            Session::flash('error_message','Programarea nu a putut fi gasita!' );
            return redirect('/appointments');
        }
    }

    public function updateStatus(Request $request, $id) {
        $status = $request->input('status');
        $appointment = new Appointment();
        $appointmentExists = $appointment->getAppointment($id);

        if(empty($status) || is_null($appointmentExists)){
            Session::flash('error_message','Programarea nu a putut fi editata! Te rugam sa verifici datele introduse!' );
        }
        else {
            $data = $appointment->updateAppointmentStatus($status, $id);
            Session::flash('flash_message','Programarea a fost editata cu succes!' );
        }
        return redirect('/appointments');
    }

//--------------------------------------------------------------------------------------------------------------


    // API METHODS
    /**
     * Display a listing of the resource.
     *
     * @return array
     */

    public function apiIndex()
    {
        $appointments = new Appointment();
        $data = $appointments->getAppointments();

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
     *     */

    public function apiCreate(Request $request)
    {
        $user_id = $request->input('user_id');
        $medic_id = $request->input('medic_id');
        $clinic_id = $request->input('clinic_id');
        $section_id = $request->input('section_id');
        $reason = $request->input('reason');
        $date = $request->input('date');

        if (empty($user_id) || empty($medic_id) || empty($clinic_id) || empty($section_id) || empty($date)) {
            return [
                'status' => 400,
                'message' => "Bad request!"
            ];
        }
        else {
            $appointment = new Appointment();
            $data = $appointment->createAppointment($user_id, $medic_id, $clinic_id, $section_id, $reason, $date );
            unset($data["updated_at"]);
            unset($data["created_at"]);
            return  [
                'status' => 201,
                'data' => [$data]
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
        $appointment = new Appointment();
        $data = $appointment->getAppointment($id);
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


    public function apiUpdate($id) {

        $medic_id = $request->input('medic_id');
        $clinic_id = $request->input('clinic_id');
        $section_id = $request->input('section_id');
        $date = $request->input('date');
        $status = $request->input('status');
        $appointment = new Appointment();
        $appointmentExists = $appointment->getAppointment($id);
        if (empty($medic_id) || empty($clinic_id) || is_null($appointmentExists)) {
            return [
                'status' => 400,
                'message' => "Bad request!"
            ];
        }

        else {
            $data = $appointment->updateAppointment($id, $medic_id, $clinic_id, $section_id, $date, $status);
            return  [
                'status' => 201,
                'data' => $data
            ];
        }

    }


    public function apiGetAppointmentsByUserId($id) {
        $appointment = new Appointment();
        $appointmentExists = $appointment->getAppointmentsByUser($id);
        if($appointmentExists) {
            return [

                    'status' => 200,
                    'data' => $appointmentExists
            ];
        }
        else  return [
            'status' => 400,
            'message' => "Bad request!"
        ];
    }

}
