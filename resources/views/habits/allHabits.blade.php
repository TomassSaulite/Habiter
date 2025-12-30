<x-layout>
    <x-slot:title>
        Register
    </x-slot:title>
    <span class="text-3xl font-bold mb-6">All Habits</span>
        <div class="divider"></div>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse ($habits as $habit)
            <x-habit :habit="$habit" />
        @empty
            <div class="col-span-full text-center">
                <p class="text-gray-500">No habits found.</p>
            </div>
        @endforelse  
    </div>

    <div class="mt-6 text-center">
        @if ($habits->isEmpty())
            <button class="btn btn-soft btn-primary">
                        <a href="#">Create your first habit</a>
            </button>
        @else
            <button class="btn btn-soft btn-primary">
                        <a href="#">Create new habit</a>
            </button>
        @endif
    </div>
</x-layout>