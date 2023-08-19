@props(['active'])

@php
$classes = ($active ?? false)
? 'flex items-center px-2 py-2 text-sm font-medium text-white bg-gray-900 rounded-md group'
: 'flex items-center px-2 py-2 text-sm font-medium text-gray-300 rounded-md hover:bg-gray-700 hover:text-white group';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
