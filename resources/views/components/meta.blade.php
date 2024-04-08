@props([
    'title' => null,
    'description' => "I'm an open source web developer and designer who creates projects for you to enjoy! Check out my latest work and support what I do. 🪵",
    'keywords' => 'open source, independant, php, css, chrome extension, minecraft mods',
    'image' => null,
    'url' => url()->current(),
    'author' => 'Tahoe Beetschen',
    'noindex' => false,
    'webapp' => false,
    'webapptitle' => false,
    'icon' => false
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

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="csrf-token" content="{{ csrf_token() }}">

@if ($webapp)
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">

    @if ($webapptitle)
        <meta name="apple-mobile-web-app-title" content="{{ $webapptitle }}">
        <meta name="application-name" content="{{ $webapptitle }}">
    @endif
@endif

@if ($icon)
    <link rel="apple-touch-icon" sizes="180x180" href="{{ $icon }}">
	<link rel="icon" type="image/png" sizes="32x32" href="{{ $icon }}">
	<link rel="icon" type="image/png" sizes="16x16" href="{{ $icon }}">
@else
    <link rel="shortcut icon" href="data:image/svg+xml,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 100 100'><text y='.9em' font-size='85'>🪵</text></svg>" type="image/x-icon">
@endif

@if ($noindex)
    <meta name=”robots” content=”noindex”>
@endif