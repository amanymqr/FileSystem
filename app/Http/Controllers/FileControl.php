<?php

namespace App\Http\Controllers;

use App\Models\File;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;

class FileControl extends Controller
{
    public function uploadForm()
    {
        return view('file.form');
    }



    public function stor(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'file' => 'required|file|max:10240'
        ]);
        $file_data = new File();
        $filename = Str::random(12) . '.' .  $request->file->getClientOriginalName();

        $request->file->move('assets', $filename);
        $file_data->file = $filename;
        $file_data->name = $request->name;
        $file_data->save();
        // $test = File::create($request->all());
        return redirect()->route('file.show')->with('msg', 'file uploaded successfully')->with('type', 'success');
    }



    public function show()
    {
        $file_data = File::all();
        return view('file.show', compact('file_data'));
    }



    public function download($file)
    {
        // get  file path from assets
        $filePath = public_path('assets/' . $file);
        // Check if the file exists
        if (File::exists($filePath)) {
            return Response::download($filePath);
            // generate a file download response
        } else {
            return redirect()->back()
                ->with('msg', 'File not found')
                ->with('type', 'danger');
        }
    }


public function share($id)
{
    $file = File::findOrFail($id);
    $url = route('file.download', ['file' => $file->file]);
    return view('file.share', compact('url', 'file'));
}


    public function destroy($id)
    {
        $data = File::findOrFail($id);
        $filePath = public_path('assets/' . $data->file);

        if (file_exists($filePath)) {
            unlink($filePath);
        }
        $data->delete();
        return redirect()->route('file.show')
            ->with('msg', 'File deleted successfully')
            ->with('type', 'danger');
    }
}
