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
        'name',
    ];

    // Relationship with Group
    public function group()
    {
        return $this->belongsTo(Groups::class, 'group_id');
    }
}
