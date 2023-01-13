<?php

namespace App\Http\Controllers;

use App\Models\Grade;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TeacherController extends Controller
{
    public function addGrade(Request $request)
    {
        $data = $request->all();

        Grade::create($data);

        return redirect()->action([\App\Http\Controllers\DbController::class, 'showStudentsGradeAndLogs']);
    }

    public function newGrade()
    {
        $students = DB::table('users')
            ->where('role', 'uczen')
            ->get();

        return view('grades.new', ['students'=>$students]);
    }

    public function updateGrade(Request $request, Grade $grade)
    {
        $data = $request->all();

        $grade->update($data);

        return redirect()->action([\App\Http\Controllers\DbController::class, 'showStudentsGradeAndLogs']);
    }

    public function editGrade(Grade $grade)
    {
        $students = DB::table('users')
            ->where('role', 'uczen')
            ->get();

        return view('grades.edit', ['students'=>$students, 'grade'=>$grade]);
    }

    public function approveGrade(Grade $grade)
    {
        return view('grades.delete', ['grade'=>$grade]);
    }

    public function deleteGrade(Grade $grade)
    {
        $grade->delete();

        return redirect()->action([\App\Http\Controllers\DbController::class, 'showStudentsGradeAndLogs']);
    }
}
