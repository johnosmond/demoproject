<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight dark:text-gray-200">
            Contacts
        </h2>
    </x-slot>

    <div class="pb-12 bg-white dark:bg-gray-800">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg dark:bg-gray-700">
                <div class="p-6 bg-white border-b border-gray-200 dark:bg-gray-700 dark:border-gray-600">

                    <!-- Session Status -->
                    <x-auth-session-status class="mb-4" :status="session('status')" />

                    <!-- Table for Contacts -->
                    <table
                        class="min-w-full divide-y divide-gray-200 dark:divide-gray-600 border border-gray-300 dark:border-gray-600">
                        <thead class="bg-gray-50 dark:bg-gray-600">
                            <tr>
                                <th scope="col" class="text-left text-gray-500 dark:text-gray-300">Name</th>
                                <th scope="col" class="text-left text-gray-500 dark:text-gray-300">Customer</th>
                                <th scope="col" class="text-left text-gray-500 dark:text-gray-300">Phone</th>
                                <th scope="col" class="text-left text-gray-500 dark:text-gray-300">Email</th>
                                <th scope="col" class="text-gray-500 dark:text-gray-300">Inactive</th>
                                <th scope="col" class="text-gray-500 dark:text-gray-300">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-600">
                            @foreach ($contacts as $contact)
                                <tr
                                    class="@if ($loop->even) bg-gray-50 dark:bg-gray-700 @else bg-white dark:bg-gray-800 @endif">
                                    <td class="text-gray-500 dark:text-gray-300">{{ $contact->full_name() }}</td>
                                    <td class="text-gray-500 dark:text-gray-300">{{ $contact->customer->customer_name }}</td>
                                    <td class="text-gray-500 dark:text-gray-300">{{ $contact->phone }}</td>
                                    <td class="text-gray-500 dark:text-gray-300">{{ $contact->email }}</td>
                                    <td class="text-center text-gray-500 dark:text-gray-300">{{ $contact->inactive ? 'Yes' : 'No' }}</td>
                                    <td class="text-center text-gray-500 dark:text-gray-300">
                                        <a href="{{ route('contacts.show', $contact) }}"
                                            class="text-indigo-600 hover:text-indigo-900 dark:text-indigo-300 dark:hover:text-indigo-500">View</a>
                                        <a href="{{ route('contacts.edit', $contact) }}"
                                            class="ml-2 text-green-600 hover:text-green-900 dark:text-green-300 dark:hover:text-green-500">Edit</a>
                                        <form action="{{ route('contacts.destroy', $contact) }}" method="POST"
                                            class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="ml-2 text-red-600 hover:text-red-900 dark:text-red-300 dark:hover:text-red-500">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <!-- Pagination -->
                    <div class="mt-4">
                        {{ $contacts->links() }}
                    </div>
                    <div class="mt-4 text-gray-600 dark:text-gray-400">
                        Showing {{ $contacts->firstItem() }} to {{ $contacts->lastItem() }} of total
                        {{ $contacts->total() }} contacts.
                    </div>

                    <!-- Add New Contact Button -->
                    <div class="mt-4">
                        <a href="{{ route('contacts.create') }}"
                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            Add New Contact
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
