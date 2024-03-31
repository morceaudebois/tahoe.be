<x-front-layout class="youtube-timecode post">
    @section('metatags')
        <x-meta
            title="YouTube timecode link generator for mobile"
            {{-- image="{{ $post->getThumbnailUrl('lg') }}" --}}
            description="Annoyed with YouTube not allowing you to create timecode links on mobile? This is the right place!"
        />
    @endsection

    <article>
        <header>
            <h1>YouTube timecode link generator for mobile</h1>
            <h2>Annoyed with YouTube not allowing you to create timecode links on mobile?<br>You're at the right place! Just paste in your link and set your time.<br>It even works for live links :)</h2>
        </header>

        <section>
            <input type="url" id="urlInput" placeholder="https://www.youtube.com/watch?v=dQw4w9WgXcQ" />

            <div class="times">
                <input type="number" name="hours" min='0' placeholder="1">
                <input type="number" name="minutes" min="0" max="59" placeholder="12">
                <input type="number" name="seconds" min="0" max="59" placeholder="27">
            </div>

            <p contenteditable id="result"></p>
        </section>
    </article>

    <div class="callToAction">
        <h5>✨ <span>Enjoying this project?</span> ✨</h5>
        <span>Please share it on social media and tell your friends about it!<br>
            It helps making what I do worth it.
        </span>
    </div>
</x-front-layout>