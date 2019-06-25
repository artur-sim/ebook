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

                <div class="card-header">{{$student->name}} {{$student->surname}}</div>

                <div class="card-body">

                    @if($student->hasGrade->count() > 0)
                    <table class="table">
                        <thead>
                            <tr>

                                <th scope="col">Lecture</th>
                                <th scope="col">Grade</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($grades_collection as $grade)
                            <tr>
                                @foreach($lecture_collection as $lecture)
                                @if($lecture->id == $grade->lecture_id)
                                <td>
                                    {{$lecture->name }}
                                </td>
                                @endif
                                @endforeach
                                <td>
                                    {{$grade->grade}}
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection