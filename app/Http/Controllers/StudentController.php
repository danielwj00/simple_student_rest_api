<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index(){
        return Student::all();
    }

    public function show($id){
        return Student::findOrFail($id);
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required|max:255',
        ]);

        return Student::create($request->all());
    }

    public function edit(Request $request, $id){
        $student = Student::findOrFail($id);
        $request->validate([
            'name' => 'required|max:255',
        ]);

        $student->update($request->all());
        return $student;
    }

    public function delete($id){
        $student = Student::findOrFail($id);
        $student->delete();

        return 204;
    }
}
