<?php
    
namespace App\Http\Controllers;
    
use App\Models\Grades;
use Illuminate\Http\Request;
    
class GradeController extends Controller
{ 
    /**
     * Display a listing of the resource.
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
        $grades = Grades::latest()->paginate(5);
        return view('grades.index',compact('grades'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
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
    
        Grades::create($request->all());
    
        return redirect()->route('grades.index')
                        ->with('success','Grade created successfully.');
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
    
        return redirect()->route('grades.index')
                        ->with('success','Grade deleted successfully');
    }
}
