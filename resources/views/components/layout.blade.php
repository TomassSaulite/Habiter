
<!DOCTYPE html>
<html lang="en" data-theme="lofi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ isset($title) ? $title . ' - Chirper' : 'Chirper' }}</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/daisyui@5" rel="stylesheet" type="text/css" />
    <link href="https://cdn.jsdelivr.net/npm/daisyui@5/themes.css" rel="stylesheet" type="text/css" />
    <link href="https://cdn.jsdelivr.net/npm/daisyui@5" rel="stylesheet" type="text/css" />
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@5/themes.css" rel="stylesheet" type="text/css" />  
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen flex flex-col bg-base-200 font-sans">
    <nav class="navbar bg-base-100" >
        <div class="navbar bg-base-100 shadow-sm">
        <div class="flex-1">
            <a href = "/" class="btn btn-ghost text-xl">Habiter</a>
        </div>
        @guest
            <div class="flex-none">
            <button class="btn btn-ghost">
                <a href="{{ route('login') }}">Sign in</a>
            </button>
            <button class="btn btn-neutral">
                <a href="{{ route('register') }}">Sign up</a>
            </button>
        </div>
        @endguest
        @auth
            <div class="flex-none">
                <form method="POST" action="/logout" class="inline">
                    @csrf
                    <button type="submit" class="btn btn-ghost ">
                        Log Out
                    </button>
                </form>
                <div class="dropdown dropdown-bottom dropdown-end dropdown-hover">
                <div tabindex="0" role="button" class="btn m-1"><span>{{ Auth::user()->name  }}</span></div>
                <ul tabindex="-1" class="dropdown-content menu bg-base-100 rounded-box z-1 w-40 p-2 shadow-sm">
                    <li><a href ="/allHabits">My habits</a></li>
                    <li><a href ="/diary">My diary</a></li>
                </ul>
                </div>
            </div>
        @endauth
        
        </div>
    </nav>

    {{-- Success message --}}
    @if (session('success'))
        <div class="toast toast-top toast-center">
            <div class="alert alert-success animate-fade-out">
                <svg xmlns="<http://www.w3.org/2000/svg>" class="h-6 w-6 shrink-0 stroke-current" fill="none" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <span>{{ session('success') }}</span>
            </div>
        </div>
    @endif
    {{-- Error message --}}
    @if (session('error'))
        <div class="toast toast-top toast-center">
            <div class="alert alert-error animate-fade-out">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 shrink-0 stroke-current" fill="none" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <span>{{ session('error') }}</span>
            </div>
        </div>
    @endif

    <main class="flex-1 container mx-auto px-4 py-8">
       {{ $slot }}
    </main>

    <footer class="w-full mt-24">
        


    </footer>
</body>

</html>