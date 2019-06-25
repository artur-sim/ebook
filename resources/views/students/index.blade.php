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

            <div class="card">

                <div class="card-header">List of Students</div>

                <div class="card-body">

                    @if($student_collection->count() == 0)
                    <br>
                    <p>No authors saved</p>
                    <br>
                    @else
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Surname</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($student_collection as $student)

                            <tr>
                                <th scope="row">{{$student->id}}</th>
                                <td>{{$student->name}}</td>
                                <td>{{$student->surname}}</td>
                                <td>

                                    <form method="POST" action="{{route('students.destroy',[$student])}}">
                                        @csrf
                                        <a href="{{route('students.edit',$student)}}" class="btn btn-primary">Edit</a>
                                        <button type="submit" class="btn btn-danger ">Delete</button>

                                        <a href="{{route('students.show',$student)}}" class="btn btn-primary">Show Grade</a>
                                        <!-- <a href="{{route('grades.create')}}" class="btn btn-primary">Add Grade</a> -->
                                    </form>

                                </td>
                            </tr>

                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection