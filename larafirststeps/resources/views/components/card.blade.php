

{{-- <div {{ $attributes->merge(['class' => 'w-full border shadow-md rounded-md p-5 bg-white']) }}> --}}
{{-- <div {{ $attributes->class([ 'w-full border shadow-md rounded-md p-5 bg-white', 'bg-white' => $bg]) }}> --}}

@props(['type' => 'info', 'bg'] )
<div {{ $attributes->class([ 'w-full border shadow-md rounded-md p-5 bg-white', 'bg-white' => true]) }}>

    {{ $slot }}
    {{ $type }}
    {{ $attributes }}
</div>