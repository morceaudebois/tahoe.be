<x-front-layout class="post">
    @section('metatags')
        <x-meta
            title="{{ $post->title }}"
            image="{{ $post->getThumbnailUrl('lg') }}"
            description="{{ $post->excerpt }}"
        />
    @endsection

    <article>
        <header>
            <div class="top">
                <img src="{{ $post->getThumbnailUrl('xl') }}" alt="Featured image of the {{ $post->title }} post">

                <div class="links">
                    @livewire('like-button', ['element' => $post, 'glass' => true])

                    @if ($post->external_url)
                        <a class="visitContainer glass" href="{{ $post->external_url }}" title="Visit the live version">
                            <span>See it live</span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" class="z-10" aria-hidden="true"><path fill="currentColor" d="M7.8 21h6.4c1.68 0 2.52 0 3.162-.327a3 3 0 0 0 1.311-1.311C19 18.72 19 17.88 19 16.2V14l-9-9H7.8c-1.68 0-2.52 0-3.162.327a3 3 0 0 0-1.311 1.311C3 7.28 3 8.12 3 9.8v6.4c0 1.68 0 2.52.327 3.162a3 3 0 0 0 1.311 1.311C5.28 21 6.12 21 7.8 21" opacity="0.2"></path><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M21 9V3m0 0h-6m6 0-8 8m-3-6H7.8c-1.68 0-2.52 0-3.162.327a3 3 0 0 0-1.311 1.311C3 7.28 3 8.12 3 9.8v6.4c0 1.68 0 2.52.327 3.162a3 3 0 0 0 1.311 1.311C5.28 21 6.12 21 7.8 21h6.4c1.68 0 2.52 0 3.162-.327a3 3 0 0 0 1.311-1.311C19 18.72 19 17.88 19 16.2V14"></path></svg>
                        </a>
                    @endif

                </div>
            </div>

            @if ($post->category->name)
                <h6>{{ $post->category->name }}</h6>
            @endif

            <h1>{{ $post->title }}</h1>

            @include('front.tags', ['tags' => $post->tags()])
        </header>

        <section class="trix-content">
            {!! $post->body !!}

            @if ($post->external_url || $post->source_url)
                <div class="bottomLinks">
                    @if ($post->external_url)
                        <a href="{{ $post->external_url }}">Visit the live version →</a>
                    @endif

                    @if ($post->source_url)
                        <a href="{{ $post->source_url }}">See the source →</a>
                    @endif
                </div>
            @endif
        </section>
    </article>

    <div class="callToAction">
        <h5>✨ <span>Enjoying this project?</span> ✨</h5>
        <span>Please share it on social media and tell your friends about it!<br>
            It helps making what I do worth it.
        </span>
    </div>
</x-front-layout>