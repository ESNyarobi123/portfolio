@extends('layouts.admin')

@section('content')
    <div class="header">
        <h1>Edit Skill</h1>
        <a href="{{ route('admin.skills.index') }}" class="btn btn-primary">Back to List</a>
    </div>

    <div class="card" style="max-width: 600px;">
        <form action="{{ route('admin.skills.update', $skill) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label>Name</label>
                <input type="text" name="name" value="{{ $skill->name }}" required class="form-control">
            </div>
            <div class="form-group">
                <label>Percentage (0-100)</label>
                <input type="number" name="percentage" value="{{ $skill->percentage }}" required min="0" max="100" class="form-control">
            </div>
            <div class="form-group">
                <label>Category</label>
                <select name="category" required class="form-control">
                    <option value="Development" {{ $skill->category == 'Development' ? 'selected' : '' }}>Development</option>
                    <option value="Design" {{ $skill->category == 'Design' ? 'selected' : '' }}>Design</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Update Skill</button>
        </form>
    </div>
@endsection
