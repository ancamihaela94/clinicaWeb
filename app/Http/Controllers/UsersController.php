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

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */

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




    //------------------------------------------------------------------------------------


    // API METHODS

    public function apiIndex()
    {
        $user = new User();
        $data = $user->getUsers();

        $response = [
            'status' => 200,
            'data' => $data
        ];

        return $response;
    }


    /**
     * @param $id
     * @return array
     */
    public function apiShow($id)
    {
        $medic = new User();
        $data = $medic->getUser($id);
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
        $users = new User();
        $userExists = $users->getUser($id);
        if (empty($status) || is_null($userExists))
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





}
