<x-front-layout class="photography">
    <section id='photo-grid'>
        @foreach ($photos->where('draft', false) as $photo)
            <a class="glassHover" href="{{ $photo->getThumbnailUrl('xl') }}" 
                data-pswp-width="{{ $photo->width }}" 
                data-pswp-height="{{ $photo->height }}" 
                target="_blank">
                <img src="{{ $photo->getThumbnailUrl('md') }}" alt="" style="aspect-ratio: {{ $photo->width }}/{{ $photo->height }}"/>

                <div class="links">
                    <div class="likeContainer glass">
                        <span class="likeCounter">{{ $photo->likes }}</span>
                        <svg clip-rule="evenodd" fill-rule="evenodd" stroke-linejoin="round" stroke-miterlimit="2" viewBox="0 0 420 350" xmlns="http://www.w3.org/2000/svg"><path d="m510 216.125c0 153.125-210 231.875-210 231.875s-210-78.75-210-231.875c0-65.275 50.736-118.125 113.4-118.125 40.824 0 76.608 22.488 96.6 56.175 19.992-33.687 55.776-56.175 96.6-56.175 62.664 0 113.4 52.85 113.4 118.125z" fill="#f7263f" fill-rule="nonzero" transform="translate(-90 -98)"/></svg>
                    </div>
                </div>

            </a>
        @endforeach
    </section>

</x-front-layout>