<?php

namespace App\Http\Controllers;

use App\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function create( Request $request){
        $student = new Student();
        $student->name = $request->input('name');
        $student->email = $request->input('email');
        $student->address = $request->input('address');

        $student->save();
        return response()->json($student);
    }
    public function show(){
        $student = Student::all();
        return response()->json($student);
    }
    public function showbyId($id){
        $student = Student::find($id);
        return response()->json($student);

    }
    public function updateStu(Request $request, $id){
        $student = Student::find($id);
        $student->name = $request->input('name');
        $student->email = $request->input('email');
        $student->address = $request->input('address');

        $student->save();
        return response()->json($student);
    }

    public function deleteStu(Request $request,$id){
        $student = Student::find($id);
        $student->delete();
        return response()->json($student);
    }
}
