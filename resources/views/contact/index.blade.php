<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Contact Us') }}
        </h2>
    </x-slot>

    <div class="py-12">
    <form method="post" action="{{ route('contact.store') }}">
    @csrf
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8 space-y-6">
        <div>
            <x-input-label for="contactMessage" :value="__('Message')" />
            
            <textarea 
                id="contactMessage" 
                name="contactMessage" 
                class="block mt-1 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm"
            ></textarea>

            <x-input-error :messages="$errors->get('contactMessage')" class="mt-2" />
        </div>

        

        <div class="flex items-center justify-end mt-4">
            <x-primary-button class="ms-3">
                {{ __('Send Message') }}
            </x-primary-button>
        </div>
            
            
        </div>
        </form>
    </div>
</x-app-layout>
