<x-layout>
    <x-slot:title>
        My diary
    </x-slot:title>
    <span class="text-3xl font-bold mb-6">My diary</span>
        <div class="divider"></div>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse ($diaryEntries as $diaryEntry)
            <x-diaryEntry :diaryEntry="$diaryEntry" />
        @empty
            <div class="col-span-full text-center">
                <p class="text-gray-500">No entries found.</p>
            </div>
        @endforelse  
    </div>
</x-layout>