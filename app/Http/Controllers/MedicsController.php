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
            Session::flash('flash_message','Clinica a fost salvata cu succes!' );

        }
        return redirect('/medics');
    }
}
