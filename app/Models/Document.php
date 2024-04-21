<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use HasFactory;

    protected $fillable = [
        'presentation_id',
        'file_url',
        'group_id',
        'uploaded_by',
        'status',
    ];

    // Define the relationship with the Presentation model
    public function presentation()
    {
        return $this->belongsTo(Presentations::class);
    }

    // Define the relationship with the Group model
    public function group()
    {
        return $this->belongsTo(Groups::class);
    }

    // Define the relationship with the Student model for the uploaded_by field
    public function uploadedBy()
    {
        return $this->belongsTo(Students::class, 'uploaded_by', 'regno');
    }
}
