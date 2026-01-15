@extends('layouts.admin')

@section('content')
    <div class="header">
        <h1>Add Skill</h1>
        <a href="{{ route('admin.skills.index') }}" class="btn btn-primary">Back to List</a>
    </div>

    <div class="card" style="max-width: 600px;">
        <form action="{{ route('admin.skills.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label>Name</label>
                <input type="text" name="name" required class="form-control">
            </div>
            <div class="form-group">
                <label>Percentage (0-100)</label>
                <input type="number" name="percentage" required min="0" max="100" class="form-control">
            </div>
            <div class="form-group">
                <label>Category</label>
                <select name="category" required class="form-control">
                    <option value="Development">Development</option>
                    <option value="Design">Design</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Create Skill</button>
        </form>
    </div>
@endsection
