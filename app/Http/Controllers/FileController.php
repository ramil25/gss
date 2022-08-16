<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FileController extends Controller
{
    public function upload(Request $request) {
        try {
            if($request->hasFile("img")) {
                $file = $request->file("img");
                $file_name = $file->getClientOriginalName();
                $file->move(public_path('upload/img'), $file_name);
                
                return response()->json([
                    'message' => "File uploaded successfully!"
                ], 200);
            }
            else {
                return response()->json(['message' => "Failed to upload"]);
            }
        }
        catch(\Exception $e) {
            return response()->json(['message' => $e->getMessage()]);
        }
       
    }
}
