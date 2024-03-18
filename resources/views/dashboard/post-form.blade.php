<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __(isset($post) ? 'Edit my post' : 'New post') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
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

                <div class="mb-6 col-span-6">
                    <x-input name="title" placeholder="Title" type="text" class="dark:!bg-gray-800 mt-1 block w-full" 
                        required value="{{ old('title', isset($post) ? $post->title : '') }}" />
                    <x-input-error for="title" class="mt-2" />
                </div>

                <div class="mb-6 col-span-6 px-4 py-5 bg-white dark:bg-gray-800 sm:p-6 shadow sm:rounded-md dark:text-gray-300">
                    <input id="body" type="hidden" name="body" value="{{ old('body', isset($post) ? $post->body : '') }}">
                    <trix-editor class="trix-content" input="body"></trix-editor>

                    @error('body')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <x-form-section submit="updateProfileInformation">
                    <x-slot name="title">
                        {{ __('Metadata') }}
                    </x-slot>

                    <x-slot name="description">
                        {{ __('Some infos about the thing.') }}
                    </x-slot>

                    <x-slot name="form">
                        <div class="col-span-6">
                            <x-label id="slug" for="slug" value="{{ __('Slug') }}" />
                            <x-input name="slug" type="text" class="mt-1 block w-full" 
                            required value="{{ old('slug', isset($post) ? $post->slug : '') }}" />
                            <x-input-error for="slug" class="mt-2" />
                        </div>

                        <div class="col-span-6">
                            <x-label id="tags" for="tags" value="{{ __('Tags') }}" />
                            <x-input name="tags" type="text" class="mt-1 block w-full" 
                            required value="{{ old('tags', isset($post) ? $post->tags : '') }}" />
                            <x-input-error for="tags" class="mt-2" />
                        </div>

                        <div class="col-span-6">
                            <x-label id="excerpt" for="excerpt" value="{{ __('Excerpt') }}" />
                            <x-input name="excerpt" type="text" class="mt-1 block w-full" 
                            required value="{{ old('excerpt', isset($post) ? $post->excerpt : '') }}" />
                            <x-input-error for="excerpt" class="mt-2" />
                        </div>

                        <div class="col-span-6">
                            <x-label id="external_url" for="external_url" value="{{ __('External URL') }}" />
                            <x-input name="external_url" type="url" class="mt-1 block w-full" value="{{ old('external_url', isset($post) ? $post->external_url : '') }}" />
                            <x-input-error for="external_url" class="mt-2" />
                        </div>

                        <div class="col-span-6">
                            <x-label id="category_id" for="category_id" value="{{ __('Category') }}" />

                            <select name="category_id" id="category_id" class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm mt-1 block w-full">
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

                        <div class="col-span-6">
                            <x-label id="thumbnail" for="thumbnail" value="{{ __('Thumbnail') }}" />

                            @if (isset($post->thumbnail))
                                <div class="flex my-2">
                                    <img src="{{ $post->getThumbnailUrl('md') }}" width='100px'>
                                </div>
                            @endif

                            <input type="file" name="thumbnail" id="thumbnail" value="{{ old('thumbnail', isset($post) ? $post->thumbnail : '') }}" class="dark:text-gray-300">

                            @error('thumbnail')
                                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="col-span-6 flex">
                            <input id="draft" type="checkbox" name="draft" class="mr-2 rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800" {{ old('draft', isset($post) ? ($post->draft ? 'checked' : '') : 'checked') }} >

                            <x-label id="draft" for="draft" value="{{ __('Draft') }}" />

                            <x-input-error for="draft" class="mt-2" />
                        </div>

                        <div class="col-span-6">
                            <x-label id="date" for="date" value="{{ __('Date') }}" />

                            <x-input name="date" type="date" id="date" value="{{ old('date', $post->date ?? now()->toDateString()) }}" class="mt-1 block w-full" />

                            @error('date')
                                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                        <x-button class="col-span-2 max-w-32 flex">{{ isset($post) ? 'Update post' : 'Save post' }}</x-button>
                    </x-slot>
                </x-form-section>
            </form>
        </div>
    </div>
</x-app-layout>