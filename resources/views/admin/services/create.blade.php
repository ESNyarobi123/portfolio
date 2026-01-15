@extends('layouts.admin')

@section('content')
    <div class="header">
        <h1>Add Service</h1>
        <a href="{{ route('admin.services.index') }}" class="btn btn-primary">Back to List</a>
    </div>

    <div class="card" style="max-width: 600px;">
        <form action="{{ route('admin.services.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label>Title</label>
                <input type="text" name="title" required class="form-control">
            </div>
            <div class="form-group">
                <label>Icon (FontAwesome Class)</label>
                <input type="text" name="icon" class="form-control" placeholder="e.g. fas fa-code">
            </div>
            <div class="form-group">
                <label>Description</label>
                <textarea name="description" required class="form-control" rows="4"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Create Service</button>
        </form>
    </div>
@endsection
