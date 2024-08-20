@extends('layout.template')
<!-- START FORM -->
@section('content')
 <form action="{{ route('project.update', $data->id) }}" method="post"> {{-- penggunaan url ini untuk arahin ke /project --}}
    @csrf
        @method('put')
        <div class="mb-3">
            <h1>Project : {{$data->project_name}} </h1>
        </div>
        <div class="my-3 p-3 bg-body rounded shadow-sm">
            <div class="mb-3 row">
                <label for="project_name" class="col-sm-2 col-form-label">Project Name</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name='project_name' id="project_name" value="{{$data->project_name}}">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="project_description" class="col-sm-2 col-form-label">Project Description</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name='project_description' id="description" value="{{$data->project_description}}">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="deadline" class="col-sm-2 col-form-label">Deadline</label>
                <div class="col-sm-10">
                    <input type="datetime-local" class="form-control" name='deadline' id="deadline" value="{{$data->deadline}}">
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-sm-2 col-form-label"></label>
                <div class="col-sm-10"><button type="submit" class="btn btn-primary" name="submit">Save Update</button></div>
            </div>
        </div>
    </form>
@endsection
    <!-- AKHIR FORM -->
