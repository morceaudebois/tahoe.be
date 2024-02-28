<x-front-layout class="home">
    <section id="projects">
        {{-- Latest --}}
        <div id="latest">
            <article>
                <a href="#" title="" alt="">
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

                    <img src="https://picsum.photos/1920/1080" alt="">
                </a>
            </article>
        </div>

        <div id="projectGrid">
            @foreach(range(1, 9) as $index)
                <article>
                    <a href="#" title="" alt="">
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

                        <img height='100%' src="https://picsum.photos/1080/720" alt="">                    
                    </a>
                </article>

            @endforeach
        </div>

        {{-- and then the rest --}}
    </section>
</x-front-layout>