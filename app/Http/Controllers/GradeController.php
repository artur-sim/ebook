<?php

namespace App\Http\Controllers;

use App\Grade;
use Illuminate\Http\Request;
use App\Student;
use App\Lecture;
use Validator;

class GradeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $student_collection = Student::all();
        $lecture_collection= Lecture::all();

        return view('grades.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $student_collection = Student::all();
        $lecture_collection= Lecture::all();

        return view('grades.create',['student_collection'=> $student_collection, 'lecture_collection'=> $lecture_collection]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make( $request->all(),[
            'student_id'=> ['required'],
            'lecture_id'=> ['required'],
            'grade'=> ['required'],
       
        ]);

        if ($validator->fails())
            {
                $request->flash();
                return redirect()->route('grades.create')->withErrors($validator);
            }
            
        $grade = new Grade();
        $grade->student_id= $request->student_id;
        $grade->lecture_id= $request->lecture_id;
        $grade->grade= $request->grade;
    

        $grade->save();

        return redirect()->route('students.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Grade  $grade
     * @return \Illuminate\Http\Response
     */
    public function show(Grade $grade)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Grade  $grade
     * @return \Illuminate\Http\Response
     */
    public function edit(Grade $grade)
    {
        $student_collection = Student::all();
        $lecture_collection = Lecture::all();
         return view('grades.edit',['grade'=>$grade,'student_collection' =>$student_collection,'lecture_collection'=>$lecture_collection]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Grade  $grade
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Grade $grade)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Grade  $grade
     * @return \Illuminate\Http\Response
     */
    public function destroy(Grade $grade)
    {
        //
    }
}