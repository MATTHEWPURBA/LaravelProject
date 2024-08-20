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
    
            $data = [
                'project_name' => $request->project_name,
                'project_description' => $request->project_description,
                'deadline' => $request->deadline,
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
        return 'abc';
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
