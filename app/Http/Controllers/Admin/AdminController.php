<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Project;
use App\Models\Service;
use App\Models\Message;
use App\Models\Skill;

class AdminController extends Controller
{
    public function index()
    {
        $projectsCount = Project::count();
        $servicesCount = Service::count();
        $messagesCount = Message::count();
        $skillsCount = Skill::count();

        return view('admin.dashboard', compact('projectsCount', 'servicesCount', 'messagesCount', 'skillsCount'));
    }
}
