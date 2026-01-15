@extends('layouts.admin')

@section('content')
    <div class="header">
        <h1>Add Stat</h1>
        <a href="{{ route('admin.stats.index') }}" class="btn btn-primary">Back to List</a>
    </div>

    <div class="card" style="max-width: 600px;">
        <form action="{{ route('admin.stats.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label>Label</label>
                <input type="text" name="label" required class="form-control" placeholder="e.g. Projects Completed">
            </div>
            <div class="form-group">
                <label>Value</label>
                <input type="text" name="value" required class="form-control" placeholder="e.g. 150+">
            </div>
            <button type="submit" class="btn btn-primary">Create Stat</button>
        </form>
    </div>
@endsection
