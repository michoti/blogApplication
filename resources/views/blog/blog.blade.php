@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-center align-content-center">
    <div class="mx-4">

        @if (session()->has('message'))
        <div class="my-3 bg-success rounded">
            <p class="p-3">
                {{ session()->get('message')}}
            </p>
        </div>
            
        @endif
        <h2>Blog section area</h2>
       
            @foreach ($posts as $post)
                <div class="my-4">
                    <h4>{{ $post->title }}</h4>  
                    <span>Created on: {{ date('D /M /Y', strtotime($post->updated_at))}} by <strong>{{ $post->user->name}}</strong></span>              
                    <div class="my-2">
                        <p>{{ $post->description }}</p>
                    </div>
                    <div class="d-flex flex-row-reverse my-2">
                        @if (isset(Auth::user()->id) && Auth::user()->id == $post->user_id)
                         <a href="/blog/{{$post->slug}}/edit" class="btn btn-primary p-2 rounded">
                            Edit blog
                        </a>
                        <span class="mx-2">
                            <form action="/blog/{{ $post->slug }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger p-2" type="submit">Delete</button>
                            </form>
                        </span>
                            
                        @endif
                    </div>
                    <a href="/blog/{{ $post->slug }}">Keep reading</a>
                </div>
            @endforeach
       
        @if (Auth::check())

            <div class="my-4">
                <a href="/blog/create" class="btn btn-primary">Create a new blog.</a>
            </div>
            
        @endif
    </div>
</div>
    
@endsection