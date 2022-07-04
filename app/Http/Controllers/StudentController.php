<?php

namespace App\Http\Controllers;

use App\Models\Students;
use Carbon\Carbon;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Students = Students::all();
        return $Students;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $Student = new Students();
        $Student->last_name = $request->last_name;
        $Student->first_name = $request->first_name;
        $Student->middle_name = $request->middle_name;
        $Student->student_id = $request->student_id;
        $Student->gender = $request->gender;
        $Student->birth_day = $request->birth_day;
        $Student->address = $request->address;
        $Student->picture = $request->picture;
        $Student->civil_status = $request->civil_status;
        $Student->religion = $request->religion;
        $Student->contact_number = $request->contact_number;
        $Student->email_address = $request->email_address;
        $Student->guardian_name = $request->guardian_name;
        $Student->relationship = $request->relationship;
        $Student->guardian_contact_number = $request->guardian_contact_number;
        $Student->remarks = $request->remarks;
        $Student->added_by = $request->added_by;
        $Student->created_at = Carbon::now();
        $Student->updated_at = Carbon::now();
        if($Student->save())
        {
            return "Student successfully Added";
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
