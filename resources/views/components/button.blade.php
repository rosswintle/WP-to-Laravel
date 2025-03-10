@props(['href'])
<a {{ $attributes->merge(['href' => $href, 'class' => 'block px-5 py-3 text-xl font-light uppercase border border-white rounded hover:bg-white hover:text-blue-800 transition']) }}>
    {{ $slot }}
</a>
