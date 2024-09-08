<?php

namespace App\Http\Controllers;

use App\Http\Requests\StudentRequest;
use App\Models\Department;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index(){
        $data = Student::get();

        return view('admin.students.index',compact('data'));
    }

    public function create(){
        $dapartments = Department::get();

        return view('admin.students.create',compact('dapartments'));
    }

    public function store(StudentRequest $requset){
        Student::create([
            'code'=> $requset->code,
            'name'=> $requset->name,
            'email'=> $requset->email,
            'phone'=> $requset->phone,
            'dept_id'=> $requset->department,
        ]);
        return redirect()->back()->with('msg','added successfully');
    }

    public function show($id){
        $student = Student::findorfail($id);
        return view('admin.students.show',compact('student'));
    }

    public function edit($id){
        $student = Student::findorfail($id);
        $dapartments = Department::get();
        return view('admin.students.edit',compact('dapartments','student'));
    }
    public function update(StudentRequest $requset , $id){
        $student = Student::findorfail($id);
        $student->update([
            'name'=> $requset->name,
            'email'=> $requset->email,
            'phone'=> $requset->phone,
            'dept_id'=> $requset->department,
        ]);
        return redirect()->back()->with('msg','Updated successfully');
    }
    public function destroy($id){
        Student::destroy($id);
        return redirect()->back()->with('msg','Deleted successfully');

    }
    public function archive(){
        $data = Student::get();
        return view('admin.students.archive',compact('data'));
    }
}
