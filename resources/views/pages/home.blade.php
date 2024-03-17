<x-front-layout class="home">
    @section('metatags')
        <x-meta
            image="{{ $posts->first()->getThumbnailUrl('lg') }}"
        />
    @endsection

    <section id="projects">
        @foreach($posts->where('draft', false)->sortByDesc('date') as $post)
        <div class="article-wrapper" {{ $loop->first ? 'id=latest' : '' }}>
            <article class="glassHover">
                <a href="/post/{{ $post->slug }}" title='Read post "{{ $post->title }}", a {{ $post->category->name }}' tabindex="0">
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

                    <img height='100%' src="{{ $post->getThumbnailUrl($loop->first ? 'lg' : 'md') }}" alt="Thumbnail for the post about {{ $post->title }}">                    
                </a>
            </article>
        </div>
            
        @endforeach
    </section>

    <section id="support">
        <h3>Support</h3>
        <p>Open source development requires a significant amount of time and effort. Since I don't run ads on my projects nor do I collect & sell your data, I don't make any money from them. This is why your support matters so much, as it keeps me motivated and allows me to dedicate more time into these projects.</p><br>

        <p>If you like what I do, please consider sharing them around, <a href="https://ko-fi.com/tahoe" title="Visit my Ko-Fi page">donating</a>, or even just <a href="mailto:mail@tahoe.be" title="Send me an email">saying thank you</a>. 😊</p>
    </section>
</x-front-layout>