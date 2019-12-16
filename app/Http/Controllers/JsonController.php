<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class JsonController extends Controller
{
    public function updateJson(Request $request){
        // dd($request->body);
        $id=$request->id;
        $json=\App\Json::where('id',$id)->first();
        $json->update(["body"=>$request->body]);

        return view('json-editor',compact('id'));
    }
}
