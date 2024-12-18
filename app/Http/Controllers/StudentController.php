<?php

namespace App\Http\Controllers;

use App\Http\Requests\StudentRequest;
use App\Models\Course;
use App\Models\Department;
use App\Models\Student;
use App\Models\Tablet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
//test
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class StudentController extends Controller
// implements \Illuminate\Routing\Controllers\HasMiddleware
{

//     public static function middleware(): array
// {
//     return [
//         new Middleware(middleware: 'isAdmin'),
//     ];
// }

    public function index(){
        // if(Auth::user()->role != 'admin'){
            // return redirect()->route('login');
        // }
        $data = Student::get();

        return view('admin.students.index',compact('data'));
    }

    public function create(){
        $dapartments = Department::get();

        return view('admin.students.create',compact('dapartments'));
    }

    public function store(StudentRequest $requset){
        // return $requset->file('photo');//tmp_name
        // return $requset->file('photo')->getClientOriginalName(); //name
        // return $requset->file('photo')->getClientOriginalExtension(); //Extention


        //     $photo=$requset->file('photo')->storeAs('uploads',$requset->file('photo')->getClientOriginalName());

        // Student::create([
        //     'code'=> $requset->code,
        //     'name'=> $requset->name,
        //     'email'=> $requset->email,
        //     'phone'=> $requset->phone,
        //     'dept_id'=> $requset->dept_id,
        //     'photo'=> $photo,
        // ]);
        // return redirect()->back()->with('msg','added successfully');
        $data =$requset->validated();
        if(!empty($requset->photo)){
        $file= $requset->file('photo');
        $photoExt = $file->getClientOriginalExtension();
        $photoName = $requset->code.'.'. $photoExt;
        $photo = $file->storeAs('uploads',$photoName);
        $data['photo']=$photo;

        }
        // dd($data);

        Student::create($data);
        return redirect()->back()->with('msg','added successfully');

    }

    public function show($id){
        $courses=Course::get();
        $student = Student::findorfail($id);
        // return $student->courses;
        // dd($student->photo);
        // return $student->tablet;
        return view('admin.students.show',compact('student','courses'));
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
            'dept_id'=> $requset->dept_id,
        ]);
        return redirect()->back()->with('msg','Updated successfully');
    }
    public function destroy($id){
        Student::destroy($id);
        return redirect()->back()->with('msg','Deleted successfully');

    }
    public function archive(){
        $data = Student::onlyTrashed()->get();
        return view('admin.students.archive',compact('data'));
    }
    // public function forceDelete($id){
    //     // $student= Student::withTrashed()
    //     // ->where('code',$id)->get();
    //     // ;
    //     $student= Student::withTrashed()
    //     ->where('code',$id);
    //     if(!empty($student->photo) && Storage::exists($student->photo)){
    //         Storage::delete($student->photo);
    //         if(Storage::files('uploads')){
    //             Storage::deleteDirectory('uploads');
    //         }
    //     }
    //     $student->forceDelete();
    //     ;
    //     return redirect()->back()->with('msg','Deleted successfully');
    // }

    public function forceDelete($id)
    {
        // Retrieve the student record with trashed entries
        $student = Student::withTrashed()->where('code', $id)->first();

        if ($student) {

            if (!empty($student->photo) && Storage::exists($student->photo)) {
                Storage::delete($student->photo);
            }

            // Check if there are any files in the 'uploads' directory and delete the directory if it's empty
            if (Storage::exists('uploads') && empty(Storage::files('uploads'))) {
                Storage::deleteDirectory('uploads');
            }


            $student->forceDelete();


            return redirect()->back()->with('msg', 'Deleted successfully');
        }

        // Return an error message if the student was not found
        return redirect()->back()->with('error', 'Student not found.');
    }




    public function restore($id){
        $student= Student::withTrashed()
        ->where('code',$id);
        $student->restore();
        ;
        return redirect()->route('users.index')->with('msg','Restored  successfully');

    }


    public function addCourses(Request $request,$id){
        $student =Student::findorfail($id);
        // $student->courses()->attach($request->courses);
        // $student->courses()->sync($request->courses);
        $student->courses()->syncWithoutDetaching($request->courses);
        return redirect()->back();
    }
}
