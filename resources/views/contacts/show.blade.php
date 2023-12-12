<x-app-layout>
    <x-slot name="header">
        <h2>
            {{ $contact->full_name() }}
        </h2>
    </x-slot>

    <div class="pb-12 bg-white dark:bg-gray-800">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg dark:bg-gray-700">
                <div class="p-6 bg-white border-b border-gray-200 dark:bg-gray-700 dark:border-gray-600">

                    <!-- Contact Details Here -->
                    <h3 class="text-gray-800 dark:text-gray-200">Contact Details:</h3>
                    <div class="bg-white dark:bg-gray-700 mt-4 p-4 shadow rounded-lg">
                        <div class="grid grid-cols-[auto,1fr] gap-4">
                            <div class="font-extrabold text-shades-600">Name:</div>
                            <div class="text-shades-600">{{ $contact->full_name() }}</div>

                            <div class="font-extrabold text-shades-600">Company:</div>
                            <div class="text-shades-600">{{ $contact->customer->customer_name }}</div>

                            <div class="font-extrabold text-shades-600">Phone:</div>
                            <div class="text-shades-600">{{ $contact->phone }}</div>

                            <div class="font-extrabold text-shades-600">Email:</div>
                            <div class="text-shades-600 whitespace-pre-line">{{ $contact->email }}</div>

                            <div class="font-extrabold text-shades-600">Inactive:</div>
                            <div class="text-shades-600">{{ $contact->inactive ? 'Yes' : 'No' }}</div>

                            <div class="font-extrabold text-shades-600">Created on:</div>
                            <div class="text-shades-600">{{ $contact->created_at }}</div>

                            <div class="font-extrabold text-shades-600">Updated on:</div>
                            <div class="text-shades-600">{{ $contact->updated_at }}</div>
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="flex items-center mt-4">
                        <!-- Edit Button -->
                        <a href="{{ route('contacts.edit', $contact) }}"
                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            Edit Contact
                        </a>

                        <!-- Delete Button -->
                        <form action="{{ route('contacts.destroy', $contact) }}" method="POST" class="ml-2">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded"
                                onclick="return confirm('Are you sure?')">
                                Delete Contact
                            </button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
