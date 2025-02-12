<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Course;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $students = Student::with(['courses', 'payments'])->get();  

        $filter = $request->input('filter', 'all'); 

        foreach ($students as $student) {
            if ($student->courses) 
            {
                
                $student->total_fee = $student->courses->duration * $student->courses->fee_per_month;
            } 
            else
            {
                $student->total_fee = 0;  
            }
             
            $student->amount_paid = $student->payments->sum('amount_paid');
    
            $student->remaining_balance = $student->total_fee - $student->amount_paid;
        }

        return view('admin.reports.student', compact('students', 'filter'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function studentReport(Request $request)
    {
        $filter = $request->input('filter', 'all'); 

    
        $students = Student::with(['courses', 'payments'])->get();

        foreach ($students as $student) {
            if ($student->courses) {
                
                $student->total_fee = $student->courses->duration * $student->courses->fee_per_month;
            } else {
                $student->total_fee = 0;
            }

            
            $student->amount_paid = $student->payments->sum('amount_paid');

            
            $student->remaining_balance = $student->total_fee - $student->amount_paid;
        }

        
        if ($filter == 'pending') {
            $students = $students->filter(function ($student) {
                return $student->remaining_balance > 0;
            });
        }

        return view('admin.reports.student', compact('students', 'filter'));

    }
}
