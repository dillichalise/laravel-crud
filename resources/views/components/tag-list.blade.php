@props(['tags'])

@php
    $tagList = collect(preg_split('/\s*,\s*/', $tags))->map(function ($tagName) {
        return ucfirst($tagName);
    });
@endphp

<ul class="flex">

    @foreach ($tagList as $tagName)
        <li class="bg-black text-white rounded-xl px-3 py-1 mr-2">
            <a href="/?tag={{ $tagName }}">{{ $tagName }}</a>
        </li>
    @endforeach
</ul>
