<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProgressReport;
use App\Models\Subject;
use Illuminate\Support\Facades\Auth;

class ProgressReportController extends Controller
{
public function index()
{
    return ProgressReport::with('subject')->get();
}

    public function store(Request $request)
    {
        $validated = $request->validate([
            'subject_id' => 'required|exists:subjects,id',
            'week_start' => 'required|date',
            'planned_hours' => 'required|numeric',
            'studied_hours' => 'required|numeric',
        ]);

        $validated['user_id'] = Auth::id();

        return ProgressReport::create($validated);
    }

    public function show($id)
    {
        $report = ProgressReport::where('id', $id)
            ->where('user_id', Auth::id())
            ->with('subject')
            ->firstOrFail();

        return $report;
    }

    public function update(Request $request, $id)
    {
        $report = ProgressReport::where('id', $id)
            ->where('user_id', Auth::id())
            ->firstOrFail();

        $validated = $request->validate([
            'planned_hours' => 'nullable|numeric',
            'studied_hours' => 'nullable|numeric',
        ]);

        $report->update($validated);

        return $report;
    }

    public function destroy($id)
    {
        $report = ProgressReport::where('id', $id)
            ->where('user_id', Auth::id())
            ->firstOrFail();

        $report->delete();

        return response()->json(['message' => 'Deleted']);
    }
}