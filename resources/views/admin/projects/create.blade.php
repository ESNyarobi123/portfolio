@extends('layouts.admin')

@section('content')
    <div class="header">
        <h1>Add Project</h1>
        <a href="{{ route('admin.projects.index') }}" class="btn btn-primary">Back to List</a>
    </div>

    <div class="card" style="max-width: 600px;">
        <form action="{{ route('admin.projects.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label>Title</label>
                <input type="text" name="title" required class="form-control">
            </div>
            <div class="form-group">
                <label>Category</label>
                <input type="text" name="category" required class="form-control" placeholder="e.g. Web Design, App Development">
            </div>
            <div class="form-group">
                <label>Image</label>
                <input type="file" name="image" class="form-control">
            </div>
            <div class="form-group">
                <label>Link</label>
                <input type="url" name="link" class="form-control">
            </div>
            <div class="form-group">
                <label>Description</label>
                <textarea name="description" class="form-control" rows="4"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Create Project</button>
        </form>
    </div>
@endsection
