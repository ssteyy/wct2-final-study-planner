<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StudySession;
use App\Models\Subject;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class StudySessionController extends Controller
{
    public function index()
    {
        return StudySession::whereHas('subject', function ($query) {
            $query->where('user_id', Auth::id());
        })->with('subject')->get();
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'subject_id' => 'required|exists:subjects,id',
            'date' => 'required|date',
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i|after:start_time',
            'note' => 'nullable|string',
        ]);

        $subject = Subject::where('id', $validated['subject_id'])
            ->where('user_id', Auth::id())
            ->firstOrFail();

        return StudySession::create($validated);
    }

    public function show($id)
    {
        $session = StudySession::with('subject')->findOrFail($id);

        if ($session->subject->user_id !== Auth::id()) {
            abort(403, 'Unauthorized access');
        }

        return $session;
    }

    public function update(Request $request, $id)
    {
        $session = StudySession::findOrFail($id);

        if ($session->subject->user_id !== Auth::id()) {
            abort(403, 'Unauthorized access');
        }

        $validated = $request->validate([
            'date' => 'sometimes|date',
            'start_time' => 'sometimes|date_format:H:i',
            'end_time' => 'sometimes|date_format:H:i|after:start_time',
            'note' => 'nullable|string',
        ]);

        $session->update($validated);

        return $session;
    }

    public function destroy($id)
    {
        $session = StudySession::findOrFail($id);

        if ($session->subject->user_id !== Auth::id()) {
            abort(403, 'Unauthorized access');
        }

        $session->delete();

        return response()->json(['message' => 'Study session deleted']);
    }

    public function weeklyProgress()
    {
        $subjects = Subject::where('user_id', Auth::id())->with('studySessions')->get();

        $report = [];

        foreach ($subjects as $subject) {
            $hours = $subject->studySessions()
                ->whereBetween('date', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])
                ->get()
                ->reduce(function ($carry, $session) {
                    $start = Carbon::parse($session->start_time);
                    $end = Carbon::parse($session->end_time);
                    return $carry + $end->diffInMinutes($start) / 60;
                }, 0);

            $report[] = [
                'subject' => $subject->name,
                'hours_studied' => round($hours, 2),
            ];
        }

        return response()->json($report);
    }
}