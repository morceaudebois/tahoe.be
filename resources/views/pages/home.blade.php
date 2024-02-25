<x-front-layout>
    <div id="projects">
        {{-- Latest --}}
        <div id="latest">
            <a href="#" title="" alt="" class="project">
                <div class="info">
                    <h3>My Favorite Dogs</h3>
                    <p>{{ __('Create a list of your favorite dog breeds and share it with your friends.') }}</p>

                    <div class="tagContainer">
                        <span>#2022</span>
                        <span>#webapp</span>
                        <span>#php</span>
                    </div>
                </div>

                <img src="https://placekitten.com/1920/1080" alt="">
            </a>
        </div>

        <div id="projectGrid">
            @foreach(range(1, 8) as $index)

                <a href="#" title="" alt="" class="project">
                    <div class="info">
                        <h3>My Favorite Dogs</h3>
                        <p>{{ __('Create a list of your favorite dog breeds and share it with your friends.') }}</p>

                        <div class="tagContainer">
                            <span>#2022</span>
                            <span>#webapp</span>
                            <span>#php</span>
                        </div>
                    </div>

                    <img src="https://placekitten.com/1920/1080" alt="">
                </a>
            @endforeach
        </div>

        {{-- and then the rest --}}
    </div>
</x-front-layout>