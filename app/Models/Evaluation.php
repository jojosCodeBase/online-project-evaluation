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

    public function user()
    {
        return $this->belongsTo(User::class, 'student_id');
    }
    public function student()
    {
        return $this->belongsTo(Students::class, 'student_id', 'user_id');
    }

    public function presentation()
    {
        return $this->belongsTo(Presentations::class, 'presentation_id');
    }
    public function group()
    {
        return $this->belongsTo(Groups::class, 'group_id');
    }
}
