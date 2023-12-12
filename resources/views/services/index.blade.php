<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight dark:text-gray-200">
            Services
        </h2>
    </x-slot>

    <div class="pb-12 bg-white dark:bg-gray-800">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg dark:bg-gray-700">
                <div class="p-6 bg-white border-b border-gray-200 dark:bg-gray-700 dark:border-gray-600">

                    <!-- Session Status -->
                    <x-auth-session-status class="mb-4" :status="session('status')" />

                    <!-- Table for Services -->
                    <table
                        class="min-w-full divide-y divide-gray-200 dark:divide-gray-600 border border-gray-300 dark:border-gray-600">
                        <thead class="bg-gray-50 dark:bg-gray-600">
                            <tr>
                                <th scope="col" class="text-left text-shades-600">Service #</th>
                                <th scope="col" class="text-left text-shades-600">Service Name</th>
                                <th scope="col" class="text-left text-shades-600">Description</th>
                                <th scope="col" class="text-left text-shades-600">Price</th>
                                <th scope="col" class="text-shades-600">Inactive</th>
                                <th scope="col" class="text-shades-600">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-600">
                            @foreach ($services as $service)
                                <tr
                                    class="@if ($loop->even) bg-gray-50 dark:bg-gray-700 @else bg-white dark:bg-gray-800 @endif">
                                    <td class="text-shades-600">{{ $service->service_number }}</td>
                                    <td class="text-shades-600">{{ $service->service_name }}</td>
                                    <td class="text-shades-600 max-w-[400px]">{{ $service->description }}</td>
                                    <td class="text-shades-600">${{ number_format($service->price, 2, '.', ',') }}</td>
                                    <td class="text-center text-shades-600">{{ $service->inactive ? 'Yes' : 'No' }}</td>
                                    <td class="text-center text-shades-600">
                                        <a href="{{ route('services.show', $service) }}"
                                            class="text-indigo-600 hover:text-indigo-900 dark:text-indigo-300 dark:hover:text-indigo-500">View</a>
                                        <a href="{{ route('services.edit', $service) }}"
                                            class="ml-2 text-green-600 hover:text-green-900 dark:text-green-300 dark:hover:text-green-500">Edit</a>
                                        <form action="{{ route('services.destroy', $service) }}" method="POST"
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
                        {{ $services->links() }}
                    </div>
                    <div class="mt-4 text-gray-600 dark:text-gray-400">
                        Showing {{ $services->firstItem() }} to {{ $services->lastItem() }} of total
                        {{ $services->total() }} services.
                    </div>

                    <!-- Add New Service Button -->
                    <div class="mt-4">
                        <a href="{{ route('services.create') }}"
                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            Add New Service
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
