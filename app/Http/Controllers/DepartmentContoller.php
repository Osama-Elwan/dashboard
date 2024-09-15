<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentContoller extends Controller
{
    public function show($id){
        $department =Department::findorfail($id);
        $students=$department->students()->orderBy('name','desc')->get();
        // dd($students);
        foreach ($students as $student) {
            echo $student->name;
        }
    }
}
