<x-guest-layout>
    <div class="max-w-4xl mx-auto my-2 sm:px-6 lg:px-8">
        <div class="bg-white mt-4 mb-2 shadow sm:rounded-lg">
            <div class="p-4 border-gray-200">
                <div class="flex-shrink-0 flex items-center justify-center">
                    <img class="rounded-lg" 
                        src="{{ $post->thumbnail ? asset('storage/'.$post->thumbnail) : 'https://dummyimage.com/600x400/000/fff' }}" 
                        alt="{{ $post->thumbnail ? $post->thumbnail : 'dummyimage' }}" 
                        width="600" 
                        height="400"
                    >
                </div>
                <div class="p-5 sm:p-10">
                    <div class="my-10 mx-4">
                        <div class="text-4xl sm:text-5xl tracking-tight leading-10 font-bold">
                            <h1>
                                {{ $post->title }}
                            </h1>
                        </div>
                    </div>
                    
                    <div class="mx-4">
                        <div class="mt-2 text-gray-600 dark:text-gray-400 leading-7 sm:leading-8 text-lg sm:text-xl">
                            {!! $post->body !!}
                        </div>
                    </div>

                    <div class="mx-4 mt-2 items-center block xs:flex xs:items-center">
                        <div class="flex items-center">
                            <div class="text-gray-600">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" />
                                </svg>
                            </div>
    
                            <div class="ml-1 text-gray-600 text-sm hover:underline">
                                {{ $post->category->name }}
                            </div>
                        </div>
                        
                        <div class="mt-1 xs:mt-0 flex items-center">
                            <div class="xs:ml-3 text-gray-600">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 20l4-16m2 16l4-16M6 9h14M4 15h14" />
                                </svg>
                            </div>

                            @if (count($post->tags))
                                @foreach ($post->tags as $tag)
                                    <div class="ml-1 text-gray-600 text-sm hover:underline">
                                        {{ $tag->name }}
                                    </div>
                                @endforeach
                            @else
                                <div class="ml-1 text-gray-600 text-sm hover:underline">
                                    No tag
                                </div>
                            @endif
                        </div>
                        <div class="mt-1 xs:mt-0 flex items-center">
                            <div class="xs:ml-3 text-gray-600">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>

                            <div class="ml-1 text-gray-600 text-sm">
                                {{ $post->created_at->diffForHumans() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <a href="{{ route('index') }}" class="bg-white border border-gray-300 shadow sm:rounded-lg px-4 py-2 w-28 mb-6 text-sm font-medium flex items-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-2 w-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 19l-7-7 7-7m8 14l-7-7 7-7" />
              </svg>
            <span class="ml-2 text-gray-700">Go back</span>
        </a>
    </div>
</x-guest-layout>