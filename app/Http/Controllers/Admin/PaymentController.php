<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Payment;
use App\Models\Student;
use Brian2694\Toastr\Facades\Toastr;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $payments = Payment::with(['student', 'course'])->get();

        $students = Student::with('courses')->get();

        return view('admin.payments.index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'student_id' => 'required',
            'course_id' => 'required',
            'date_of_payment'=>'required|date',
            'amount_paid' => 'required|numeric|min:1',
        ]);

        if($request->amount_paid > $request->remaining_amount) {
            return redirect()->back()->withErrors(['amount_paid' => 'Amount paid cannot be greater than the remaining amount.']);
        }

        $status = Payment::create($request->all());

        $status ? Toastr::success("Payment has been done!", "Success", ["positionClass" => "toast-bottom-left"]) : Toastr::error("Some error occurred", "Error", ["positionClass" => "toast-bottom-left"]);

        return redirect()->route('payments.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

        $student = Student::where('id', $id)->first();

        if (!$student) 
        {
            return redirect()->back()->with('error', 'Student not found.');
        }

        $payments = Payment::where('student_id', $id) ->orderBy('date_of_payment', 'desc')->get();

        return view('admin.payments.history', compact('payments','student'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $student = Student::where('id', $id)->with('courses')->first();

        $totalCourseFee = $student->courses->duration * $student->courses->fee_per_month;

        $totalPaid = Payment::where('student_id', $student->id)
            ->where('course_id', $student->course_id)
            ->sum('amount_paid');

        $remainingAmount = $totalCourseFee - $totalPaid;

        $student->total_fee = $totalCourseFee;
        $student->amount_paid = $totalPaid;
        $student->remaining_amount = max($remainingAmount, 0);

        return view('admin.payments.create', compact('student'));
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
}
