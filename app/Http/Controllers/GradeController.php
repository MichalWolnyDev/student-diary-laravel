<?php
    
namespace App\Http\Controllers;

use App\Models\Grades;
use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
    
class GradeController extends Controller
{ 
    /**
     * Access only when you have permission listed in _construct
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
         $this->middleware('permission:grade-list|grade-create|grade-edit|grade-delete', ['only' => ['index','show']]);
         $this->middleware('permission:grade-create', ['only' => ['create','store']]);
         $this->middleware('permission:grade-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:grade-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::id();
        $student = Student::all();

        $studentCheck = DB::table('students')
            ->select('students.*')
            ->where('user_id', $user)
            ->get();

        foreach ($studentCheck as $temp) {
            $currentStudent = $temp->id;
        }

        $grades = DB::table('grades')
            ->select('grades.*')
            ->where('student_id', $currentStudent)
            ->get();


        // $grades = Grades::latest()->paginate(10);
        return view('grades.index',compact('grades', 'student', 'user'));
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('grades.create');
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        request()->validate([
            'subject' => 'required',
            'grade' => 'required',
            'description' => 'required',
        ]);

        $subject_name = DB::table('subjects')
            ->select('subjects.subject')
            ->where('subjects.id', $request->subject)
            ->get();
    
        echo "<pre>";
        var_dump($request->all());
        echo "</pre>";


        foreach ($subject_name as $name) {
            $sname = $name->subject;
        }


        Grades::create([
            'subject' => $request->subject,
            'subject_name' => $sname,
            'description' => $request->description,
            'grade' => $request->grade,
            'student_id' => $request->student_id
        ]);
    
        return redirect()->route('students.index')
                        ->with('success','Ocena dodana.');
    }
    
    /**
     * Display the specified resource.
     *
     * @param  \App\Grades  $grades
     * @return \Illuminate\Http\Response
     */
    public function show(Grades $grade)
    {
        return view('grades.show',compact('grade'));
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Grades  $grade
     * @return \Illuminate\Http\Response
     */
    public function edit(Grades $grade)
    {
        return view('grades.edit',compact('grade'));
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Grades  $grade
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Grades $grade)
    {
         request()->validate([
            'subject' => 'required',
            'grade' => 'required',
            'description' => 'required',
        ]);
    
        $grade->update($request->all());
    
        return redirect()->route('grades.index')
                        ->with('success','Grade updated successfully');
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Grades  $grade
     * @return \Illuminate\Http\Response
     */
    public function destroy(Grades $grade)
    {
        $grade->delete();
        return back();
     
    }
}
