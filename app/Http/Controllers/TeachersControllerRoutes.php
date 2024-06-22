<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Teacher;

class TeachersControllerRoutes extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $teachers = Teacher::all();
        return view("teachers.index", ['teachers'=>$teachers]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('teachers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $teacher = new Teacher;
        // $teacher->name = $request->name;   
        // $teacher->scinces = $request->scinces;
        // $teacher->save();
        Teacher::create($request->all());

        return redirect()->route('teachers.index')->with('success','');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Teacher $teacher)
    {
        return view('teachers.show', ['teacher'=>$teacher]);
    }   

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $teacher = Teacher::findOrFail($id);
        return view('teachers.edit', ['teacher'=>$teacher]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $teacher = Teacher::findOrFail($id);
        $teacher->update($request->all());
        return redirect()->route('teachers.index')->with('success','');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // $teacher = Teacher::findOrFail($id);
        // $teacher->delete();
        // yokida bo'lmasa quyidagidan ham foydalanish mumkin.
        Teacher::destroy($id);

        return redirect()->route('teachers.index')->with('success','');
    }
}
