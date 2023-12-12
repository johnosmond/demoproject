<x-app-layout>
    <x-slot name="header">
        <h2>
            {{ $product->product_name }}
        </h2>
    </x-slot>

    <div class="pb-12 bg-white dark:bg-gray-800">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg dark:bg-gray-700">
                <div class="p-6 bg-white border-b border-gray-200 dark:bg-gray-700 dark:border-gray-600">

                    <!-- Product Details Here -->
                    <h3 class="text-gray-800 dark:text-gray-200">Product Details:</h3>
                    <div class="bg-white dark:bg-gray-700 mt-4 p-4 shadow rounded-lg">
                        <div class="grid grid-cols-[auto,1fr] gap-4">
                            <div class="font-extrabold text-shades-600">Product #:</div>
                            <div class="text-shades-600">{{ $product->product_number }}</div>

                            <div class="font-extrabold text-shades-600">Product Name:</div>
                            <div class="text-shades-600">{{ $product->product_name }}</div>

                            <div class="font-extrabold text-shades-600">Description:</div>
                            <div class="text-shades-600">{{ $product->description }}</div>

                            <div class="font-extrabold text-shades-600">Price:</div>
                            <div class="text-shades-600">{{ $product->price }}</div>

                            <div class="font-extrabold text-shades-600">Inactive:</div>
                            <div class="text-shades-600">{{ $product->inactive ? 'Yes' : 'No' }}</div>

                            <div class="font-extrabold text-shades-600">Created on:</div>
                            <div class="text-shades-600">{{ $product->created_at }}</div>

                            <div class="font-extrabold text-shades-600">Updated on:</div>
                            <div class="text-shades-600">{{ $product->updated_at }}</div>
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="flex items-center mt-4">
                        <!-- Edit Button -->
                        <a href="{{ route('products.edit', $product) }}"
                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            Edit Product
                        </a>

                        <!-- Delete Button -->
                        <form action="{{ route('products.destroy', $product) }}" method="POST" class="ml-2">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded"
                                onclick="return confirm('Are you sure?')">
                                Delete Product
                            </button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
