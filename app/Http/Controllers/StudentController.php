<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Team;
use App\Models\User;
use App\Models\Team_has_student;
use Illuminate\Http\Request;


class StudentController extends Controller
{
    // function __construct()
    // {
    //      $this->middleware('permission:grade-list|grade-create|grade-edit|grade-delete', ['only' => ['index','show']]);
    //      $this->middleware('permission:grade-create', ['only' => ['create','store']]);
    //      $this->middleware('permission:grade-edit', ['only' => ['edit','update']]);
    //      $this->middleware('permission:grade-delete', ['only' => ['destroy']]);
    // }

    public function index(Request $request)
    {
        $data = Student::orderBy('id', 'DESC')->paginate(5);
        return view('students.index', compact('data'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }


    public function edit($id)
    {
        $teams = Team::get();
        return view('students.team',compact('id','teams'));
    }

    public function store(Request $request)
    {

        $input = $request->all();
        // echo "<pre>";
        // var_dump($input);
        // echo "</pre>";

        Team_has_student::create([
            'team_id' => $request->input('team'),
            'student_id' => $request->input('student_id'),
        ]);


        //update team_id in students table
        $student = Student::find($request->input('student_id'));
        $teamname = Team::find($request->input('team'))->teamname;
        $student->update(array(
            'team_id' => $request->input('team'),
            'team_name' => $teamname,
        ));


        return redirect()->route('students.index')
            ->with('success', 'Uczeń został przypisany do klasy');
    }
}
