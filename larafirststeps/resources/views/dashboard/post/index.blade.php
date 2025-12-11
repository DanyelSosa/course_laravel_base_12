@extends('dashboard.master')

@section('content')

    <a href="{{ route('post.create') }}" target="blank">Create new post</a>

 <table> 

    <thead>

        <tr>
            <th>id</th>
            <th>Title</th>
            <th>Posted</th>
            <th>Category</th>
            <th>Options</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($posts as $p)
            <tr>
                <td>{{ $p->id }}</td>
                <td>{{ $p->title }}</td>
                <td>{{ $p->posted  }}</td>
                <td>{{ $p->category->title }}</td>
                <td>     <a href="{{ route('post.edit',$p) }}">Edit</a> </td>
                <td>     <a href="{{ route('post.show',$p) }}">Show</a> </td>
                <td> 
                    <form action="{{ route('post.destroy', $p) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Delete</button>
                    </form>

        @endforeach

 </table>
 
    {{ $posts->links() }}
    
@endsection