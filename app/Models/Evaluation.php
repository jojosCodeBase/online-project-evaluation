<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evaluation extends Model
{
    use HasFactory;
    protected $table = 'evaluations';
    protected $fillable = [
        'presentation_id',
        'student_id',
        'evaluator_id',
        'group_id',
        'presentation_content',
        'presentation_skills',
        'report_content',
        'viva_voice',
        'progress',
        'total',
        'remarks',
    ];
}
