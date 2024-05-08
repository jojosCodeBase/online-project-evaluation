<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Presentations extends Model
{
    use HasFactory;

    protected $fillable = [
        'name','project_id','date', 'time', 'venue', 'presentation', 'project', 'status', 'allow_file_upload'
    ];

    public function project()
    {
        return $this->belongsTo(Projects::class, 'project_id');
    }
}
