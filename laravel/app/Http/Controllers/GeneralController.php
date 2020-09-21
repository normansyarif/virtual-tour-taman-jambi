<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GeneralController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function upload(Request $request)
    {
        if($request->hasFile('upload')) {
            $originName = $request->file('upload')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $request->file('upload')->getClientOriginalExtension();

            if(in_array($extension, ['jpg', 'jpeg', 'png'])) {
                $fileName = $fileName.'_'.time().'.'.$extension;
        
                $request->file('upload')->move(public_path('uploads/ckeditor_images'), $fileName);
       
                $CKEditorFuncNum = $request->input('CKEditorFuncNum');
                $url = asset('uploads/ckeditor_images/'.$fileName); 
                $msg = 'Image uploaded successfully'; 
                $response = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";
                   
                @header('Content-type: text/html; charset=utf-8'); 
                echo $response;
            }
        }
    }
}
