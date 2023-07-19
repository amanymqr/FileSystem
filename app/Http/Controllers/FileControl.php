<?php

namespace App\Http\Controllers;

use App\Models\File;
use Illuminate\Http\Request;

class FileControl extends Controller
{
    public function uploadForm()  {
        return view('file.form');
    }

public function stor(Request $request){
    $request->validate([
        'name'=>'required',
        'file'=>'required|file|max:10240'
    ]);

        $file_data= new File();
        $file=$request->file;
        $filename = rand() . time() . $file->getClientOriginalName();
        $request->file->move('assets', $filename);
        $file_data->file=$filename;
        $file_data->name=$request->name;
        $file_data->save();
        return redirect()->route('file.show');
}

    public function show(){
        $file_data=File::all();
        return view('file.show' , compact('file_data'));
    }

    public function download(Request $request , $file){
        return response()->download(public_path('assets/'.$file));

    }

    public function view($id)
    {
        $view_data=File::find($id);
        return view('file.view', compact ('view_data'));
    }
}


// ->with('success', 'File uploaded successfully')->with('type', 'success')
//
// ->with('success', 'File uploaded successfully')->with('type', 'success')
