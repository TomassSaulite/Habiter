@props(['diaryEntry'])   

<div class="card bg-base-100 shadow-md">
    <div class="card-body">
        <h2 class="card-title">{{ $diaryEntry->name }}</h2>
        <p>{{ $diaryEntry->text }}</p>
        <p class="text-sm text-gray-500">Created {{ $diaryEntry->created_at->diffForHumans() }}</p>
    </div>
</div>

