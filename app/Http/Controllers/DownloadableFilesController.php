<?php

namespace App\Http\Controllers;

use App\Models\DownloadableFiles;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DownloadableFilesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $DownloadableFiles = DownloadableFiles::all();
        return $DownloadableFiles;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $DLFiles = new DownloadableFiles();
        $DLFiles->student_id = $request->student_id;
        $DLFiles->file_type = $request->file_type;
        $DLFiles->file_location = $request->file_location;
        $DLFiles->uploaded_by = $request->uploaded_by;
        $DLFiles->created_at = Carbon::now();
        $DLFiles->updated_at = Carbon::now();
        if($DLFiles->save())
        {
            return "Files Successfully Uploaded";
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
