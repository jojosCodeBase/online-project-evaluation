<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\GroupsMembers;

class Groups extends Model
{
    use HasFactory;
    protected $fillable = [
        'group_name',
        'course',
        'guide',
    ];

    // Relationship with GroupsMembers
    public function members()
    {
        return $this->hasMany(GroupsMembers::class, 'group_id'); // Assuming 'group_id' is the foreign key column
    }
}
