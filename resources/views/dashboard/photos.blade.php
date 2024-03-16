<x-app-layout>
    <x-slot name="header">
        <h2 class="flex items-center font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('All photos') }}
        </h2>

        <a href="{{ route('dashboard.photo.create') }}" class="inline-flex items-center px-4 py-2 bg-blue-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-600 active:bg-blue-700 focus:outline-none focus:border-blue-900 focus:ring ring-blue-300 disabled:opacity-25 transition ease-in-out duration-150">
            New photo
        </a>
    </x-slot>

    <div class="py-12 max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="grid grid-cols-3 gap-4">
            @foreach ($photos->sortBy('created_at') as $photo)
                <div class="photo">
                    <a href="{{ route('dashboard.photo.edit', $photo) }}" class="h-64">
                        <img src="{{ $photo->getThumbnailUrl('md') }}" alt="{{ $photo->info }}">
                    </a>

                    <div class="deleteContainer" x-data="{ askedToDelete_{{ $loop->index }}: false }">
                        <button class="text-xs text-gray-400" @click="askedToDelete_{{ $loop->index }}= true" x-show="!askedToDelete_{{ $loop->index }}">Delete</button>

                        <form x-show="askedToDelete_{{ $loop->index }}" method="POST" action="{{ route('dashboard.photo.destroy', $photo) }}">
                            @csrf
                            @method('DELETE')

                            <button class="text-xs text-red-400">Are you sure?</button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
