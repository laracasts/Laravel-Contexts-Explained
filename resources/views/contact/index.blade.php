<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Contact Us') }}
        </h2>
    </x-slot>

    <div class="py-12">
    <form method="post" action="{{ route('contact.store') }}">
    @csrf
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            
            
            
        </div>
        </form>
    </div>
</x-app-layout>
