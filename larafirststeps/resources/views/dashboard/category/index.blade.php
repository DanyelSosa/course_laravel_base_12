@extends('dashboard.master')

@section('content')

    <a href="{{ route('category.create') }}" target="blank">Create new post</a>

 <table> 

    <thead>

        <tr>
            <th>id</th>
            <th>Title</th>
            <th>Options</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($categories as $c)
            <tr>
                <td>{{ $c->id }}</td>
                <td>{{ $c->title }}</td>
                <td>     <a href="{{ route('category.edit',$c) }}">Edit</a> </td>
                <td>     <a href="{{ route('category.show',$c) }}">Show</a> </td>
                <td> 
                    <form action="{{ route('category.destroy', $c) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach

 </table>
 
    {{ $categories->links() }}
    
@endsection