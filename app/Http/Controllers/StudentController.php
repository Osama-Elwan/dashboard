<?php

namespace App\Http\Controllers;

use App\Http\Requests\StudentRequest;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index(){
        $data = Student::get();

        return view('admin.students.index',compact('data'));
    }

    public function create(){
        return view('admin.students.create');
    }

    public function store(StudentRequest $requset){
        
    }
}
