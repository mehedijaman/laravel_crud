<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\student;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Students = Student::all();
        return view('student.index', compact('Students'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('student.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $Student = new Student();

        $Student->name          = strtoupper($request->name);
        $Student->father_name   = $request->father_name;
        $Student->mother_name   = $request->mother_name;
        $Student->roll          = $request->roll;
        $Student->dob           = $request->dob;
        $Student->gender        = $request->gender;
        $Student->nationality   = $request->nationality;

        $Student->save();

        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $Student = Student::find($id);
        return view('student.edit', compact('Student'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $Student = Student::find($id);

        $Student->name          = strtoupper($request->name);
        $Student->father_name   = $request->father_name;
        $Student->mother_name   = $request->mother_name;
        $Student->roll          = $request->roll;
        $Student->dob           = $request->dob;
        $Student->gender        = $request->gender;
        $Student->nationality   = $request->nationality;

        $Student->save();

        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $Student = Student::find($id);
        $Student->delete();
        return back();
    }
}
