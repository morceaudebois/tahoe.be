<x-front-layout class="photography">
    <section id='photo-grid'>
        <div class="photoContainer">
            @foreach ($photos->where('draft', false)->sortBy('date') as $photo)
                <a class="glassHover" href="{{ $photo->getThumbnailUrl('xl') }}" 
                    data-pswp-width="{{ $photo->width }}" 
                    data-pswp-height="{{ $photo->height }}" 
                    target="_blank">
                    <img src="{{ $photo->getThumbnailUrl('md') }}" alt="" style="aspect-ratio: {{ $photo->width }}/{{ $photo->height }}"/>
                </a>
                 <div class="links">
                    @livewire('like-button', ['element' => $photo, 'glass' => true])
                </div>
            @endforeach
        </div>

    </section>

</x-front-layout>