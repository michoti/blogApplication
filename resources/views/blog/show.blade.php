@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-center align-content-center">
    <div class="my-4">
        <h2>{{ $post->title }}</h2>  
        <span>Created on: {{ date('D /M /Y', strtotime($post->updated_at))}} by <strong>{{ $post->user->name}}</strong></span>              
        <div class="my-4">
            <p>{{ $post->description }}</p>
        </div>
    </div>
</div>
    
@endsection