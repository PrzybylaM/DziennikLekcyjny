<?php

namespace App\Http\Controllers;

use App\Models\Grade;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DbController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function showListStudents()
    {
        $studentsList = DB::table('users')
            ->where('role', 'uczen')
            ->get();

        return view('students', ['students'=>$studentsList]);
    }

    public function showListTeachers()
    {
        $teachersList = DB::table('users')
            ->where('role', 'nauczyciel')
            ->get();

        return view('teachers', ['teachers'=>$teachersList]);
    }


    public function showStudentsGradeAndLogs(Request $request)
    {
        $user = Auth::user();
        $phrase = $request->input('phrase', '');

        $gradesQuery = $this->getDataForCurrentRole($user, $phrase);

        if ($phrase) {
            $gradesQuery = $gradesQuery
                ->rightJoin('users', 'users.id', '=', 'grades.teacher_id')
                ->where('users.subject', 'LIKE', '%' . $phrase . '%');
        }

        $gradeLogs = $this->getDataForCurrentRole($user, null);
        $gradeLogs->orderBy('updated_at', 'desc');

        return view('class_journal', ['journalStudent'=>$gradesQuery->paginate(15, '*', 'page1'), 'gradeLogs'=>$gradeLogs->paginate(4)]);
    }


    private function getDataForCurrentRole(?\Illuminate\Contracts\Auth\Authenticatable $user, mixed $phrase): \Illuminate\Database\Eloquent\Builder
    {
        $gradesQuery = Grade::query();

        if ($user->isStudent()) {
            $gradesQuery = Grade::where('student_id', $user->id);
        }

        if ($user->isTeacher()) {
            $gradesQuery = Grade::where('teacher_id', $user->id);
        }

        return $gradesQuery;
    }
}
