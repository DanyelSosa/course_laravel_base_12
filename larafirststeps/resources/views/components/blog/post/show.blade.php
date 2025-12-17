<div class="card card-white">

    <h1>{{ $post->title }}</h1>
    <span>{{ $post->category->title }}</span>
    <span>{{ $changeTitle()}}</span>
    <hr>
 
    {{ $attributes->filter( (fn (string $value, string $key)=> $key == 'data-id')) }}

    {{ $post->content }}
</div>