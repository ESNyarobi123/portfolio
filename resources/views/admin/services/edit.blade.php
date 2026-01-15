@extends('layouts.admin')

@section('content')
    <div class="header">
        <h1>Edit Service</h1>
        <a href="{{ route('admin.services.index') }}" class="btn btn-primary">Back to List</a>
    </div>

    <div class="card" style="max-width: 600px;">
        <form action="{{ route('admin.services.update', $service) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label>Title</label>
                <input type="text" name="title" value="{{ $service->title }}" required class="form-control">
            </div>
            <div class="form-group">
                <label>Icon (FontAwesome Class)</label>
                <input type="text" name="icon" value="{{ $service->icon }}" class="form-control">
            </div>
            <div class="form-group">
                <label>Description</label>
                <textarea name="description" required class="form-control" rows="4">{{ $service->description }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Update Service</button>
        </form>
    </div>
@endsection
