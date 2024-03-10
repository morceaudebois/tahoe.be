<x-front-layout class="home">
    <section id="projects">
        @foreach($posts->where('draft', false)->sortBy('date') as $post)
            <article {{ $loop->first ? 'id=latest' : '' }} class="glassHover">
                <a href="/post/{{ $post->slug }}" title="" alt="">
                    <div class="info">
                        <div class="top">
                            @if ($post->category->name)
                                <h6>{{ $post->category->name }}</h6>
                            @endif
                            <div {{ $loop->first ? 'class=links' : '' }}>
                                @livewire('like-button', ['post' => $post, 'glass' => $loop->first ? true : false])
                            </div>
                        </div>
                        
                        <h3>{{ $post->title }}</h3>
                        <p>{{ $post->excerpt }}</p>

                        @include('front.tags', ['tags' => $post->tags()])
                    </div>

                    <img height='100%' src="{{ $post->getThumbnailUrl($loop->first ? 'lg' : 'md') }}" alt="">                    
                </a>
            </article>
        @endforeach
    </section>
</x-front-layout>