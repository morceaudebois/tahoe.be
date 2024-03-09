<x-app-layout>
    <x-slot name="header">
        <h2 class="flex items-center font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('All posts') }}
        </h2>

        <a href="{{ route('dashboard.post.create') }}" class="inline-flex items-center px-4 py-2 bg-blue-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-600 active:bg-blue-700 focus:outline-none focus:border-blue-900 focus:ring ring-blue-300 disabled:opacity-25 transition ease-in-out duration-150">
            New post
        </a>
    </x-slot>


    <div class="py-12 max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                <table class="min-w-full divide-y divide-gray-200">
                    <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-800 dark:divide-gray-700">
                        @foreach ($posts as $post)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="text-sm font-medium text-gray-900 dark:text-gray-300">
                                            <a href="/post/{{ $post->slug }}">
                                                {{ $post->title }}
                                            </a>
                                        </div>
                                    </div>
                                </td>

                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <a href="{{ route('dashboard.post.edit', $post) }}" class="text-blue-500 hover:text-blue-600">Edit</a>
                                </td>

                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <div class="deleteContainer" x-data="{ askedToDelete_{{ $loop->index }}: false }">
                                        <button class="text-xs text-gray-400" @click="askedToDelete_{{ $loop->index }}= true" x-show="!askedToDelete_{{ $loop->index }}">Delete</button>

                                        <form x-show="askedToDelete_{{ $loop->index }}" method="POST" action="{{ route('dashboard.post.destroy', $post) }}">
                                            @csrf
                                            @method('DELETE')

                                            <button class="text-xs text-red-400">Are you sure?</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</x-app-layout>
