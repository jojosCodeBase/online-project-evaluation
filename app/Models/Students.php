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
        'year',
        'semester',
        'batch',
        'user_id'
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
