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
        @foreach ($photos->where('draft', false)->sortByDesc('date') as $photo)
            @if (!Auth::check() || Auth::check() && !$photo->cope) 
                <div class="photo-wrapper">
                    <div class="photo glassHover">
                        <a href="{{ $photo->getThumbnailUrl('xl') }}" 
                            data-pswp-width="{{ $photo->width }}" 
                            data-pswp-height="{{ $photo->height }}" 
                            target="_blank"
                            @if ($photo->info)
                                data-description="{{ $photo->info }}"
                            @endif>
                            <img 
                                src="{{ $photo->getThumbnailUrl('md') }}" 
                                alt="{{ $photo->info }}" 
                                style="aspect-ratio: {{ $photo->width }}/{{ $photo->height }}"
                                @if ($loop && $loop->index > 6)
                                    loading="lazy"
                                @endif
                            />
                        </a>
                        <div class="links">
                            @livewire('like-button', ['element' => $photo, 'glass' => true])
                        </div>
                    </div>
                </div>
            @endif
        @endforeach
    </section>
</x-front-layout>