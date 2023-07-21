<?php

namespace App\Http\Controllers;

use App\Models\File;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\File as FileFacade;

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
        $filename = Str::random(12) . '.' . $file->getClientOriginalName();

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

    // public function download(Request $request, $file)
    // {
    //     return response()->download(public_path('assets/' . $file));
    // }






    public function delete($id)
    {
        $file = File::find($id);

        $file->delete();
        Storage::disk('public')->delete($file->file);
        return redirect()->route('file.show')
            ->with('msg', 'file deleted successfully')
            ->with('type', 'danger');
    }




    public function download($file)
    {
        // Get the file path from the 'assets' directory
        $filePath = public_path('assets/' . $file);
        // Check if the file exists
        if (File::exists($filePath)) {
            // Prepare the response for file download
            return Response::download($filePath);
        } else {
            // File not found, redirect back with an error message or handle as needed
            return back()->with('msg', 'File not found')->with('type', 'danger');
        }
    }

    public function share($id)
    {
        $file = File::findOrFail($id);
        // Generate a signed URL to download the file with an expiration time (e.g., 1 day)
        $expiration = now()->addDay();
        $url = URL::temporarySignedRoute('file.download', $expiration, ['file' => $file->file]);
        return view('file.share', compact('url', 'file'));
    }


    public function view($id)
    {
        $view_data = File::find($id);
        return view('file.view', compact('view_data'));
    }



    public function destroy($id)
    {
        // Find the file record in the database
        $data = File::find($id);

        // Check if the file exists in the database
        if ($data) {
            // Delete the file from the 'assets' directory
            $filePath = public_path('assets/' . $data->file);
            if (FileFacade::exists($filePath)) {
                FileFacade::delete($filePath);
            }

            // Delete the file record from the database
            $data->delete();

            return redirect()->route('file.show')
                ->with('msg', 'File deleted successfully')
                ->with('type', 'success');
        } else {
            return redirect()->route('file.show')
                ->with('msg', 'File not found')
                ->with('type', 'danger');
        }
    }



}
