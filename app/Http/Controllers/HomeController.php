<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\Skill;
use App\Models\Project;
use App\Models\Stat;
use App\Models\Setting;
use App\Models\Message;

class HomeController extends Controller
{
    public function index()
    {
        $services = Service::all();
        $skills = Skill::all();
        $projects = Project::all();
        $stats = Stat::all();
        $settings = Setting::pluck('value', 'key')->toArray();

        return view('portfolio', compact('services', 'skills', 'projects', 'stats', 'settings'));
    }

    public function contact(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        Message::create($validated);

        return back()->with('success', 'Message sent successfully!');
    }
}
