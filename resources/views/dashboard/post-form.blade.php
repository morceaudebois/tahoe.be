<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __(isset($post) ? 'Edit my post' : 'New post') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
               <form method="POST" enctype="multipart/form-data"
                    @if(isset($post))
                        action="{{ route('dashboard.post.update', $post) }}"
                    @else
                        action="{{ route('dashboard.post.store') }}"
                    @endif
                >
                    @csrf
                    @if (isset($post))
                        @method('PATCH')
                    @endif

                    <div>
                        <label for="title">Title</label>

                        <input type="text" name="title" id="title" value="{{ old('title', isset($post) ? $post->title : '') }}" required>

                        @error('title')
                            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="slug">Slug</label>

                        <input type="text" name="slug" id="slug" value="{{ old('title', isset($post) ? $post->slug : '') }}" required>

                        @error('slug')
                            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <label for="tags">Tags</label>

                        <input type="text" name="tags" id="tags" value="{{ old('title', isset($post) ? $post->tags : '') }}" required>
                        @error('tags')
                            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <label for="thumbnail">thumbnail</label>
                        @if (isset($post))
                            <div class="flex mt-6">
                                <img src="{{ $post->getThumbnailUrl('sm') }}" width='100px' alt="">
                            </div>
                        @endif

                        <input type="file" name="thumbnail" id="thumbnail" value="{{ old('title', isset($post) ? $post->thumbnail : '') }}">

                        @error('thumbnail')
                            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <label for="excerpt">Excerpt</label>

                        <input type="text" name="excerpt" id="excerpt" value="{{ old('excerpt', isset($post) ? $post->excerpt : '') }}" required>

                        @error('excerpt')
                            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <input id="body" type="hidden" name="body" value="{{ old('body', isset($post) ? $post->body : '') }}">
                        <trix-editor input="body"></trix-editor>

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
                                    {{ old('category_id', (isset($post) && $post->category_id == $category->id) ? 'selected' : '') }}
                                >{{ $category->name }}</option>
                            @endforeach 
                        </select>

                        @error('category_id')
                            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>


                    <div class="mb-6">
                        <label for="draft">Draft</label>

                        <input type="checkbox" name="draft" id="draft" {{ old('draft', isset($post) ? ($post->draft ? 'checked' : '') : '') }}>
                        
                        @error('draft')
                            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <x-button>{{ isset($post) ? 'Update post' : 'Save post' }}</x-button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
