<?php

namespace App\Http\Controllers\Api;

use App\Models\Student;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class StudentController extends Controller
{
    public function index()
    {
        return response()->json(Student::all());
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'grade' => 'required|in:X,XI,XII',
            'name' => 'required',
            'nis' => 'required|unique:students',
            'rombel' => 'required',
            'password' => 'required',
            'photo_profile' => 'nullable|file|mimes:jpg,png,jpeg|max:2048',
            'cv' => 'nullable|file|mimes:pdf',
            'kartu_pelajar' => 'nullable|file|mimes:jpg,png,jpeg',
            'ig' => 'nullable|string',
            'linkedin' => 'nullable|string',
        ]);

        // upload files
        if ($request->hasFile('photo_profile')) {
            $validated['photo_profile'] = $request->file('photo_profile')->store('photo_profile', 'public');
        }
        if ($request->hasFile('cv')) {
            $validated['cv'] = $request->file('cv')->store('cv', 'public');
        }
        if ($request->hasFile('kartu_pelajar')) {
            $validated['kartu_pelajar'] = $request->file('kartu_pelajar')->store('kartu_pelajar', 'public');
        }

        $validated['password'] = Hash::make($validated['password']);

        $student = Student::create($validated);

        return response()->json($student, 201);
    }

    public function show(Student $student)
    {
        return response()->json($student);
    }

    public function update(Request $request, Student $student)
    {
        $student->update($request->all());
        return response()->json($student);
    }

    public function destroy(Student $student)
    {
        $student->delete();
        return response()->json(['message' => 'deleted']);
    }
}
