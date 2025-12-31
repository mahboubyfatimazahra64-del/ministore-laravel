@props(['active'])

@php
$classes = ($active ?? false)
            ? 'inline-flex items-center px-6 py-3 mx-2 rounded-2xl bg-gradient-to-r from-blue-500 via-purple-600 to-pink-600 text-white font-bold shadow-2xl transform scale-110 transition-all duration-500 animate-pulse'
            : 'inline-flex items-center px-6 py-3 mx-2 rounded-2xl text-gray-700 font-semibold hover:bg-gradient-to-r hover:from-blue-50 hover:via-purple-50 hover:to-pink-50 hover:text-transparent hover:bg-clip-text hover:bg-gradient-to-r hover:from-blue-600 hover:via-purple-600 hover:to-pink-600 hover:shadow-xl hover:transform hover:scale-110 hover:-translate-y-1 transition-all duration-500';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
