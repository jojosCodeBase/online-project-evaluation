<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Students extends Model
{
    use HasFactory;
    protected $tables = 'students';
    protected $fillable = [
        'regno',
        'name',
        'rank',
        'total_marks',
        'exam_name',
        'exam_month_year',
        'since',
        'state',
        'placement',
        'category',
        'mode',
        'franchise',
        'profile',
        'rating',
        'review',
    ];
}
