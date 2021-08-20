<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="p-2 bg-white overflow-hidden shadow-sm sm:rounded-lg flex flex-col space-y-2">
                <a href="{{ route('post.create') }}" class="p-2 bg-white border border-indigo-300 rounded-lg">
                    Create a post
                </a>
                <a href="{{ route('category.create') }}" class="p-2 bg-white border border-indigo-300 rounded-lg">
                    Create a category
                </a>
                <a href="{{ route('tag.create') }}" class="p-2 bg-white border border-indigo-300 rounded-lg">
                    Create a tag
                </a>
            </div>
            <div class="lg:flex mt-10">
                <div class="lg:w-4/6">
                    <div class="bg-white p-2 mt-2 shadow sm:rounded-lg">
                        All Posts
                    </div>
                    @if (count($posts))
                        @foreach ($posts as $post)
                            <div class="my-2">
                                <div class="bg-white border border-indigo-300 sm:rounded-lg flex flex-col sm:flex-row justify-between sm:items-center">
                                    <div class="pt-2 pb-0 px-2 sm:p-2 border-gray-200 flex items-center">
                                        <div class="flex-shrink-0 flex items-center justify-between">
                                            <img class="rounded-lg" 
                                                src="{{ $post->thumbnail ? asset('storage/'.$post->thumbnail) : 'https://dummyimage.com/600x400/000/fff' }}" 
                                                alt="{{ $post->thumbnail ? $post->thumbnail : 'dummyimage' }}" 
                                                width="60"
                                                height="40"
                                            >
                                        </div>
                                        <div class="ml-2">
                                            <div>
                                                <div class="text-lg leading-7 font-semibold">
                                                    <a href="{{ route('show', [ 'post' => $post ]) }}" class="text-gray-900">
                                                        {{ $post->title }}
                                                    </a>
                                                </div>
                                            </div>
                                            
                                            <div class="items-center hidden xs:flex">
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
                                    <div x-data="{ open: false }" class="relative p-2 flex items-center">
                                        <a href="{{ route('post.edit', [ 'post' => $post->id ] ) }}" class="bg-white border border-gray-300 rounded-lg px-4 py-2 text-sm font-medium flex items-center">
                                            <span class=" text-gray-700">Edit</span>
                                        </a>
                                        <button @click=" open = ! open " class="bg-white border border-gray-300 ml-2 rounded-lg px-4 py-2 text-sm font-medium flex items-center">
                                            <span class="text-red-500">Delete</span>
                                        </button>
                                        <div x-show="open" class="absolute bottom-12 left-2 sm:right-2 bg-white border border-gray-300 rounded-lg px-4 py-2 text-sm font-medium flex flex-col items-start">
                                            <span class="text-gray-700 mb-2">Are you sure?</span>
                                            <form method="POST" action="{{ route('post.destroy', [ 'post' => $post ]) }}">
                                                @csrf
                                                @method('DELETE')
                        
                                                <button class="bg-white border border-gray-300 rounded-lg px-6 py-2 text-sm font-medium flex items-center"
                                                    onclick="event.preventDefault();
                                                        this.closest('form').submit();"
                                                >
                                                    <span class="text-red-500">Delete</span>
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        <div class="my-2">
                            {{ $posts->links() }}
                        </div> 
                    @else
                        <div class="flex items-center justify-center">
                            <div class="text-gray-600">There is no post.</div>
                        </div>
                    @endif
                </div>
                <div class="lg:w-2/6 mt-10 lg:mt-0 lg:ml-3">
                    <div class="bg-white p-2 mt-2 shadow sm:rounded-lg">
                        All Categories
                    </div>
                    <div class="bg-white p-2 space-y-2 mt-2 shadow sm:rounded-lg">
                        @if (count($categories))
                            @foreach ($categories as $category)
                                <div>
                                    <div class="bg-white border border-indigo-300 rounded-lg flex justify-between items-center">
                                        <div class="p-2 border-gray-200 flex items-center">
                                            <div class="text-gray-600">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" />
                                                </svg>
                                            </div>
                                            <div class="ml-1 text-gray-600 text-sm hover:underline">
                                                {{ $category->name }}
                                            </div>
                                        </div>
                                        <div x-data="{ open: false }" class="relative p-2 flex items-center">
                                            <a href="{{ route('category.edit', [ 'category' => $category ]) }}" class="bg-white border border-gray-300 rounded-lg px-4 py-2 text-sm font-medium flex items-center">
                                                <span class=" text-gray-700">Edit</span>
                                            </a>
                                            <button @click=" open = ! open " class="bg-white border border-gray-300 ml-2 rounded-lg px-4 py-2 text-sm font-medium flex items-center">
                                                <span class="text-red-500">Delete</span>
                                            </button>
                                            <div x-show="open" class="absolute bottom-12 right-2 bg-white border border-gray-300 rounded-lg px-4 py-2 text-sm font-medium flex flex-col items-start">
                                                <span class="text-gray-700 mb-2">Are you sure?</span>
                                                <form method="POST" action="{{ route('category.destroy', [ 'category' => $category ]) }}">
                                                    @csrf
                                                    @method('DELETE')
                            
                                                    <button class="bg-white border border-gray-300 rounded-lg px-6 py-2 text-sm font-medium flex items-center"
                                                        onclick="event.preventDefault();
                                                            this.closest('form').submit();"
                                                    >
                                                        <span class="text-red-500">Delete</span>
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            <div class="mt-2">
                                {{ $categories->links() }}
                            </div>
                        @else
                            <div class="bg-white p-2 mt-2 shadow sm:rounded-lg">
                                No Categories
                            </div>
                        @endif
                    </div>
                    <div class="bg-white p-2 mt-10 shadow sm:rounded-lg">
                        All Tags
                    </div>
                    <div class="bg-white p-2 space-y-2 mt-2 shadow sm:rounded-lg">
                        @if (count($tags))
                            @foreach ($tags as $tag)
                                <div>
                                    <div class="bg-white border border-indigo-300 rounded-lg flex justify-between items-center">
                                        <div class="p-2 border-gray-200 flex items-center">
                                            <div class="text-gray-600">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 20l4-16m2 16l4-16M6 9h14M4 15h14" />
                                                </svg>
                                            </div>
                                            <div class="ml-1 text-gray-600 text-sm hover:underline">
                                                {{ $tag->name }}
                                            </div>
                                        </div>
                                        <div x-data="{ open: false }" class="relative p-2 flex items-center">
                                            <a href="{{ route('tag.edit', [ 'tag' => $tag ]) }}" class="bg-white border border-gray-300 rounded-lg px-4 py-2 text-sm font-medium flex items-center">
                                                <span class=" text-gray-700">Edit</span>
                                            </a>
                                            <button @click=" open = ! open " class="bg-white border border-gray-300 ml-2 rounded-lg px-4 py-2 text-sm font-medium flex items-center">
                                                <span class="text-red-500">Delete</span>
                                            </button>
                                            <div x-show="open" class="absolute bottom-12 right-2 bg-white border border-gray-300 rounded-lg px-4 py-2 text-sm font-medium flex flex-col items-start">
                                                <span class="text-gray-700 mb-2">Are you sure?</span>
                                                <form method="POST" action="{{ route('tag.destroy', [ 'tag' => $tag ]) }}">
                                                    @csrf
                                                    @method('DELETE')
                            
                                                    <button class="bg-white border border-gray-300 rounded-lg px-6 py-2 text-sm font-medium flex items-center"
                                                        onclick="event.preventDefault();
                                                            this.closest('form').submit();"
                                                    >
                                                        <span class="text-red-500">Delete</span>
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            <div class="mt-2">
                                {{ $tags->links() }}
                            </div>
                        @else
                            <div class="bg-white p-2 mt-2 shadow sm:rounded-lg">
                                No Categories
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
