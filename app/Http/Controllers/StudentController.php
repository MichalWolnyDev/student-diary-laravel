<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Team;
use App\Models\User;
use App\Models\Grades;
use App\Models\Subject;
use App\Models\Team_has_student;
use Illuminate\Http\Request;
use DB;


class StudentController extends Controller
{
   

    public function index(Request $request)
    {
        $data = Student::orderBy('id', 'DESC')->paginate(5);
        return view('students.index', compact('data'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }

    public function create(Request $request)
    {
        $input = $request->all();
          echo "<pre>";
        var_dump($input);
        echo "</pre>";
        $student_id = $input['id'];

        $subjects = Subject::all();
        return view('students.create', compact('student_id', 'subjects'));
    }

    public function show(Student $student)
    {
        // SELECT * FROM `team_has_students` INNER JOIN `students` ON `team_has_students`.`student_id`=`students`.`id` WHERE `team_id`= 1;


        $grades = DB::table('grades')
            ->select('grades.*')
            ->where('student_id', $student->id)
            ->get();

        //      echo "<pre>";
        // var_dump($students);
        // echo "</pre>";


        return view('students.show')->with(compact('grades'))->with(compact('student'));

    }
    

    public function edit($id)
    {
        $teams = Team::get();
        return view('students.team',compact('id','teams'));
    }

    public function store(Request $request)
    {

        $input = $request->all();
      

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

    

    public function destroy($id)
    {
        Student::find($id)->delete();
        return redirect()->route('students.index')
            ->with('success', 'Uczeń został usunięty');
    }
}
