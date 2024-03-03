@props(['tags'])

<div class="tagContainer">
    @foreach (explode('|', $tags) as $tag)
        <span>#{{ $tag }}</span>
    @endforeach
</div>