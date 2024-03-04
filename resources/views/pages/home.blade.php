<x-front-layout class="home">
    <section id="projects">
        @foreach($posts->reverse() as $post)
            <article {{ $loop->index === 0 ? 'id=latest' : '' }} class="glassHover">
                <a href="/post/{{ $post->slug }}" title="" alt="">
                    <div class="info">
                        <div class="top">
                            @if ($post->category->name)
                                <h6>{{ $post->category->name }}</h6>
                            @endif
                            <div {{ $loop->index === 0 ? 'class=links' : '' }}>
                                @include(
                                    'front.likes',
                                    ['likes' => $post->likes, 'glass' => $loop->index === 0 ? true : false]
                                )
                            </div>
                        </div>
                        
                        <h3>{{ $post->title }}</h3>
                        <p>{{ $post->excerpt }}</p>

                        @include('front.tags', ['tags' => $post->tags])
                    </div>

                    @php
                        // define if small or large thumbnail
                        $post->thumbnail = substr_replace($post->thumbnail, ($loop->index === 0 ? 'lg_' : 'md_'), 11, 0);
                    @endphp
                    <img height='100%' src="{{ asset('storage') . '/' . "{$post->thumbnail}" }}" alt="">                    
                </a>
            </article>
        @endforeach
    </section>
</x-front-layout>