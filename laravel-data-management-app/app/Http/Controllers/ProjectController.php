<?php

namespace App\Http\Controllers;

use App\Models\project;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = project::all();

        return view('projects/index')->with('data',$data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('projects.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (Auth::check()) {
            $userId = Auth::id();
    
           // Validate the incoming request data with custom messages
        $validatedData = $request->validate([
            'project_name' => 'required|string|max:255',
            'project_description' => 'required|string',
            'deadline' => 'required|date|after:today',
        ], [
            'project_name.required' => 'The project name is required.',
            'project_name.max' => 'The project name must not exceed 255 characters.',
            'project_description.required' => 'The project description is required.',
            'deadline.required' => 'The deadline is required.',
            'deadline.date' => 'The deadline must be a valid date.',
            'deadline.after' => 'The deadline must be a future date.',
        ]);

        // Create the project with validated data
        $data = [
            'project_name' => $validatedData['project_name'],
            'project_description' => $validatedData['project_description'],
            'deadline' => $validatedData['deadline'],
            'created_by' => $userId,
            'updated_by' => $userId,
            'created_at' => now(),
            'updated_at' => now(),
        ];

            project::create($data);
    
            $data1 = project::all();

            return view('projects/index')->with('data',$data1);
            } else {
            return redirect()->route('login')->with('error', 'You must be logged in to create a project.');
        }
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = project::where('id', $id)->first();
        return view('projects/edit')->with('data', $data);
    }
 
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if (Auth::check()) {
            $userId = Auth::id();
    
           // Validate the incoming request data with custom messages
        $validatedData = $request->validate([
            'project_name' => 'required|string|max:255',
            'project_description' => 'required|string',
            'deadline' => 'required|date|after:today',
        ], [
            'project_name.required' => 'The project name is required.',
            'project_name.max' => 'The project name must not exceed 255 characters.',
            'project_description.required' => 'The project description is required.',
            'deadline.required' => 'The deadline is required.',
            'deadline.date' => 'The deadline must be a valid date.',
            'deadline.after' => 'The deadline must be a future date.',
        ]);

        // Create the project with validated data
        $data = [
            'project_name' => $validatedData['project_name'],
            'project_description' => $validatedData['project_description'],
            'deadline' => $validatedData['deadline'],
            'created_by' => $userId,
            'updated_by' => $userId,
            'created_at' => now(),
            'updated_at' => now(),
        ];

        project::where('id',$id)->update($data);

        return redirect('/project')->with('success','Berhasil Update Data');
            
    } else {
            return redirect()->route('login')->with('error', 'You must be logged in to create a project.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        project::where('id',$id)->delete();
        return redirect('/project')->with('success','Berhasil Hapus Data');

    }
}
