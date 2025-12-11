@extends('dashboard.master')

@section('content')

 <h1>{{ $post->title }}</h1>

<span>{{ $post->title }}</span>
<span>{{ $post->category->title }}</span>

 <div> {{ $post->description }}</div>
 <div> {{ $post->content }}</div>



 <img src="/upload/post/{{ $post->image }}" style="width:250px" alt="{{ $post->title }}">
{{ $post->image }}
 
@endsection