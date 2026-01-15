<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Stat;
use Illuminate\Http\Request;

class StatController extends Controller
{
    public function index()
    {
        $stats = Stat::all();
        return view('admin.stats.index', compact('stats'));
    }

    public function create()
    {
        return view('admin.stats.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'label' => 'required|string|max:255',
            'value' => 'required|string|max:255',
            'icon' => 'nullable|string|max:255',
        ]);

        Stat::create($validated);

        return redirect()->route('admin.stats.index')->with('success', 'Stat created successfully!');
    }

    public function edit(Stat $stat)
    {
        return view('admin.stats.edit', compact('stat'));
    }

    public function update(Request $request, Stat $stat)
    {
        $validated = $request->validate([
            'label' => 'required|string|max:255',
            'value' => 'required|string|max:255',
            'icon' => 'nullable|string|max:255',
        ]);

        $stat->update($validated);

        return redirect()->route('admin.stats.index')->with('success', 'Stat updated successfully!');
    }

    public function destroy(Stat $stat)
    {
        $stat->delete();
        return back()->with('success', 'Stat deleted successfully!');
    }
}
