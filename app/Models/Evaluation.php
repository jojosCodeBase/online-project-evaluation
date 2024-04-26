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
        'score',
        'comments',
        'group_id',
    ];
}
