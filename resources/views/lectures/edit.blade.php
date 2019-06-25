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

                    <form method="POST" action="{{route('lectures.update',$lecture)}}">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Jonas" value="{{ $lecture->name}}">
                            </div>
                             
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea class="form-control" id="summernote"  rows="3" name="description">{{$lecture->description}}</textarea>
                            </div>
                            @csrf
                            <button type="submit" class="btn btn-primary">Save</button>
                            <a  href="{{route('lectures.index')}}" class="btn btn-primary" >Cancel</a>
                        </form>    
                       
 
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
    $('#summernote').summernote();
    });
</script>
@endsection
