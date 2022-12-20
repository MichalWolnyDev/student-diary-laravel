<?php

namespace App\Http\Controllers;

use App\Models\SchoolClass;
use Illuminate\Http\Request;

class SchoolClassController extends Controller
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
        $sclasses = SchoolClass::latest()->paginate(10);
        return view('classesview.index', compact('sclasses'))
            ->with('i', (request()->input('page', 1) - 1) * 10);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('classesview.create');
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
            'classname' => 'required',
        ]);

        SchoolClass::create($request->all());

        return redirect()->route('classes.index')
            ->with('success', 'Class created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\SchoolClass $schoolclass
     * @return \Illuminate\Http\Response
     */
    public function show(SchoolClass $schoolclass)
    {
        return view('classesview.show', compact('schoolclass'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SchoolClass $sclasses
     * @return \Illuminate\Http\Response
     */
    public function destroy(SchoolClass $sclasses)
    {
        $sclasses->delete();

        return redirect()->route('classess.index')
            ->with('success', 'Class deleted successfully');
    }


}