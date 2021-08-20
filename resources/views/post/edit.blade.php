<x-app-layout>
    <div class="flex-1 flex flex-col sm:justify-center items-center pt-6 sm:pt-0">
        <div class="w-full sm:max-w-2xl my-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
            <!-- Validation Errors -->
            <x-auth-validation-errors class="mb-4" :errors="$errors" />

            <form method="POST" action="{{ route('post.update', [ 'post' => $post ]) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
    
                <!-- Title -->
                <div>
                    <x-label for="title" :value="__('Title')" />
    
                    <x-input id="title" class="block mt-1 w-full" type="text" name="title" value="{{ $post->title }}" autofocus />
                </div>
    
                <!-- Body -->
                <div class="mt-4">
                    <x-label for="body" :value="__('Body')" />
    
                    <textarea name="body" id="body" 
                        class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" 
                        rows="10" 
                        >{{ $post->body }}</textarea>
                </div>

                <!-- Category -->
                <div class="mt-4">
                    <x-label for="category" :value="__('Categories')" />

                    <select name="category" id="category" class="mt-1 w-full rounded-md shadow-sm border border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        @foreach ($categories as $category)
                            <option {{ $post->category_id == $category->id ? "selected=selected" : "" }} value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Tag -->
                <div class="block mt-4">
                    <x-label for="tag" :value="__('Tags')" />

                    <div class="-ml-4">
                        @foreach ($tags as $tag)
                            
                            <label for="tag" class="mt-1 ml-4 inline-flex items-center">
                                <input id="tag" type="checkbox"
                                    @foreach ($post->tags as $post_tag)
                                    {{ $post_tag->id == $tag->id ? "checked" : "" }}
                                    @endforeach
                                    name="tag[]" value="{{ $tag->id }}" 
                                    class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                <span class="ml-2 text-sm text-gray-600">{{ $tag->name }}</span>
                            </label>
                            
                        @endforeach
                    </div>
                </div>

                <!-- Thumbnail -->
                <div class="mt-4">
                    <x-label for="thumbnail" :value="__('Thumbnail')" />

                    <img class="rounded-lg mb-1" 
                        src="{{ $post->thumbnail ? asset('storage/'.$post->thumbnail) : 'https://dummyimage.com/600x400/000/fff' }}" 
                        alt="{{ $post->thumbnail ? $post->thumbnail : 'dummyimage' }}" 
                        width="60"
                        height="40"
                    >
    
                    <x-input id="thumbnail" class="block mt-1 w-full" type="file" name="thumbnail" />
                </div>
    
                <div class="flex items-center justify-end mt-4">
                    <x-button class="ml-3">
                        {{ __('Update') }}
                    </x-button>
                </div>
            </form>
            <a href="{{ route('dashboard') }}" class="flex items-center justify-end mt-4">
                <x-button class="ml-3">
                    {{ __('Go Back') }}
                </x-button>
            </a>
        </div>
    </div>
</x-app-layout>