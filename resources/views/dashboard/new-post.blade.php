<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('New post') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
               <form method="POST" action="/admin/posts">
                    @csrf

                    <div>
                        <label for="title">Title</label>

                        <input type="text" name="title" id="title" value="{{ old('title') }}" required>

                        @error('title')
                            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="slug">Slug</label>

                        <input type="text" name="slug" id="slug" value="{{ old('slug') }}" required>

                        @error('slug')
                            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <label for="tags">Tags</label>

                        <input type="text" name="tags" id="tags" value="{{ old('tags') }}" required>
                        @error('tags')
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

                    <div class="mb-6">
                        <label for="body">Body</label>

                        <textarea name="body" id="body" required>
                            {{ old('body') }}
                        </textarea>

                        @error('body')
                            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <label for="category_id">Category</label>

                        <select name="category_id" id="category_id">
                            @foreach (\App\Models\Category::all() as $category)
                                <option
                                    value="{{ $category->id }}"
                                    {{ old('category_id') == $category->id ? 'selected' : '' }}
                                >{{ $category->name }}</option>
                            @endforeach
                        </select>

                        @error('category_id')
                            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <x-button>Publish</x-button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
