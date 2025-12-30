@props(['habit'])   

<div class="card bg-base-100 shadow-md">
    <div class="card-body">
        <h2 class="card-title">{{ $habit->title }}</h2>
        <p>{{ $habit->description }}</p>
        <p class="text-sm text-gray-500">Created {{ $habit->created_at->diffForHumans() }}</p>
        <form method="POST" action="/allHabits/{{ $habit->id }}"> @csrf @method('DELETE') 
            <button type="submit" onclick="return confirm('Are you sure you want to delete this habit?')"class="btn btn-ghost btn-xs text-error">
                <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--!Font Awesome Free v7.1.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path d="M166.2-16c-13.3 0-25.3 8.3-30 20.8L120 48 24 48C10.7 48 0 58.7 0 72S10.7 96 24 96l400 0c13.3 0 24-10.7 24-24s-10.7-24-24-24l-96 0-16.2-43.2C307.1-7.7 295.2-16 281.8-16L166.2-16zM32 144l0 304c0 35.3 28.7 64 64 64l256 0c35.3 0 64-28.7 64-64l0-304-48 0 0 304c0 8.8-7.2 16-16 16L96 464c-8.8 0-16-7.2-16-16l0-304-48 0zm160 72c0-13.3-10.7-24-24-24s-24 10.7-24 24l0 176c0 13.3 10.7 24 24 24s24-10.7 24-24l0-176zm112 0c0-13.3-10.7-24-24-24s-24 10.7-24 24l0 176c0 13.3 10.7 24 24 24s24-10.7 24-24l0-176z"/></svg>                </div>
            </button>
        </form>
    </div>
