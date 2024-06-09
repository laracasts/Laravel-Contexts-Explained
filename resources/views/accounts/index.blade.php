<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Accounts') }}
        </h2>
    </x-slot>

    <div class="py-12">
    <form method="post" action="{{ route('accounts.setActiveAccount') }}">
    @csrf
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            
            @foreach ($accounts as $account)
            <div class="p-4 flex justify-between items-center bg-white dark:bg-gray-800 dark:text-gray-200 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    {{$account->account_number }} {{ $account->name }}
                </div>
                <div>
                    @if (Context::get('active_account')->id == $account->id)
                        Active Account
                    @else
                    
                        <button type="submit" name="active_account_id" value="{{$account->id}}"class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                            Set as Active
                        </button>
                    
                    @endif
                </div>
                
            </div>
            @endforeach
            
        </div>
        </form>
    </div>
</x-app-layout>
