<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AppointmentsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cities = [
            'Bucuresti',
            'Iasi',
            'Craiova'
        ];
        return view('appointments')->with(['cities' => $cities]);
    }
}
