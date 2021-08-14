<x-guest-layout>
    <div class="max-w-4xl mx-auto my-2 sm:px-6 lg:px-8">
        <div class="bg-white mt-4 mb-2 shadow sm:rounded-lg">
            <div class="p-4 border-gray-200">
                <div class="flex-shrink-0 flex items-center justify-center">
                    <img class="rounded-lg" src="{{ $post->thumbnail }}" alt="{{ $post->thumbnail }}" width="600" height="400">
                </div>
                <div>
                    <div class="mt-4 flex items-center justify-center">
                        <div class="text-xl leading-7 font-bold">
                            <span class="text-gray-900">
                                {{ $post->title }}
                            </span>
                        </div>
                    </div>
                    
                    <div class="mx-4">
                        <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
                            {{ $post->body }}
                        </div>
                    </div>

                    <div class="mx-4 mt-2 items-center hidden xs:flex">
                        <div class="text-gray-600">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" />
                            </svg>
                        </div>

                        <div class="ml-1 text-gray-600 text-sm hover:underline">
                            {{ $post->category->name }}
                        </div>
                        
                        <div class="ml-3 text-gray-600">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 20l4-16m2 16l4-16M6 9h14M4 15h14" />
                            </svg>
                        </div>

                        <div class="ml-1 text-gray-600 text-sm hover:underline">
                            tags1
                        </div>
                        <div class="ml-1 text-gray-600 text-sm hover:underline">
                            tags2
                        </div>

                        <div class="ml-3 text-gray-600">
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
        <a href="{{ route('index') }}" class="bg-white shadow sm:rounded-lg px-4 py-2 w-28 mb-6 text-sm font-medium text-gray-700 flex items-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
            </svg>
            <span class="ml-2">Go back</span>
        </a>
    </div>
</x-guest-layout>