<?php

namespace App\Http\Controllers;

use App\Models\File;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
        $file = $request->file;
        // $filename = rand() . time() . $file->getClientOriginalName();
        $filename = Str::random(12) . '.' . $file->getClientOriginalExtension();

        $request->file->move('assets', $filename);
        $file_data->file = $filename;
        $file_data->name = $request->name;
        $file_data->save();
        // $test = File::create($request->all());
        return redirect()->route('file.show');
    }

    public function show()
    {
        $file_data = File::all();
        return view('file.show', compact('file_data'));
    }

    public function download(Request $request, $file)
    {
        return response()->download(public_path('assets/' . $file));
    }



    public function view($id)
    {
        $view_data = File::find($id);
        return view('file.view', compact('view_data'));
    }

    public function delete($id)
    {
        $file = File::find($id);

        $file->delete();
        Storage::disk('public')->delete($file->file);
        return redirect()->route('file.show')
            ->with('msg', 'file deleted successfully')
            ->with('type', 'danger');
    }
}
