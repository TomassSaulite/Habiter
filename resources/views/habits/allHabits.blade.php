<x-layout>
    <x-slot:title>
        Register
    </x-slot:title>

    <span class="text-3xl font-bold mb-6">All Habits</span>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach ($habits as $habit)
            <div class="card bg-base-100 shadow-md">
                <div class="card-body">
                    <h2 class="card-title">{{ $habit->title }}</h2>
                    <p>{{ $habit->description }}</p>
                    <p class="text-sm text-gray-500">Created {{ $habit->created_at->diffForHumans() }}</p>
                </div>
            </div>
        @endforeach
        @if (!$habits)
            <div class="col-span-full text-center">
                <p class="text-gray-500">No habits found.</p>
            </div>
        @endif
    </div>
</x-layout>