<x-layout>
    <x-slot:title>
        Home Feed
    </x-slot:title>
    @guest
    <div class="hero bg-base-200">
        <div class="hero-content flex justify-center">
            <div class="max-w-md text-center">
                <h1 class="text-5xl font-bold">Hello there</h1>
                <p class="py-6">
                    use Habiter to track your habits and journal your daily experiences.
                </p>
                <button class="btn btn-primary"><a href="/login">Get Started</a></button>
            </div>
        </div>
    </div>
    @endguest
    @auth
    <div class="hero bg-base-200">
        <div class="hero-content flex justify-center">
            <div class="max-w-md text-center">
                <h1 class="text-5xl font-bold">Hello there</h1>
                <p class="py-6">
                    Make yourself better everyday!
                </p>
                <button class="btn btn-primary"><a href="{{ route('allHabits') }}">Complete a habit</a></button>
                <button class="btn btn-primary"><a href="{{ route('createDiaryEntry') }}">Write about your day</a></button>
            </div>
        </div>
    </div>
    @endauth
</x-layout>
