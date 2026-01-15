@extends('layouts.admin')

@section('content')
    <div class="header">
        <h1>Edit Stat</h1>
        <a href="{{ route('admin.stats.index') }}" class="btn btn-primary">Back to List</a>
    </div>

    <div class="card" style="max-width: 600px;">
        <form action="{{ route('admin.stats.update', $stat) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label>Label</label>
                <input type="text" name="label" value="{{ $stat->label }}" required class="form-control">
            </div>
            <div class="form-group">
                <label>Value</label>
                <input type="text" name="value" value="{{ $stat->value }}" required class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">Update Stat</button>
        </form>
    </div>
@endsection
