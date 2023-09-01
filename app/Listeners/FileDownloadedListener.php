<?php

namespace App\Listeners;

use App\Models\FileLog;
use App\Events\FileDownloaded;
use Illuminate\Support\Facades\Log;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class FileDownloadedListener
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(FileDownloaded $event): void
    {

        $request= request();
        $fileId = $event->fileId;
        $ipAddress = $request->ip();
        $userAgent = $request->header('User-Agent');


        FileLog::create([
            'file_id' => $fileId,
            'ip_address' => $ipAddress,
            'user_agent' => $userAgent,
            'time' => now(),
        ]);



    }
}
