<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class project extends Model
{
    use HasFactory;
    protected $table = 'projects';

    // Specify which attributes are mass assignable
    protected $fillable = [
        'project_name',
        'project_description',
        'deadline',
        'created_by',
        'updated_by',
        'created_at',
        'updated_at',
    ];

    // Disable timestamps if you are manually handling them, otherwise you can remove this line
    // public $timestamps = false;

    protected $dates = ['deadline'];

    protected $casts = [
        'deadline' => 'datetime',
    ];


    /**
     * Get the user that created the project.
     */
    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }


      /**
     * Get the user that last updated the project.
     */
    public function updater()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }

    public function files()
{
    return $this->hasMany(ProjectFile::class, 'project_id');
}
}
