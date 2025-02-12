<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Course;
use Brian2694\Toastr\Facades\Toastr;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = Student::with('courses')->get();

        foreach ($students as $student) {
            if ($student->courses) {
                $student->total_fee = $student->courses->duration * $student->courses->fee_per_month;
            } else {
                $student->total_fee = 0; 
            }
        }

        return view('admin.students.index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $courses = Course::all();

        return view('admin.students.create',compact('courses'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:students',
            'phone' => 'required',
            'course_id' => 'required',
            'dob' => 'required|date',
            'address' => 'required|string',
        ]);

        $status = Student::create($request->all());

        $status ? Toastr::success("Student has been added!", "Success", ["positionClass" => "toast-bottom-left"]) : Toastr::error("Some error occurred", "Error", ["positionClass" => "toast-bottom-left"]);

        return redirect()->route('students.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $student = Student::findOrFail($id);
       
        if($student->status == 0)
        {
            $student->status = 1;
            Toastr::success("Student enabled!","Success",["positionClass" => "toast-bottom-left"]);
        }
        else
        {
            $student->status = 0;
            Toastr::success("Student disabled!","Success",["positionClass" => "toast-bottom-left"]);
        }

        $student->save();

        return redirect()->back();
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $student = Student::find($id);
        $courses = Course::all();

        return view('admin.students.edit', compact('student','courses'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required',
            'course_id' => 'required',
            'dob' => 'required|date',
            'address' => 'required|string',
        ]);

        $formData = $request->all();  
        unset($formData['_token']);
        unset($formData['_method']);

        $status = Student::where('id', $id)->update($formData);
        $status ? Toastr::success("Student details have been updated!", "Success", ["positionClass" => "toast-bottom-left"]) : Toastr::error("Some error occurred","Error",["positionClass" => "toast-bottom-left"]);

        return redirect(route('students.index'));


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
