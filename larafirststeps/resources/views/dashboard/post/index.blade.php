@extends('dashboard.master')

@section('content')

    <a class="btn btn-primary my-3" href="{{ route('post.create') }}" target="blank">Create new post</a>

 <table class="table"> 

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
                <td>{{ $p->posted }}</td>
                <td>{{ $p->category->title }}</td>

                <!-- TODO UNIDO EN UNA SOLA CELDA -->
                <td>
                    <a class="btn btn-success mt-2 " href="{{ route('post.edit',$p) }}">Edit</a>
                    <a class="btn btn-success mt-2 " href="{{ route('post.show',$p) }}">Show</a>

                    <form action="{{ route('post.destroy', $p) }}" method="post" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button class="btn-danger mt-2" type="submit">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>

 </table>
    <div class="mt-2"></div>
 
    {{ $posts->links() }}
    
@endsection
