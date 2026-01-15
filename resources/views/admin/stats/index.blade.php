@extends('layouts.admin')

@section('content')
    <div class="header">
        <h1>Stats</h1>
        <a href="{{ route('admin.stats.create') }}" class="btn btn-primary">Add New Stat</a>
    </div>

    <div class="card">
        <table>
            <thead>
                <tr>
                    <th>Label</th>
                    <th>Value</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($stats as $stat)
                    <tr>
                        <td>{{ $stat->label }}</td>
                        <td>{{ $stat->value }}</td>
                        <td>
                            <a href="{{ route('admin.stats.edit', $stat) }}" class="btn btn-primary" style="padding: 5px 10px; font-size: 12px;">Edit</a>
                            <form action="{{ route('admin.stats.destroy', $stat) }}" method="POST" style="display: inline-block;">
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
