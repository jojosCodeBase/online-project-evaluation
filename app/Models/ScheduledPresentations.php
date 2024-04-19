<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ScheduledPresentations extends Model
{
    use HasFactory;
    protected $table = 'scheduled_presentations';
    protected $fillable = [
        'date', 'time', 'venue', 'presentation', 'project', 'status',
    ];
}
