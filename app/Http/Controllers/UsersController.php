<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class UsersController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $users = new User();
        $data = $users->getUsers();

        return view ('users/users') -> with([
            'users' => json_decode($data, true)
        ]);
    }


    public function show($id)
    {

        $users = new User();

        $data = $users->getUser($id);

        if ($data) {
            return view('users/edit')->with([
                'user'=>$data
            ]);
        }
        else {
            Session::flash('error_message','Utilizatorul nu a putut fi gasit!' );
            return redirect('/users');
        }

    }


    public function update(Request $request, $id)
    {
        $status = $request->input('status');
        $users = new User();
        $userExists = $users->getUser($id);
        if (empty($status) || is_null($userExists)) {
            Session::flash('error_message','Utilizatorul nu a putut fi editat! Te rugam sa verifici datele introduse!' );
        }
        else {

            $data = $users->updateUser($id, $status);
            Session::flash('flash_message','Utilizatorul a fost editat cu succes!' );
        }
        return redirect('/users');
    }

}
