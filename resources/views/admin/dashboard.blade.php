@extends('layouts.admin')

@section('content')
    <div class="header">
        <h1>Dashboard</h1>
    </div>

    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 20px;">
        <div class="card" style="text-align: center;">
            <i class="fas fa-briefcase" style="font-size: 30px; color: var(--primary-color); margin-bottom: 10px;"></i>
            <h3>{{ $projectsCount }}</h3>
            <p>Projects</p>
        </div>
        <div class="card" style="text-align: center;">
            <i class="fas fa-concierge-bell" style="font-size: 30px; color: #10b981; margin-bottom: 10px;"></i>
            <h3>{{ $servicesCount }}</h3>
            <p>Services</p>
        </div>
        <div class="card" style="text-align: center;">
            <i class="fas fa-graduation-cap" style="font-size: 30px; color: #f59e0b; margin-bottom: 10px;"></i>
            <h3>{{ $skillsCount }}</h3>
            <p>Skills</p>
        </div>
        <div class="card" style="text-align: center;">
            <i class="fas fa-envelope" style="font-size: 30px; color: #ef4444; margin-bottom: 10px;"></i>
            <h3>{{ $messagesCount }}</h3>
            <p>Messages</p>
        </div>
    </div>
@endsection
