<?php

namespace App\Http\Controllers;

use App\Models\CounselingResults;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CouncellingResultsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $CounselResults = CounselingResults::with('students')->orderBy('student_id')->get();
        return $CounselResults; 
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
        $CouncellingResult = new CounselingResults();
        $CouncellingResult->student_id = $request->student_id;
        $CouncellingResult->description = $request->description;
        $CouncellingResult->remarks = $request->remarks;
        $CouncellingResult->encoded_by = $request->encoded_by;
        $CouncellingResult->created_at = Carbon::now();
        $CouncellingResult->updated_at = Carbon::now();
        if($CouncellingResult->save())
        {
            return "Councelling Result successfully encoded";
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
        $CouncellingResult = CounselingResults::findOrFail($id);
        $CouncellingResult->student_id = $request->student_id;
        $CouncellingResult->description = $request->description;
        $CouncellingResult->remarks = $request->remarks;
        $CouncellingResult->updated_at = Carbon::now();
        $CouncellingResult->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $CounselResult = CounselingResults::findOrFail($id);
        $CounselResult->delete();
    }

    // getting specific counsel result
    public function getCounselResult($id) {
        $CounselResult = CounselingResults::findOrFail($id);
        return response()->json($CounselResult);
    }

    // function for searching
    public function search(Request $request) {
        $data = CounselingResults::with('students')->whereHas('students', function($query) use($request) {
            $query->where(CounselingResults::raw("CONCAT(first_name, ' ', middle_name, ' ', last_name)"), 'LIKE', '%'.$request->keyword.'%');
        })->get();
        return response()->json($data);
    }

    // Count number of counsel
    public function countCounsel() 
    {
        $count = CounselingResults::all()->count();

        if($count > 0) {
            return $count;
        }
        else {
            return 0;
        }
    }

    // Count number of counsel results of female students
    public function countFemale() 
    {
        $count = CounselingResults::with('students')->whereHas('students', function($query) {
            $query->where('gender', 'Female');
        })->count();

        if($count > 0) {
            return $count;
        }
        else {
            return 0;
        }
    }

    // Count number of counsel results of male students
    public function countMale() 
    {
        $count = CounselingResults::with('students')->whereHas('students', function($query) {
            $query->where('gender', 'Male');
        })->count();

        if($count > 0) {
            return $count;
        }
        else {
            return 0;
        }
    }
}
