<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit photo') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
               <form method="POST" enctype="multipart/form-data"
                    @if(isset($photo))
                        action="{{ route('dashboard.photo.update', $photo) }}"
                    @else
                        action="{{ route('dashboard.photo.store') }}"
                    @endif
                >

                    @csrf
                    @if (isset($photo))
                        @method('PATCH')
                    @endif

                    @if (isset($photo))
                        <div class="flex mt-6">
                            <img src="{{ $photo->getThumbnailUrl('md') }}" width='100px' alt="">
                        </div>
                    @endif
                    
                    <div class="mb-6">
                        <label for="thumbnail">thumbnail</label>

                        <input type="file" name="thumbnail" id="thumbnail" value="{{ old('thumbnail', isset($photo) ? $photo->thumbnail : '') }}" required>
                        @error('thumbnail')
                            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <label for="excerpt">Excerpt</label>

                        <input type="text" name="excerpt" id="excerpt" value="{{ old('excerpt', isset($photo) ? $photo->excerpt : '') }}" required>

                        @error('excerpt')
                            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <x-button>{{ isset($photo) ? 'Update photo' : 'Publish photo' }}</x-button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
