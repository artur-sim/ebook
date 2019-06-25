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

                     @if($lectures_collection->count() > 0)
                        @foreach($lectures_collection as $lecture)
                        <div class="card">

                             <div class="card-header">{{$lecture->name}}</div>

                             <div class="card-body">
                                <p>  {!!$lecture->description!!}</p>  
                             
                               <form method="POST" action="{{route('lectures.destroy',[$lecture])}}">
                                 @csrf

                                    <a href="{{route('lectures.edit',$lecture)}}" class="btn btn-primary">Edit</a>
                                    <button type="submit" class="btn btn-danger ">Delete</button>
                                </form>
                            </div>
                                
                        </div>
                        
                        @endforeach
                        @else
                        <div class="card">

                             <div class="card-header">Lectures</div>

                             <div class="card-body">
                             <p class="card-text">No lectures saved </p>
                            </div>
                        </div>
                    @endif
        </div>
    </div>
</div>
@endsection
