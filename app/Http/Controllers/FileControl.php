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
    $url =  URL::temporarySignedRoute('file.download',  now()->addHours(3) ,
            ['file' => $file->file ,
            'name' => $file->name ]);
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










//     public function edit($id)
//     {
//         $file_data = File::findOrFail($id);
//         return view('file.edit', compact('file_data'));
//     }

// public function update(Request $request, $id)
// {
//     $file_data = File::findOrFail($id);

//     $request->validate([
//         'name' => 'required',
//         'file' => 'file|max:10240'
//     ]);

//     $filename = null;
//     if ($request->hasFile('file')) {
//         // Delete the old file if a new one is uploaded
//         if ($file_data->file) {
//             Storage::delete('assets/' . $file_data->file);
//         }

//         $filename = Str::random(12) . '.' . $request->file('file')->getClientOriginalName();
//         $request->file('file')->move(public_path('assets'), $filename);
//     } else {
//         // If no file is uploaded, keep the existing file
//         $filename = $file_data->file;
//     }

//     $file_data->name = $request->name;
//     $file_data->file = $filename;
//     $file_data->save();

//     return redirect()->route('file.show', ['file' => $file_data->id])->with('msg', 'File updated successfully')->with('type', 'success');
// }

// public function edit(string $id)
// {
//     return abort(404);
// }

}
