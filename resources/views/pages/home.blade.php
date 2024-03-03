<x-front-layout class="home">
    <section id="projects">
        @foreach($posts as $post)
            <article {{ $loop->index === 0 ? 'id=latest' : '' }} class="glassHover">
                <a href="/posts/{{ $post->id }}" title="" alt="">
                    <div class="info">
                        <div class="top">
                            <h6>Browser extension</h6>
                            <div {{ $loop->index === 0 ? 'class=links' : '' }}>
                                @include(
                                    'front.likes',
                                    ['glass' => $loop->index === 0 ? true : false]
                                )
                            </div>
                        </div>
                        
                        <h3>{{ $post->title }}</h3>
                        <p>{{ $post->excerpt }}</p>

                        @include('front.tags', ['tags' => $post->tags])
                    </div>

                    <img height='100%' src="https://picsum.photos/1080/720" alt="">                    
                </a>
            </article>
        @endforeach
    </section>
</x-front-layout>