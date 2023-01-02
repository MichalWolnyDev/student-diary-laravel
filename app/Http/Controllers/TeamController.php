<?php

namespace App\Http\Controllers;

use App\Models\Team;
use Illuminate\Http\Request;
use DB;

class TeamController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:schoolclass-list|schoolclass-create|schoolclass-edit|schoolclass-delete', ['only' => ['index', 'show']]);
        $this->middleware('permission:schoolclass-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:schoolclass-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:schoolclass-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teams = Team::latest()->paginate(10);

        return view('teams.index', compact('teams'))
            ->with('i', (request()->input('page', 1) - 1) * 10);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('teams.create');

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
            'teamname' => 'required',
        ]);

        Team::create($request->all());

        return redirect()->route('teams.index')
            ->with('success', 'Class created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function show(Team $team)
    {
        // SELECT * FROM `team_has_students` INNER JOIN `students` ON `team_has_students`.`student_id`=`students`.`id` WHERE `team_id`= 1;


        $students = DB::table('students')
            ->join('team_has_students', 'team_has_students.student_id', '=', 'students.id')
            ->select('*')
            ->where('students.team_id', $team->id)
            ->get();


        return view('teams.show')->with(compact('students'))->with(compact('team'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Team $team
     * @return \Illuminate\Http\Response
     */
    public function destroy(Team $team)
    {
        $team->delete();

        return redirect()->route('teams.index')
            ->with('success', 'Class deleted successfully');
    }
}
