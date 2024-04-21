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
        'project_id',
        'project_guide',
        'topic'
    ];

    // Relationship with GroupsMembers
    public function members()
    {
        return $this->hasMany(GroupsMembers::class, 'group_id'); // Assuming 'group_id' is the foreign key column
    }

    public function project()
    {
        return $this->belongsTo(Projects::class, 'project_id')->select(['id', 'project_name']);
    }
    public function guide()
    {
        return $this->belongsTo(User::class, 'project_guide')->select(['id', 'name']);
    }
    public function group()
    {
        return $this->belongsTo(Groups::class);
    }

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
