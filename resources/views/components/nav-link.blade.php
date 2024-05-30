@props(['active'])

@php
$classes = ($active ?? false)
            ? 'inline-flex items-center px-4 pt-1 border-b-2 border-amarillo  text-sm font-medium leading-5 text-white  focus:outline-none focus:border-amarillo transition duration-150 ease-in-out'
            : 'inline-flex items-center px-4 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-white  hover:text-white  hover:border-amarillo  focus:outline-none focus:text-amarillo  focus:border-amarillo  transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
