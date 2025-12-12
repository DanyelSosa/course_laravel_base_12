<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>
<body>
    
{{-- <header>
    <h1>Este es el header masterrrrr</h1>
</header> --}}

@session(  'key')
    <div style="background-color: #d4edda; color: #155724; padding: 10px; border-radius: 5px; margin-bottom: 20px;">
        <h1>{{ $value }}</h1>
    </div>
@endsession



@if (session('status'))
    <div style="background-color: #d4edda; color: #155724; padding: 10px; border-radius: 5px; margin-bottom: 20px;">
        {{ session('status') }}
    </div>
    
@endif

    @yield('content')

    <section>
        @yield('morecontent')
    </section>


</body>
</html>