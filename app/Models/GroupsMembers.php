<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Groups;

class GroupsMembers extends Model
{
    use HasFactory;
    protected $fillable = [
        'group_id',
        'regno',
    ];

    // Relationship with Group
    public function group()
    {
        return $this->belongsTo(Groups::class, 'group_id');
    }

    // Relationship with Student
    public function student()
    {
        return $this->belongsTo(Students::class, 'regno', 'regno');
    }
}
