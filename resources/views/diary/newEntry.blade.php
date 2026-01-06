<x-layout>
    <x-slot:title>
        New entry
    </x-slot:title>
    <span class="text-3xl font-bold mb-6">New entry 
    </span>
        <div class="divider"></div>

    <form method="POST" action="/newEntry" class="max-w-lg mx-auto bg-white p-6 rounded-lg shadow-md">
        @csrf
        <div class="mb-4">
            <label for="name" class="block text-gray-700 font-bold mb-2">Name this entry</label>
            <input type="text" name="name" id="name             " class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
        </div>
        <div class="mb-4">
            <label for="text" class="block text-gray-700 font-bold mb-2">What are you thinking about?</label>
            <textarea name="text" id="text" rows="6" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required></textarea>
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-primary px-6 py-2 rounded-lg text-white font-bold hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500">
                Create Entry
            </button>
        </div>
    </form>
</x-layout>