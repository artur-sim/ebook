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

                    <form method="POST" action="{{route('students.store')}}">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Jonas" value="{{old('name')}}">
                            </div>
                            <div class="form-group">
                                <label for="surname">Surname</label>
                                <input type="text" class="form-control" id="surname" name="surname" placeholder="Jonaitis" value="{{old('surname')}}">
                            </div>
                            <div class="form-group">
                                <label for="email">Email address</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com" value="{{old('email')}}" >
                            </div>
                            <div class="form-group">
                                <label for="phone">Phone</label>
                                <input type="text" class="form-control" id="phone" name="phone" placeholder="+370 60 00 00 00" value="{{old('phone')}}">
                            </div>
                            @csrf
                            <button type="submit" class="btn btn-primary">Save</button>
                            <a  href="{{route('students.index')}}" class="btn btn-primary" >Cancel</a>
                        </form>    
                       
 
        </div>
    </div>
</div>
@endsection
