<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Subject;
use Illuminate\Support\Facades\Auth;

class SubjectController extends Controller
{
    // Show all subjects for the logged-in user
    public function index()
    {
        return Subject::where('user_id', Auth::id())->get();
    }

    // Store a new subject for the logged-in user
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        return Subject::create([
            'name' => $request->name,
            'user_id' => Auth::id(),
        ]);
    }

    // Show a single subject if it belongs to the logged-in user
    public function show($id)
    {
        $subject = Subject::where('id', $id)
                          ->where('user_id', Auth::id())
                          ->firstOrFail();

        return response()->json($subject);
    }

    // Update a subject if it belongs to the logged-in user
    public function update(Request $request, $id)
    {
        $subject = Subject::where('id', $id)
                          ->where('user_id', Auth::id())
                          ->firstOrFail();

        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $subject->update([
            'name' => $request->name,
        ]);

        return response()->json(['message' => 'Subject updated successfully', 'subject' => $subject]);
    }

    // Delete a subject if it belongs to the logged-in user
    public function destroy($id)
    {
        $subject = Subject::where('id', $id)
                          ->where('user_id', Auth::id())
                          ->firstOrFail();

        $subject->delete();

        return response()->json(['message' => 'Subject deleted successfully']);
    }
}