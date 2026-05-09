<x-front-layout class="home">
    @php
        $sortedPosts = $posts->where('draft', false)->sortByDesc('date');

        $projects = $sortedPosts->filter(function ($post) {
            return $post->category?->slug !== 'blog';
        });

        $blog_posts = $sortedPosts->filter(function ($post) {
            return $post->category?->slug === 'blog';
        });
    @endphp

    @section('metatags')
        <x-meta
            image="{{ $projects->first()->getThumbnailUrl('lg') }}"
        />
    @endsection

    <section id="projects">
        <div class="latest">
            <x-post-bloc 
                :post="$projects->first()"
                featured="true"
            />
        </div>
        
        <div id="post-grid">
            @foreach($projects as $post)
                @if (!$loop->first)
                    <x-post-bloc 
                        :loop="$loop"
                        :post="$post"
                    />
                @endif
            @endforeach
        </div>
    </section>

    <section id="blog">
        <h3>Blog</h3>
        <p>Mostly for when I want to document something that might also interest you.</p>

        <div id="post-grid">
            @foreach($blog_posts as $post)
                <x-post-bloc 
                    :loop="$loop"
                    :post="$post"
                />
            @endforeach
        </div>
    </section>

    <section id="support">
        <h3>Support</h3>
        <p>Open source development requires a significant amount of time and effort. Since I don't run ads on my projects nor do I collect & sell your data, I don't make any money from them. This is why your support matters so much, as it keeps me motivated and allows me to dedicate more time into these projects.</p><br>

        <p>If you like what I do, please consider sharing my projects around, <a href="https://ko-fi.com/tahoe" title="Visit my Ko-Fi page">donating</a>, or even just <a href="mailto:mail@tahoe.be" title="Send me an email">saying thank you</a>. 😊</p>
    </section>
</x-front-layout>