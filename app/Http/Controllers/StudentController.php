<?php

namespace App\Http\Controllers;

use App\Http\Requests\StudentRequest;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index(){
        return view('admin.students.index');
    }

    public function create(){
        return view('admin.students.create');
    }

    public function store(StudentRequest $requset){

    }
}
