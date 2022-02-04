@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-center align-content-center">
    <div class="my-4">
        <h1>Create new blog</h1>

        @if ($errors->any())

        <div class="my-2">
            @foreach ($errors->all() as $error)
                <div class="bg-danger rounded p-2">
                    <p>{{$error}}</p>
                </div>
            @endforeach
        </div>
            
        @endif

        <div class="m-auto">
            <form action="/blog" method="POST" enctype="multipart/form-data">
                @csrf
                <input class="form-control" type="text" name="title" placeholder="Input title"><br>
                <textarea class="form-control" name="description" id="" cols="30" rows="10" placeholder="description..."></textarea>
                <div class="my-1">
                    <span>Choose image<input class="form-control" name="imagepath" type="file"></span>
                </div>
                <div class="mt-3">
                    <button class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
    
@endsection