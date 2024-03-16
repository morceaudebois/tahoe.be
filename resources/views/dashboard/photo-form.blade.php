<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __(isset($photo) ? 'Edit photo' : 'New photo') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="px-4 py-5 bg-white dark:bg-gray-800 sm:p-6 shadow sm:rounded-md dark:text-gray-300">
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

                    <div class="mb-6 col-span-6">
                            <x-label id="thumbnail" for="thumbnail" value="{{ __('Image') }}" />

                            @if (isset($photo->thumbnail))
                                <div class="flex my-2">
                                    <img src="{{ $photo->getThumbnailUrl('md') }}" width='100px'>
                                </div>
                            @endif

                            <input type="file" name="thumbnail" id="thumbnail" value="{{ old('thumbnail', isset($photo) ? $photo->thumbnail : '') }}" class="dark:text-gray-300">

                            @error('thumbnail')
                                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                            @enderror
                    </div>

                    <div class="col-span-6 mb-6 ">
                        <x-label id="info" for="info" value="{{ __('Info') }}" />
                        <x-input name="info" type="text" class="mt-1 block w-full" 
                        required value="{{ old('info', isset($photo) ? $photo->info : '') }}" />
                        @error('info')
                            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="col-span-6">
                        <x-label id="date" for="date" value="{{ __('Date') }}" />

                        <x-input name="date" type="date" id="date" value="{{ old('date', $photo->date ?? now()->toDateString()) }}" class="mt-1 block w-full" />

                        @error('date')
                            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="col-span-6 flex mb-6">
                        <input id="draft" type="checkbox" name="draft" class="mr-2 rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800" {{ old('draft', isset($photo) ? ($photo->draft ? 'checked' : '') : 'checked') }} >

                        <x-label id="draft" for="draft" value="{{ __('Draft') }}" />

                        @error('draft')
                            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <x-button>{{ isset($photo) ? 'Update photo' : 'Save photo' }}</x-button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
