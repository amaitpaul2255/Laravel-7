<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Student;

class StudentController extends Controller
{
    public function index(){
        return view('Student.Create');
    }

    public function insert(Request $request){
        $vakidateData = $request->validate([
            'name' => "required | max:25 | min:4",
            'email' => 'required | unique:students',
            'phone' => "required | unique:students| max:11 | min:11",
        ]);

        //create models object
        $student  = new Student;
        //catch data
        $student->name = $request->name;
        $student->email = $request->email;
        $student->phone = $request->phone;
        $student->save();
        
        return Redirect()->route('all.student');

    }
    public function ViewAllStudent(){
        $student = Student::orderby('name', 'asc')
                    ->latest()
                    ->get();
        return view('Student.allstudent', compact('student'));
    }

    public function ViewStudent($id){
        //$student = DB::table('students')->where('id', $id)->first();
        $student = Student::findorfail($id);
        return view('Student.viewstudent', compact('student'));
    }

    public function destroy($id){
        $student = Student::findorfail($id);
        $student->delete();
        return Redirect()->back();
    }

    public function Editstudent($id){

        $student = Student::findorfail($id);
        return view('Student.editstudent', compact('student'));
    }

    public function update(Request $request, $id){
        $vakidateData = $request->validate([
            'name' => "required | max:25 | min:4",
            'email' => 'required',
            'phone' => "required | max:11 | min:11",
        ]);

        $student = Student::findorfail($id);

        $student->name = $request->name;
        $student->email = $request->email;
        $student->phone = $request->phone;
        $student->save();

        return Redirect()->route('all.student');
    }
}
