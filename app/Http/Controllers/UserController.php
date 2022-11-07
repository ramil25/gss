<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Users;
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

    // getting specific user
    public function getUser($id) {
        $User = User::findOrFail($id);
        return response()->json($User);
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
    public function update(Request $request, $id, $length = 12)
    {
        $User = User::findOrFail($id);
        $User->last_name = $request->last_name;
        $User->first_name = $request->first_name;
        $User->middle_name = $request->middle_name;
        $User->email = $request->email;
        $User->user_level = $request->user_level;
        $fullName = $request->last_name . " " . $request->first_name . " " . $request->middle_name;
        $characters = sha1(md5($fullName . "123456"));
        $characterLength = strlen($characters);
        $randomStr = '';
        for ($i = 0; $i < $length; $i++) {
            $randomStr = $characters[rand(0, $characterLength - 1)];
        }
        $salt = md5($randomStr);
        if($User->password == "d41d8cd98f00b204e9800998ecf8427e") // if password is not empty (but vice-versa logic)
        {
            $User->password = md5($request->password);
        }
        $User->salt = $salt;
        $User->updated_at = Carbon::now();
        $User->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $User = User::findOrFail($id);
        $User->delete();
    }

    // Login
    public function login($username, $password) 
    {
        $user = User::where('user_name', $username)->where('password', md5($password))->first();
        
        if($user)
        {
            return 200; // correct
        }
        else {
            return 401; // wrong
        }
    }

    // Get logged in account info
    public function getCurrentUser($username)
    {
        $user = User::where("user_name", $username)->first();

        return response()->json($user);
    }
}
