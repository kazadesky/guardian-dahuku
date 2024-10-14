<?php

namespace App\Http\Controllers;

use App\Models\MonthlyPayment;
use App\Models\StudentAchievement;
use App\Models\StudentGuardian;
use App\Models\StudentMisconduct;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ContentController extends Controller
{
    public function dashboard()
    {
        $title = "Dashboard";
        $user = Auth::user()->student->id;
        $student = StudentGuardian::with("student")->where('student_id', $user)->first();
        return view("pages.contents.dashboard", [
            'title' => $title,
            'studentGuardian' => $student
        ]);
    }

    public function payment()
    {
        $title = "Pembayaran";
        $currentYear = Carbon::now()->year;
        $user = Auth::user()->student->id;
        $payments = MonthlyPayment::with("student", "month")
            ->where('student_id', $user)
            ->orderBy('year', 'asc')
            ->orderBy('moon_id', "asc")
            ->paginate(12);
        return view("pages.contents.monthly-payment", compact('title', 'payments'));
    }

    public function achievement()
    {
        $title = "Pencapaian";
        $user = Auth::user()->student->id;
        $achievements = StudentAchievement::with("teacher", "student", "updatedBy")->where("student_id", $user)->latest()->paginate(50);
        return view("pages.contents.student-achievement", compact('title', 'achievements'));
    }

    public function misconduct()
    {
        $title = "Pelanggaran";
        $user = Auth::user()->student->id;
        $misconducts = StudentMisconduct::with("teacher", "student", "updatedBy")->where("student_id", $user)->latest()->paginate(50);
        return view("pages.contents.student-misconduct", compact('title', 'misconducts'));
    }
}
