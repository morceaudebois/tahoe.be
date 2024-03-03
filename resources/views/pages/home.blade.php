<x-front-layout class="home">
    <section id="projects">
        @foreach($posts as $post)
            <article {{ $loop->index === 0 ? 'id=latest' : '' }} class="glassHover">
                <a href="/post" title="" alt="">
                    <div class="info">
                        <div class="top">
                            <h6>Browser extension</h6>
                            <div {{ $loop->index === 0 ? 'class=links' : '' }}>
                                <div class="likeContainer {{ $loop->index === 0 ? 'glass' : '' }}">
                                    <span class="likeCounter">12</span>
                                    <svg clip-rule="evenodd" fill-rule="evenodd" stroke-linejoin="round" stroke-miterlimit="2" viewBox="0 0 420 350" xmlns="http://www.w3.org/2000/svg"><path d="m510 216.125c0 153.125-210 231.875-210 231.875s-210-78.75-210-231.875c0-65.275 50.736-118.125 113.4-118.125 40.824 0 76.608 22.488 96.6 56.175 19.992-33.687 55.776-56.175 96.6-56.175 62.664 0 113.4 52.85 113.4 118.125z" fill="#f7263f" fill-rule="nonzero" transform="translate(-90 -98)"/></svg>
                                </div>
                            </div>
                        </div>
                        
                        <h3>{{ $post->title }}</h3>
                        <p>{{ $post->excerpt }}</p>

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
    </section>
</x-front-layout>