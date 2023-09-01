<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FileLog extends Model
{
    use HasFactory;
    protected $fillable =[
        'ip_address','user_agent', 'file_id','time'
    ];

    public function file()
    {
        return $this->belongsTo(File::class);
    }
}
