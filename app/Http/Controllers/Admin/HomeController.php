<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Student;
use App\Models\Course;
use App\Models\Payment;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {

        $totalRevenue = Payment::sum('amount_paid');
        $totalPendingFees = DB::table('students')
        ->join('courses', 'students.course_id', '=', 'courses.id')
        ->leftJoin('payments', 'students.id', '=', 'payments.student_id')
        ->selectRaw('SUM((courses.duration * courses.fee_per_month) - COALESCE(payments.amount_paid, 0)) AS total_pending_fees')
        ->value('total_pending_fees');

        $studentsPerCourse = Course::withCount('students')->get();

        return response()
        ->view('admin.dashboard', compact('totalRevenue', 'studentsPerCourse','totalPendingFees'))
        ->header('Cache-Control', 'no-cache, no-store, must-revalidate')
        ->header('Pragma', 'no-cache')
        ->header('Expires', '0');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
