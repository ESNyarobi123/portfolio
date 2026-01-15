@extends('layouts.admin')

@section('content')
    <div class="header">
        <h1>Skills</h1>
        <a href="{{ route('admin.skills.create') }}" class="btn btn-primary">Add New Skill</a>
    </div>

    <div class="card">
        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Percentage</th>
                    <th>Category</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($skills as $skill)
                    <tr>
                        <td>{{ $skill->name }}</td>
                        <td>{{ $skill->percentage }}%</td>
                        <td>{{ $skill->category }}</td>
                        <td>
                            <a href="{{ route('admin.skills.edit', $skill) }}" class="btn btn-primary" style="padding: 5px 10px; font-size: 12px;">Edit</a>
                            <form action="{{ route('admin.skills.destroy', $skill) }}" method="POST" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" style="padding: 5px 10px; font-size: 12px;" onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
