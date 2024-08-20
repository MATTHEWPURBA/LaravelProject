<?php

namespace App\Http\Controllers;

use App\Models\ProjectFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProjectFileController extends Controller
{
    /**
     * Store a newly uploaded file in storage.
     */
    public function store(Request $request, $projectId)
    {
        $request->validate([
            'file' => 'required|file|max:10240', // Limit file size to 10MB
        ]);

        $userId = Auth::id();

        // Store the file
        $path = $request->file('file')->store('project_files');

        // Create the ProjectFile record
        ProjectFile::create([
            'project_id' => $projectId,
            'file' => $path,
            'mime_type' => $request->file('file')->getClientMimeType(),
            'created_by' => $userId,
            'updated_by' => $userId,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return back()->with('success', 'File uploaded successfully.');
    }

    /**
     * Delete a file from storage.
     */
    public function destroy($id)
    {
        $file = ProjectFile::findOrFail($id);

        // Delete the file from storage
        Storage::delete($file->file);

        // Delete the record from the database
        $file->delete();

        return back()->with('success', 'File deleted successfully.');
    }
}
