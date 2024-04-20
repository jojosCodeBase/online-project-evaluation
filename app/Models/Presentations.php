<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Presentations extends Model
{
    use HasFactory;

    protected $fillable = [
        'name','project_id','date', 'time', 'venue', 'presentation', 'project', 'status', 'allow_file_upload'
    ];
}
