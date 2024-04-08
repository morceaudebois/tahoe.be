<x-front-layout class="youtube-timecode post">
    @section('metatags')
        <x-meta
            title="YouTube timecode link generator for mobile"
            image="/images/youtube-timecode-thumbnail.jpg"
            description="Annoyed with YouTube not allowing you to create timecode links on mobile? This is the right place!"
            webapp="true"
            webapptitle="Timecodes"
            icon="/images/timecode.png"
        />
    @endsection

    <article>
        <header>
            <h1>YouTube timecode link generator for mobile</h1>
            <h2>Just paste your link and set a time :)</h2>
        </header>

        <section>
            <div class="inputContainer">
                <label for="urlInput">YouTube link</label>
                <input type="url" name="urlInput" id="urlInput" placeholder="Paste here!" />
                <span id="error"></span>
            </div>
            
            <div class="times">
                <div class="inputContainer">
                    <label for="hours">Hours</label>
                    <input type="tel" pattern="[0-9]*" id="hours" name="hours" min='0' placeholder="1">
                </div>

                <div class="inputContainer">
                    <label for="minutes">Minutes</label>
                    <input type="tel" pattern="[0-9]*" id="minutes" name="minutes" min="0" max="59" placeholder="12">
                </div>

                <div class="inputContainer">
                    <label for="seconds">Seconds</label>
                    <input type="tel" pattern="[0-9]*" id="seconds" name="seconds" min="0" max="59" placeholder="27">
                </div>
            </div>

            <div class="result">
                <h3>Here's your link!</h3>

                <div class="copyContainer">
                    <input type="url" name="timecodeLink" id="timecodeLink" placeholder="Paste here!" readonly />
                    <div id="copy" tabindex="0"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-files"><path d="M20 7h-3a2 2 0 0 1-2-2V2"/><path d="M9 18a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h7l4 4v10a2 2 0 0 1-2 2Z"/><path d="M3 7.6v12.8A1.6 1.6 0 0 0 4.6 22h9.8"/></svg></div>
                </div>

                <a class="youtube-player" target="_blank">
                    <p contenteditable="false" class="glass" id="readableTime"></p>
                </a>
            
                <span id="error"></span>
            </div>
        </section>
    </article>

    <div class="callToAction">
        <h5>✨ <span>Enjoying this project?</span> ✨</h5>
        <span>Please share it on social media and tell your friends about it!<br>
            It helps making what I do worth it.
        </span>
    </div>
</x-front-layout>