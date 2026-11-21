<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Classroom;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ClassroomController extends Controller
{
    //
    public function index()
    {
        $classrooms = Classroom::all();

        return view('classroom.index', [
            'title' => 'Classroom',
            'classrooms' => $classrooms
        ]);
    }

    public function create(): View
    {
        return view('classroom.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:50'],
            'major' => ['required', 'string', 'max:50'],
        ]);

        Classroom::create($validated);

        return redirect()->route('admin.classrooms.index')->with('success', 'Data kelas berhasil ditambahkan.');
    }

    public function destroy(string $classroom): RedirectResponse
    {
        $classroom = Classroom::findOrFail($classroom);

        if ($classroom->students()->exists()) {
            return redirect()->back()->with('error', 'Kelas tidak dapat dihapus karena masih memiliki siswa.');
        }

        $classroom->delete();

        return redirect()->back()->with('success', 'Data kelas berhasil dihapus.');
    }

    public function edit(string $classroom)
    {
        $classroom = Classroom::findOrFail($classroom);

        return view('classroom.edit', ['classroom' => $classroom]);
    }

    public function update(Request $request, string $classroom): RedirectResponse
    {
        $classroom = Classroom::findOrFail($classroom);

        $validated = $request->validate([
            'name' => ['required', 'string', 'max:50'],
            'major' => ['required', 'string', 'max:50'],
        ]);

        $classroom->update($validated);

        return redirect()->route('admin.classrooms.index')->with('success', 'Data kelas berhasil diperbarui.');
    }
}
