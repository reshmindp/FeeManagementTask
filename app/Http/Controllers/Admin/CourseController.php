<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Course;
use Brian2694\Toastr\Facades\Toastr;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $courses = Course::withCount('students')->get();

        return view('admin.courses.index',compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.courses.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'duration' => 'required|integer|min:1',
            'fee_per_month' => 'required|numeric|min:1',
        ]);

        $status = Course::create($request->all());

        $status ? Toastr::success("Course has been added!", "Success", ["positionClass" => "toast-bottom-left"]) : Toastr::error("Some error occurred", "Error", ["positionClass" => "toast-bottom-left"]);

        return redirect()->route('courses.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $course = Course::find($id);

        return view('admin.courses.edit', compact('course'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'duration' => 'required|integer|min:1',
            'fee_per_month' => 'required|numeric|min:1',
        ]);

        $formData = $request->all();  
        unset($formData['_token']);
        unset($formData['_method']);
        

        $status = Course::where('id', $id)->update($formData);
        $status ? Toastr::success("Course details have been updated!", "Success", ["positionClass" => "toast-bottom-left"]) : Toastr::error("Some error occurred","Error",["positionClass" => "toast-bottom-left"]);

        return redirect(route('courses.index'));

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $status = Course::findOrFail($id)->delete();
        $status ? Toastr::success("Selected course has been deleted!", "Success", ["positionClass" => "toast-bottom-left"]) : Toastr::error("Some error occurred","Error",["positionClass" => "toast-bottom-left"]);
        
        return redirect()->back();
    }
}
