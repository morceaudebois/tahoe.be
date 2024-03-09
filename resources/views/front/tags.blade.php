@props(['tags'])

<div class="tagContainer">
    @foreach ($tags as $tag)
        <span>#{{ $tag }}</span>
    @endforeach
</div>