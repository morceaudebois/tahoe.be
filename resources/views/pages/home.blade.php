<x-front-layout>
    <div id="projects">
        {{-- Latest --}}
        <div id="latest">
            <a href="#" title="" alt="" class="project">
                <div class="info">
                    <h6>web app</h6>
                    <h3>My Favorite Dogs</h3>
                    <p>{{ __('Create a list of your favorite dog breeds and share it with your friends.') }}</p>

                    <div class="tagContainer">
                        <span>#2022</span>
                        <span>#webapp</span>
                        <span>#php</span>
                    </div>
                </div>

                <div class="imgContainer">
                    <img src="https://picsum.photos/1920/1081" alt="">
                </div>
            </a>
        </div>

        <div id="projectGrid">
            @foreach(range(1, 8) as $index)

                <a href="#" title="" alt="" class="project">
                    <div class="info">
                        <h6>Browser extension</h6>
                        <h3>My Favorite Dogs</h3>
                        <p>{{ __('Create a list of your favorite dog breeds and share it with your friends.') }}</p>

                        <div class="tagContainer">
                            <span>#2022</span>
                            <span>#dogs</span>
                            <span>#php</span>
                        </div>
                    </div>

                    <div class="imgContainer">
                        <img height='100%' src="https://picsum.photos/1920/1080" alt="">
                    </div>
                    
                </a>
            @endforeach
        </div>

        {{-- and then the rest --}}
    </div>
</x-front-layout>