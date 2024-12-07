<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\StudentResource;
use App\Models\Student;
use Illuminate\Http\Request;

class StudnetController extends Controller
{
    public function index(){
        // return Student::get();
        $students= Student::get();
        return  StudentResource::collection($students);
    }
    public function show($id){
        $student = Student::findorfail($id);
        // return $student;
        return new StudentResource($student);
    }
}
