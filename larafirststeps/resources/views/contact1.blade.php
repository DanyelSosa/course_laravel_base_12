@extends('master')

@section('content')

    <h1>CONTACTO</h1>
   <p> {{ $name }} </p>

    @if ($name != 'Daniel')
        Tu nombre no es Daniel  
    @else
        <h2> tu nombre es Daniel </h2>
    @endif

    <ul>
    @foreach ([1,2,3,4,5,6] as $item)
    <li>{{ $item }}</li>
    
    @endforeach
        </ul>    
    
@endsection