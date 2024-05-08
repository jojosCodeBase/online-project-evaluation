<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Projects extends Model
{
    use HasFactory;

    protected $table = 'projects';
    protected $fillable = ['project_name', 'course', 'project_coordinator_id'];

    public function groups()
    {
        return $this->hasMany(Groups::class, 'project_id');
    }
}
