<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Users = User::all();
        return $Users;
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
    public function store(Request $request,$length = 12)
    {
       $User = new User();
       $User->last_name = $request->last_name;
       $User->first_name = $request->first_name;
       $User->middle_name = $request->middle_name;
       $User->user_name = $request->user_name;
       $fullName = $request->last_name . " " . $request->first_name . " " . $request->middle_name;
       $characters = sha1(md5($fullName . "123456"));
       $characterLength = strlen($characters);
       $randomStr = '';
       for ($i = 0; $i < $length; $i++) {
           $randomStr = $characters[rand(0, $characterLength - 1)];
       }
       $salt = md5($randomStr);
       $User->password = md5($request->password);
       $User->salt = $salt;
       $User->email = $request->email;
       $User->user_level = $request->user_level;
       $User->created_by = $request->created_by;
       $User->created_at = Carbon::now();
       $User->updated_at = Carbon::now();
       if($User->save())
       {
        return "User Successfully Added";
       }else{
        return "Something is wrong please check all your inputs";
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
