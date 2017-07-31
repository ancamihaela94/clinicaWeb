<?php

namespace App\Http\Controllers;

use App\Section;
use App\Clinic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class SectionsController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $section = new Section();
        $data = $section->getAllSections();

        return view('sections/sections')->with(
            ['sections' => json_decode($data, true)]
        );
    }

    public function add()
    {
        return view('sections/create');
    }

    public function create(Request $request)
    {
        $name = $request->input('sectionName');
        if (empty($name)) {
            Session::flash('error_message', 'Sectia nu a putut fi creata! Te rugam sa verifici datele introduse!');
        } else {
            $section = new Section();
            $data = $section->addSection($name);
            Session::flash('flash_message', 'Sectia a fost creata cu succes!');
        }
        return redirect('/sections');
    }

    public function show($id)
    {
        $section = new Section();
        $data = $section->getSection($id);

        if ($data) {
            return view('sections/edit')->with('section', $data);

        } else {
            Session::flash('error_message', 'Sectia nu a putut fi gasita! Te rugam sa verifici datele introduse!');
            return redirect("/sections");
        }
    }

    public function update(Request $request, $id)
    {
        $name = $request->input('sectionName');
        $section = new Section();
        $sectionExists = $section->getSection($id);
        if (empty($name) || is_null($sectionExists)) {
            Session::flash('error_message', 'Sectia nu a putut fi editata! Te rugam sa verifici datele introduse!');
        } else {
            $data = $section->updateSection($id, $name);
            Session::flash('flash_message', 'Your entry was succesfully saved');
        }

        return redirect('/sections');
    }


    public function delete($id)
    {
        $section = new Section();
        $data = $section->getSection($id);
        if ($data) {
            $data = $section->deleteSection($id);
            Session::flash('flash_message', 'Sectia a fost stearsa cu succes!');
        } else {
            Session::flash('error_message', 'Sectia nu a putut fi stearsa!');
        }

        return redirect('/sections');
    }


    //API METHODS
    public function apiIndex()
    {
        $section = new Section();
        $data = $section->getAllSections();

        $response = [
            'status' => 200,
            'data' => $data
        ];

        return $response;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param  \Illuminate\Http\Request $request
     * @return array
     */

    public function apiCreate(Request $request)
    {
        $name = $request->input('name');

        if (empty($name)) {
            return [
                'status' => 400,
                'message' => "Bad request!"
            ];
        } else {
            $section = new Section();
            $data = $section->addSection($name);
            return [
                'status' => 201,
                'data' => $data
            ];
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @param  \Illuminate\Http\Request $request
     * @return array
     */

    public function apiShow($id)
    {
        $section = new Section();
        $data = $section->getSection($id);
        if ($data) {
            return [
                'status' => 200,
                'data' => $data
            ];
        } else return [
            'status' => 400,
            'message' => "Bad request"
        ];
    }


    /**
     * Update the specified resource in storage.
     *
     *
     * @param  int $id
     * @return array
     */
    public function apiUpdate(Request $request, $id)
    {
        $name = $request->input('name');
        $section = new Section();
        $sectionExists = $section->getSection($id);

        if (empty($status) || is_null($sectionExists)) {
            return [
                'status' => 400,
                'message' => "Bad request"
            ];
        } else {
            $data = $section->updateSection($id, $name);

            return [
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
        $section = new Section();
        $sectionExists = $section->getSection($id);
        if (is_null($sectionExists)) {
            return [
                'status' => 400,
                'message' =>  "Bad request"
            ];
        }
        else {
            $data = $section->deleteSection($id);
            return  [
                'status' => 204
            ];
        }

    }

    public function apiGetSectionsByClinic($id) {

        $clinic = new Clinic();
        $sectionsData = $clinic->getSections($id);
        return [
            'status' => 200,
            'data' => $sectionsData
        ];

    }

    public function apiGetClinicsBySection($id) {

        $section = new Section();
        $clinicData = $section->getClinicsBySection($id);
        return [
            'status' => 200,
            'data' => $clinicData
        ];

    }


}

