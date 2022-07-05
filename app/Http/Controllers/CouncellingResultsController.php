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
       $CouncellingResults = CounselingResults::all();
       return $CouncellingResults;
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
