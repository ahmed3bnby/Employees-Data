<x-app-layout>
    <x-slot name="header">


        <div class="text-2xl text-gray-800 dark:text-gray-200 font-semibold">
            Welcome To Dashboard
        </div>
        <div class="mt-4">
            <a href="{{ url('/employees') }}" class="text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">
                View Data
            </a>
            <span class="mx-2">|</span>
            <a href="{{ url('/create') }}" class="text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">
                Add New Data
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    You're logged in!
                </div>
            </div>
        </div>
    </div>
</x-app-layout>


