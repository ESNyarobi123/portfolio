@extends('layouts.admin')

@section('content')
    <div class="header">
        <h1>Edit Project</h1>
        <a href="{{ route('admin.projects.index') }}" class="btn btn-primary">Back to List</a>
    </div>

    <div class="card" style="max-width: 600px;">
        <form action="{{ route('admin.projects.update', $project) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label>Title</label>
                <input type="text" name="title" value="{{ $project->title }}" required class="form-control">
            </div>
            <div class="form-group">
                <label>Category</label>
                <input type="text" name="category" value="{{ $project->category }}" required class="form-control">
            </div>
            <div class="form-group">
                <label>Image</label>
                @if($project->image)
                    <div style="margin-bottom: 10px;">
                        <img src="{{ asset('storage/' . $project->image) }}" alt="" style="width: 100px; border-radius: 4px;">
                    </div>
                @endif
                <input type="file" name="image" class="form-control">
            </div>
            <div class="form-group">
                <label>Link</label>
                <input type="url" name="link" value="{{ $project->link }}" class="form-control">
            </div>
            <div class="form-group">
                <label>Description</label>
                <textarea name="description" class="form-control" rows="4">{{ $project->description }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Update Project</button>
        </form>
    </div>
@endsection
