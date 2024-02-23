<x-front-layout>
    <div class="projects">
        {{-- Latests --}}
        <div class="flex gap-9">
            {{-- @foreach(range(1, 2) as $index) --}}
            @php $index= 1; @endphp
                <a class="flex items-center p-1 dark:bg-[#151621] border border-[#282B3A] rounded-3xl relative {{ $index === 1 ? 'full' : 'basis-1/3' }} {{ $index === 1 ? '' : 'flex-col justify-between'}}" href="#" title="" alt="" class="project">
                    <div class="px-6 min-w-[50%]">
                        <h2 class="text-3xl">My Favorite Dogs</h2>
                        <p>{{ __('Create a list of your favorite dog breeds and share it with your friends.') }}</p>

                        <div class="tagContainer flex gap-2 items-center {{ $index === 2 ? 'absolute bottom-3 right-3' : ''}}">
                            <span class="rounded-2xl bg-gray-800 p-2 pt-1 opacity-90 border-box">#2022</span>
                            <span class="rounded-2xl bg-gray-800 p-2 pt-1 opacity-90 border-box">#webapp</span>
                            <span class="rounded-2xl bg-gray-800 p-2 pt-1 opacity-90 border-box">#php</span>
                        </div>
                    </div>

                    <img class="block rounded-3xl h-full {{ $index === 1 ? 'max-w-[50%]' : ''}}" src="https://placekitten.com/1920/1080" alt="">
                </a>
            {{-- @endforeach --}}








            
        </div>

        <div class="flex gap-7 grid grid-cols-3 mt-7">
            @foreach(range(1, 8) as $index)

                <a class="flex flex-col items-center p-1 dark:bg-[#151621] border border-[#282B3A] rounded-3xl relative" href="#" title="" alt="" class="project">
                    <div class="p-6">
                        <h2 class="text-xl">My Favorite Dogs</h2>
                        <p>{{ __('Create a list of your favorite dog breeds and share it with your friends.') }}</p>

                        <div class="tagContainer flex gap-2 items-center absolute bottom-3 right-3">
                            <span class="rounded-2xl p-2 pt-1 border-box text-sm backdrop-blur-xl bg-black/70 border border-[#282B3A] ">#2022</span>
                            <span class="rounded-2xl p-2 pt-1 border-box text-sm backdrop-blur-xl bg-black/70 border border-[#282B3A] ">#webapp</span>
                            <span class="rounded-2xl p-2 pt-1 border-box text-sm backdrop-blur-xl bg-black/70 border border-[#282B3A] ">#php</span>
                        </div>
                    </div>

                    <img class="block rounded-3xl h-full" src="https://placekitten.com/1920/1080" alt="">
                </a>
            @endforeach
        </div>

        {{-- and then the rest --}}
    </div>
</x-front-layout>