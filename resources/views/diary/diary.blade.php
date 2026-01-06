<x-layout>
    <x-slot:title>
        My diary
    </x-slot:title>
    <span class="text-3xl font-bold mb-6">My diary 
        <button class="btn btn-circle">
            <a href="{{ route('createDiaryEntry') }}">
                <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640"><!--!Font Awesome Free v7.1.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2026 Fonticons, Inc.--><path d="M352 128C352 110.3 337.7 96 320 96C302.3 96 288 110.3 288 128L288 288L128 288C110.3 288 96 302.3 96 320C96 337.7 110.3 352 128 352L288 352L288 512C288 529.7 302.3 544 320 544C337.7 544 352 529.7 352 512L352 352L512 352C529.7 352 544 337.7 544 320C544 302.3 529.7 288 512 288L352 288L352 128z"/></svg>
            </a>
        </button>
    </span>
        <div class="divider"></div>
    <div class="grid grid-cols-1 gap-6">
        @forelse ($diaryEntries as $diaryEntry)
            <x-diaryEntry :diaryEntry="$diaryEntry" />
        @empty
            <div class="col-span-full text-center">
                <p class="text-gray-500">No entries found.</p>
            </div>
        @endforelse  
    </div>
    <div class="flex justify-center mt-6">
        <div class="join">

            {{-- First page --}}
            @if ($diaryEntries->onFirstPage())
                <button class="join-item btn btn-disabled"><<</button>
            @else
                <a href="{{ $diaryEntries->url(1) }}" class="join-item btn"><<</a>
            @endif

            {{-- Previous page --}}
            @if ($diaryEntries->onFirstPage())
                <button class="join-item btn btn-disabled">◀</button>
            @else
                <a href="{{ $diaryEntries->previousPageUrl() }}" class="join-item btn">◀</a>
            @endif

            {{-- Current page --}}
            <button class="join-item btn ">
                {{ $diaryEntries->currentPage() }}
            </button>

            {{-- Next page --}}
            @if ($diaryEntries->hasMorePages())
                <a href="{{ $diaryEntries->nextPageUrl() }}" class="join-item btn">▶</a>
            @else
                <button class="join-item btn btn-disabled">▶</button>
            @endif

            {{-- Last page --}}
            @if ($diaryEntries->hasMorePages())
                <a href="{{ $diaryEntries->url($diaryEntries->lastPage()) }}" class="join-item btn">>></a>
            @else
                <button class="join-item btn btn-disabled">>></button>
            @endif

        </div>
    </div>


</x-layout>

