<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $courses = Course::get();
        // dd($courses);
        return view('site.index',compact('courses'));
    }
    public function about(){
        return view('site.about');
    }
}
