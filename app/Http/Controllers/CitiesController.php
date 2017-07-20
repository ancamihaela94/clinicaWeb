<?php

namespace App\Http\Controllers;

use App\City;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class CitiesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $cities = new City();
        $data = $cities->getAllCities();

        return view('cities/cities')->with(
            ['cities' => json_decode($data, true)]
        );
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function apiIndex()
    {
        $cities = new City;
        $data = $cities->getAllCities();

        $response = [
            'status' => 200,
            'data' => $data
        ];

        return $response;
    }

    public function add() {
        return view('cities/create');
    }

    public function create(Request $request)
    {
        $name = $request->input('cityName');
        if (empty($name)) {
            Session::flash('error_message','Locatia nu a putut fi creata! Te rugam sa verifici datele introduse!' );
        }
        else {
            $city = new City();
            $data = $city->addCity($name);
            Session::flash('flash_message','Locatia a fost adaugata cu succes!' );
        }
                return redirect('/cities');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function apiCreate(Request $request)
    {
        $name = $request->input('name');

        // todo validation
        if (empty($name))
        {
            return [
                'status' => 400,
                'message' => "Bad request"
            ];
        }

        $city = new City();
        $data = $city->addCity($name);

        $response = [
            'status' => 201,
            'data' => $data
        ];

        return $response;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function apiShow($id)
    {
        $city = new City();
        $data = $city->getCity($id);
        if (is_null($data)) {
            return [
                'status' => 404,
                'message' => "Not found"
            ];
        }
        else {
            return [
            'status' => 200,
            'data' =>  $data
        ];
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id)
    {
        $city = new City();
        $cities = $city->getAllCities();
        $data = $city->getCity($id);
        if ($data) {
            return view('cities/edit')->with('city',$data);
        }
        else {

           Session::flash('error_message','Nu s-a gasit locatia cautata!' );
            return redirect("/cities");

        }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function update(Request $request, $id)
    {
        $name = $request->input('cityName');
        if(empty($name)) {
            Session::flash('error_message','Nu s-a putut edita locatia! Te rugam sa verifici campurile completate!' );
        }
        else {
            $city = new City();
            $data = $city->updateCity($id, $name);

        }
        return redirect('/cities');
    }

    /**
     * Update the specified resource in storage.
     *
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function apiUpdate(Request $request, $id)
    {
        $city = new City();
        $cityExists = $city->getCity($id);
        $name = $request->input('name');
        if (empty($name) || is_null($cityExists)) {
            return  [
                'status' => 400,
                'message' => "Bad request"
            ];
        }
       else {
           $data= $city->updateCity($id, $name);
           return [
               'status' => 201,
               'message' => "Succes!"
           ];
       }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function delete($id)
    {

        $city = new City();
        $data = $city->getCity($id);
        if ($data) {
            $city->deleteCity($id);
            Session::flash('flash_message','Locatia a fost stearsa cu succes!' );
        }
        else
            Session::flash('error_message','Nu s-a putut sterge locatia!' );
        return redirect('/cities');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function apiDestroy($id)
    {
        $city = new City();
        $data = $city->getCity($id);
        if ($data) {
            $city->deleteCity($id);
            return [
                'status' => 204
            ];
        }
        else {
            return  [
                'status' => 404,
                'message' => "Not found"
            ];

        }
    }
}
