<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Teacher;
use App\Models\Subject;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class TeacherController extends Controller
{
    //
    public function index()
    {
        $teachers = Teacher::all();

        return view('admin.Teacher', [
            'title' => 'Teacher',
            'teachers' => $teachers,
        ]);
    }

    public function create(): View
    {
        return view('admin.teacher-create', [
            'subjects' => Subject::doesntHave('teacher')->get(),
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'niy' => ['required', 'integer', 'digits_between:1,10', 'unique:teachers,niy'],
            'subject_id' => ['required', 'exists:subjects,id', 'unique:teachers,subject_id'],
            'start_date' => ['required', 'date'],
        ], [
            'niy.digits_between' => 'NIY harus terdiri dari 1 sampai 10 digit.',
            'niy.unique' => 'NIY sudah digunakan. Masukkan NIY yang lain.',
        ]);

        Teacher::create($validated);

        return redirect()->route('admin.teachers.index')->with('success', 'Data guru berhasil ditambahkan.');
    }

    public function destroy(string $teacher): RedirectResponse
    {
        $teacher = Teacher::findOrFail($teacher);
        $teacher->delete();

        return redirect()->back()->with('success', 'Data guru berhasil dihapus.');
    }
}
