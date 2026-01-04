@props(['habit'])   

<div class="card bg-base-100 shadow-md">
    <div class="card-body">
        <h2 class="card-title">{{ $habit->name }}</h2>
        <p>{{ $habit->description }}</p>
        <p class="text-sm text-gray-500">Created {{ $habit->created_at->diffForHumans() }}</p>
        <p class="text-sm text-gray-500">Last completed: 
        @if( !$habit->last_completed)
            Never
        @elseif ($habit->last_completed->isToday())
            Today
        @elseif ($habit->last_completed->isYesterday())
            Yesterday
        @else
            {{ $habit->last_completed->diffForHumans() }}
        @endif
        </p>
        <p class="text-sm text-gray-500">Counter: {{ $habit->counter }}</p>
        <form method="POST" action="/allHabits/{{ $habit->id }}"> @csrf @method('DELETE') 
            <button type="submit" onclick="return confirm('Are you sure you want to delete this habit?')"class="btn btn-ghost btn-xs text-error">
                <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--!Font Awesome Free v7.1.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path d="M166.2-16c-13.3 0-25.3 8.3-30 20.8L120 48 24 48C10.7 48 0 58.7 0 72S10.7 96 24 96l400 0c13.3 0 24-10.7 24-24s-10.7-24-24-24l-96 0-16.2-43.2C307.1-7.7 295.2-16 281.8-16L166.2-16zM32 144l0 304c0 35.3 28.7 64 64 64l256 0c35.3 0 64-28.7 64-64l0-304-48 0 0 304c0 8.8-7.2 16-16 16L96 464c-8.8 0-16-7.2-16-16l0-304-48 0zm160 72c0-13.3-10.7-24-24-24s-24 10.7-24 24l0 176c0 13.3 10.7 24 24 24s24-10.7 24-24l0-176zm112 0c0-13.3-10.7-24-24-24s-24 10.7-24 24l0 176c0 13.3 10.7 24 24 24s24-10.7 24-24l0-176z"/></svg>                </div>
            </button>
        </form>
        <form method="POST" action="/allHabits/{{ $habit->id }}"> @csrf @method('PUT') 
            <div class="mt-2">
                <button type="submit" class="btn btn-ghost btn-xs">
                    <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640"><!--!Font Awesome Free v7.1.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2026 Fonticons, Inc.--><path d="M530.8 134.1C545.1 144.5 548.3 164.5 537.9 178.8L281.9 530.8C276.4 538.4 267.9 543.1 258.5 543.9C249.1 544.7 240 541.2 233.4 534.6L105.4 406.6C92.9 394.1 92.9 373.8 105.4 361.3C117.9 348.8 138.2 348.8 150.7 361.3L252.2 462.8L486.2 141.1C496.6 126.8 516.6 123.6 530.9 134z"/></svg>
                </button>
            </div>
        </form>
    </div>
