<?php

namespace App\Http\Controllers;

use App\Models\TestResults;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TestResultsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $TestResults = TestResults::all();
        return $TestResults;
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
        $TestResult = new TestResults();
        $TestResult->student_id = $request->student_id;
        $TestResult->test_type = $request->test_type;
        $TestResult->test_result = $request->test_result;
        $TestResult->encoded_by = $request->encoded_by;
        $TestResult->created_at = Carbon::now();
        $TestResult->updated_at = Carbon::now();
        if($TestResult->save())
        {
            return "Test Result Encoded Successfully";
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
