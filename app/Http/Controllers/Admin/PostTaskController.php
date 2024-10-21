<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

class PostTaskController extends AdminController
{
    public function uploadTinyMCEImage(Request $request){
        $fileName  =$request->file('file')->getClientOriginalName();
        $path = $request->file('file')->storeAs('uploads', $fileName, 'public');
        return response()->json(['location'=>"/../storage/$path"]); 
    }
}
