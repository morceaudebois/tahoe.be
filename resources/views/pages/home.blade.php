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
                                @livewire('like-button', ['element' => $post, 'glass' => $loop->first ? true : false])
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

    <section id="support">
        <h3>Support</h3>
        <p>Open source development requires a significant amount of time and effort. Since I don't run ads on my projects nor do I collect & sell your data, I don't make any money from them. This is why your support matters so much, as it keeps me motivated and allows me to dedicate more time into these projects.</p><br>

        <p>If you like what I do, please consider sharing them around, <a href="https://ko-fi.com/tahoe">donating</a>, or even just <a href="mailto:mail@tahoe.be">saying thank you</a>. 😊</p>
    </section>
</x-front-layout>