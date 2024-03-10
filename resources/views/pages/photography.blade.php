<x-front-layout class="photography">
    <section id='photo-grid'>
        
            @foreach ($photos->where('draft', false)->sortBy('date') as $photo)
                <div class="photoContainer glassHover">
                    <a href="{{ $photo->getThumbnailUrl('xl') }}" 
                        data-pswp-width="{{ $photo->width }}" 
                        data-pswp-height="{{ $photo->height }}" 
                        target="_blank">
                        <img src="{{ $photo->getThumbnailUrl('md') }}" alt="" style="aspect-ratio: {{ $photo->width }}/{{ $photo->height }}"/>
                    </a>
                    <div class="links">
                        @livewire('like-button', ['element' => $photo, 'glass' => true])
                    </div>
                </div>
            @endforeach
        

    </section>

</x-front-layout>