<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subject;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class SubjectController extends Controller
{
    //
    public function index()
    {
        $subjects = Subject::all();

        return view('subjects.Subjects', [
            'title' => 'Subjects',
            'subjects' => $subjects,
        ]);
    }

    public function create(): View
    {
        return view('subjects.subject-create');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
        ]);

        Subject::create($validated);

        return redirect()->route('admin.subjects.index')->with('success', 'Data mata pelajaran berhasil ditambahkan.');
    }

    public function destroy(string $subject): RedirectResponse
    {
        $subject = Subject::findOrFail($subject);

        if ($subject->teacher()->exists()) {
            return redirect()->back()->with('error', 'Mata pelajaran tidak dapat dihapus karena masih digunakan oleh guru.');
        }

        $subject->delete();

        return redirect()->back()->with('success', 'Data mata pelajaran berhasil dihapus.');
    }
}
