<x-front-layout>
    <div class="projects">
        {{-- Latests --}}
        <div class="flex gap-9">
            @foreach(range(1, 2) as $index)

                <a class="flex items-center p-1 dark:bg-[#151621] border border-[#282B3A] rounded-3xl {{ $index === 1 ? 'basis-2/3' : 'basis-1/3' }} {{ $index === 1 ? '' : 'flex-col justify-between'}}" href="#" title="" alt="" class="project">
                    <div class="px-6 min-w-[33%]">
                        <h2 class="text-xl">My Favorite Dogs</h2>
                        <p>{{ __('Create a list of your favorite dog breeds and share it with your friends.') }}</p>

                        <div class="tagContainer">
                            <span>#2022</span>
                            <span>#webapp</span>
                            <span>#php</span>
                        </div>
                    </div>

                    <img class="block rounded-3xl h-full w-full {{ $index === 1 ? 'max-w-[66%]' : ''}}" src="https://preview.redd.it/i-thought-most-of-the-first-google-results-when-looking-for-v0-sngtq2vz1zic1.png?width=1080&crop=smart&auto=webp&s=12e40591191689625e31ff35cfa9a22ad9f77d5f" alt="">
                </a>
            @endforeach
        </div>

        {{-- and then the rest --}}
    </div>
</x-front-layout>