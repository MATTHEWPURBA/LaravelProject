@extends('layout.template')
<!-- START DATA -->
@section('content')
<div class="my-3 p-3 bg-body rounded shadow-sm">

    <!-- TOMBOL TAMBAH DATA -->
    <div class="pb-3">
        <a href="{{ url('/project/create') }}" class="btn btn-primary">+ Tambah Data</a>
    </div>

    <!-- PROJECT CARDS -->
    <div class="row">
        @foreach($data as $project)
        <div class="col-md-4 mb-4">
            <div class="card h-100">
                <div class="card-body">
                    <h5 class="card-title">{{ $project->project_name }}</h5>
                    <p class="card-text">{{ $project->project_description }}</p>
                    <p class="card-text"><strong>Deadline:</strong> {{ $project->deadline }}</p>
                    <div class="d-flex justify-content-between">
                        <a href="{{ url('projects/edit/' . $project->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ url('projects/' . $project->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
<!-- AKHIR DATA -->
