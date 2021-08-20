<x-app-layout>
    <div class="flex-1 flex flex-col sm:justify-center items-center pt-6 sm:pt-0">
        <div class="w-full sm:max-w-2xl my-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
            <!-- Validation Errors -->
            <x-auth-validation-errors class="mb-4" :errors="$errors" />

            <form method="POST" action="{{ route('category.update', [ 'category' => $category ]) }}">
                @csrf
                @method('PUT')

                <!-- Name -->
                <div>
                    <x-label for="name" :value="__('Name')" />
    
                    <x-input id="name" class="block mt-1 w-full" type="text" name="name" value="{{ $category->name }}" autofocus />
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