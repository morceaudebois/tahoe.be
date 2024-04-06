@props([
    'title' => null,
    'description' => "I'm an open source web developer and designer who creates projects for you to enjoy! Check out my latest work and support what I do. 🪵",
    'keywords' => 'open source, independant, php, css, chrome extension, minecraft mods',
    'image' => null,
    'url' => url()->current(),
    'author' => 'Tahoe Beetschen',
    'noindex' => false,
    'webapp' => false
])

@php 
    $title = $title ? "$title · $author" : "$author · Maker of things";
@endphp
 
<title>{{ $title }}</title>

<meta property="og:locale" content="en" />
 
<meta name="title" content="{{ $title }}" />
<meta name="description" content="{{ $description }}" />
<meta name="keywords" content="{{ $keywords }}">
 
<!-- Open Graph / Facebook / LinkedIn -->
<meta property="og:type" content="website">
<meta property="og:url" content="{{ $url }}"/>
<meta property="og:locale" content="en"/>
<meta property="og:title" content="{{ $title }}"/>
<meta property="og:description" content="{{ $description }}">
<meta property="og:image" content="{{ $image }}">

<meta name="twitter:card" content="summary_large_image">
<meta property="twitter:url" content="{{ $url }}">
<meta name="twitter:title" content="{{ $title }}">
<meta name="twitter:description" content="{{ $description }}">
<meta name="twitter:image" content="{{ $image }}">

@if ($webapp)
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
@endif

@if ($noindex)
    <meta name=”robots” content=”noindex”>
@endif