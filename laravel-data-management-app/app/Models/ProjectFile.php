<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectFile extends Model
{
    use HasFactory;

    protected $table = 'project_files';

    protected $fillable = [
        'project_id',
        'file',
        'mime_type',
        'created_by',
        'updated_by',
        'created_at',
        'updated_at',
    ];

    // Disable timestamps if you are manually handling them
    public $timestamps = false;

    /**
     * Get the project that owns the file.
     */
    public function project()
    {
        return $this->belongsTo(Project::class, 'project_id');
    }
}

