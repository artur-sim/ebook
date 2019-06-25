<?php

namespace App\Http\Controllers;

use App\Student;
use App\Lecture;
use App\Grade;
use Illuminate\Http\Request;
use Validator;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $student_collection = Student::all();
        $lecture_collection = Lecture::all();
        return view('students.index',['student_collection'=>$student_collection,'lecture_collection'=>$lecture_collection ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

     
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create()
    {
        return view('students.create');
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
            'name'=> ['required'],
            'surname'=> ['required'],
            'email'=> ['required'],
            'phone'=> ['required'],
        ]);

        if ($validator->fails())
            {
                $request->flash();
                return redirect()->route('students.create')->withErrors($validator);
            }
            
        $student = new Student();
        $student->name= $request->name;
        $student->surname= $request->surname;
        $student->email= $request->email;
        $student->phone= $request->phone;

        $student->save();

        return redirect()->route('students.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        $grades_collection = Grade::where('student_id',$student->id)->get();
        $lecture_collection = Lecture::all();
        return view('students.show',['student'=>$student,"grades_collection"=>$grades_collection,'lecture_collection'=>$lecture_collection]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        return view('students.edit',['student'=>$student]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student)
    {

        $validator = Validator::make( $request->all(),[
            'name'=> ['required'],
            'surname'=> ['required'],
            'email'=> ['required' , 'email '],
            'phone'=> ['required'],
        ]);

        if ($validator->fails())
            {
                $request->flash();
                return redirect()->route('students.edit')->withErrors($validator);
            }
            
        $student->name= $request->name;
        $student->surname= $request->surname;
        $student->email= $request->email;
        $student->phone= $request->phone;

        $student->save();

        return redirect()->route('students.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        $student->delete();
        return redirect()->route('students.index');
    }
}