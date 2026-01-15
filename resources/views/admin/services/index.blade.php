@extends('layouts.admin')

@section('content')
    <div class="header">
        <h1>Services</h1>
        <a href="{{ route('admin.services.create') }}" class="btn btn-primary">Add New Service</a>
    </div>

    <div class="card">
        <table>
            <thead>
                <tr>
                    <th>Icon</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($services as $service)
                    <tr>
                        <td><i class="{{ $service->icon ?? 'fas fa-code' }}"></i></td>
                        <td>{{ $service->title }}</td>
                        <td>{{ Str::limit($service->description, 50) }}</td>
                        <td>
                            <a href="{{ route('admin.services.edit', $service) }}" class="btn btn-primary" style="padding: 5px 10px; font-size: 12px;">Edit</a>
                            <form action="{{ route('admin.services.destroy', $service) }}" method="POST" style="display: inline-block;">
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
