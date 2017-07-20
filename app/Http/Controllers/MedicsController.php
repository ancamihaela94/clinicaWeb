<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Medic;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Foundation\Auth\RegistersUsers;

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
        $data = $medics->getAllMedics();

        return view('medics/medics')->with(
            ['medics' => json_decode($data, true)]
        );
    }

    public function add (){
        return view('medics/create');
    }

    public function create(Request $request)
    {

        $medicName = $request->input('medicName');
        $email = $request->input('email');
        $password = Hash::make($request->input('password'));
        $phone_no = $request->input('phoneNo');
        $status = $request->input('status');
//        dd($status);
        if (empty($medicName) || empty($email) || empty($phone_no) || empty($status) || empty($password)) {

            Session::flash('error_message','Cadrul medical nu a putut fi adaugat!' );
        }
        else {
            $medics = new Medic();
            $data = $medics->createMedic($medicName, $email, $password, $phone_no, $status);
            Session::flash('flash_message','Cadrul medical a fost salvata cu succes!' );

        }
        return redirect('/medics');
    }



    public function show($id)
    {
        $medics = new Medic();
        $data = $medics->getMedic($id);
        if ($data) {
            return view('medics/edit')->with('medic',$data);
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

        return redirect('/medic');
    }

}
