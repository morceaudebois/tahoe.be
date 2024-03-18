@props(['loop'=> false, 'post', 'featured'=>false])
<div class="article-wrapper" {{ $featured ? 'id=latest' : '' }}>
    <article class="glassHover">
        <a href="/post/{{ $post->slug }}" title='Read post "{{ $post->title }}", a {{ $post->category->name }}' tabindex="0">
            <div class="info">
                <div class="top">
                    @if ($post->category->name)
                        <h6>{{ $post->category->name }}</h6>
                    @endif
                    <div {{ $featured ? 'class=links' : '' }}>
                        @livewire('like-button', ['element' => $post, 'glass' => $featured ? true : false])
                    </div>
                </div>
                
                <h3>{{ $post->title }}</h3>
                <p>{{ $post->excerpt }}</p>

                @include('front.tags', ['tags' => $post->tags()])
            </div>

            <img height='100%' src="{{ $post->getThumbnailUrl($featured ? 'lg' : 'md') }}"
                alt="Thumbnail for the post about {{ $post->title }}"
                @if ($loop && $loop->index > 3)
                    loading="lazy"
                @endif
            >                    
        </a>
    </article>
</div>