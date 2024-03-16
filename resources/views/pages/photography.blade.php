<x-front-layout class="photography">
    @section('metatags')
        <x-meta
            title="Photography"
            image="{{ $photos->first()->getThumbnailUrl('lg') }}"
            url="{{ url()->current() }}"
            noindex="true"
        />
    @endsection

    <section id='photo-grid'>
        @foreach ($photos->where('draft', false)->sortBy('date') as $photo)
            <div class="photo-wrapper">
                <div class="photo glassHover">
                    <a href="{{ $photo->getThumbnailUrl('xl') }}" 
                        data-pswp-width="{{ $photo->width }}" 
                        data-pswp-height="{{ $photo->height }}" 
                        target="_blank"
                        data-description="{{ $photo->info }}">
                        <img src="{{ $photo->getThumbnailUrl('md') }}" alt="" style="aspect-ratio: {{ $photo->width }}/{{ $photo->height }}"/>
                    </a>
                    <div class="links">
                        @livewire('like-button', ['element' => $photo, 'glass' => true])
                    </div>
                </div>
            </div>
        @endforeach
    </section>
</x-front-layout>