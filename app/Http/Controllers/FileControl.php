<?php

namespace App\Http\Controllers;

use App\Models\File;
use App\Models\FileLog;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Events\FileDownloaded;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Event;
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

        $filename = Str::random(8) . '.' .  $request->file->getClientOriginalName();
        $path = $request->file('file')->storeAs('uploads', $filename);

        $file_data = new File();
        $file_data->file = $filename;
        $file_data->name = $request->name;
        $file_data->save();
        // event(new FileDownloaded($file_data->id, $request->ip(), $request->header('User-Agent')));

        return redirect()->route('file.show')->with('msg', 'File uploaded successfully')->with('type', 'success');
    }



    public function show()
    {
        $file_data = File::all();
        return view('file.show', compact('file_data'));
    }



    public function download($file)
    {
        $filePath = storage_path('app/uploads/' . $file);

        if (File::exists($filePath)) {
            $fileModel = File::where('file', $file)->first();
            if ($fileModel) {
                $ipAddress = request()->ip();
                $userAgent = request()->header('User-Agent');

                event(new FileDownloaded($fileModel->id, $ipAddress, $userAgent));

                $fileModel->download_count++;
                $fileModel->save();
            }
            return Response::download($filePath);
        } else {
            return redirect()->back()
                ->with('msg', 'File not found')
                ->with('type', 'danger');
        }
    }




    public function share($id)
    {
        $file = File::findOrFail($id);
        $url =  URL::temporarySignedRoute(
            'file.download',
            now()->addHours(2),
            [
                'file' => $file->file,
                'name' => $file->name
            ]
        );
        return view('file.share', compact('url', 'file'));
    }





    public function destroy($id)
    {
        $data = File::findOrFail($id);
        $filePath = storage_path('app/uploads/' . $data->file); // Update file path

        if (file_exists($filePath)) {
            unlink($filePath);
        }

        $data->delete();

        return redirect()->route('file.show')
            ->with('msg', 'File deleted successfully')
            ->with('type', 'danger');
    }
}
