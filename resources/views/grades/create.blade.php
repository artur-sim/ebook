@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
                     @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if($errors->any())
                        @foreach($errors->all() as $error)
                            <div class="alert alert-warning" role="alert">
                                {{$error}}
                            </div>
                        @endforeach
                    @endif

                    <form method="POST" action="{{route('grades.store')}}">
                            <div class="form-group">
                                <label for="student">Student</label>
                            
                                    <select class="form-control" id="student" name="student_id">
                                    <option selected>Select a student</option>
                                    @foreach($student_collection as $student)
                                    <option value="{{$student->id}}">{{$student->name}} {{$student->surname}}</option>
                                    @endforeach  
                                    </select> 
                
                            </div>
                            <div class="form-group">
                                <label for="lecture">Lecture</label>
                      
                                    <select  class="form-control" id="lecture" name="lecture_id">
                                    <option selected>Select lecture</option>
                                    @foreach($lecture_collection as $lecture)
                                      <option value="{{$lecture->id}}">{{$lecture->name}}</option>
                                    @endforeach
                                    </select>
                    
                            </div> 
                            <div class="form-group">
                            <label for="grade">Grade</label>
                            <input type="text" class="form-control" id="grade" name= "grade" >
                        </div>           
                            @csrf
                            <button type="submit" class="btn btn-primary">Save</button>
                            <a  href="{{route('students.index')}}" class="btn btn-primary" >Cancel</a>
                        </form>    
                       
 
        </div>
    </div>
</div>
@endsection
