@props([
    'title' => false,
    'description' => false,
    'keywords' => false,
    'image' => false,
    'url' => false,
    'author' => false,
])

@php // to know if the values are default or passed down
    $defaults = [
        'title' => 'Tahoe Beetschen',
        'description' => "I'm an open source web developer and designer who creates projects for you to enjoy! Check out my latest work and support what I do. 🪵",
        'keywords' => 'open source, independant, php, css, chrome extension, minecraft mods',
        'image' => '',
        'url' => '',
        'author' => 'Tahoe Beetschen'
    ];

    if (!$title) {
        $title = "{$defaults['author']} · Maker of things";
    } else {
        $title = $title . $defaults['author'];
    }
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

<meta property="twitter:card" content="summary_large_image" />
<meta property="twitter:url" content="{{ $url }}" />
<meta property="twitter:title" content="{{ $title }}" />
<meta property="twitter:description" content="{{ $description }}" />
<meta property="twitter:image" content="{{ $image }}" />