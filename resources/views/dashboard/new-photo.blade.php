<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('New photo') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
               <form method="POST" action="/dashboard/post-photo" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-6">
                        <label for="thumbnail">thumbnail</label>

                        <input type="file" name="thumbnail" id="thumbnail" value="{{ old('thumbnail') }}" required>
                        @error('thumbnail')
                            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <label for="excerpt">Excerpt</label>

                        <textarea name="excerpt" id="excerpt" required>
                            {{ old('excerpt') }}
                        </textarea>

                        @error('excerpt')
                            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <x-button>Publish</x-button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
