<x-layout>
    <x-slot:title>
        Login
    </x-slot:title>

    <div class="flex justify-center mt-12 px-4">
        <div class="card bg-base-100 max-w-sm w-full shadow-md">
            <form class="fieldset bg-base-200 border-base-300 rounded-box border p-6 flex flex-col items-center gap-4"
                  method="POST" action="/login">
                @csrf

                <label class="fieldset w-full max-w-xs flex flex-col">
                    <span class="label">Email</span>
                    <input type="email"
                           name="email"
                           class="input validator w-full"
                           placeholder="johnsmith@email.com"
                           required>
                    <p class="validator-hint hidden text-red-500 text-sm mt-1">Required</p>
                </label>

                <label class="fieldset w-full max-w-xs flex flex-col">
                    <span class="label">Password</span>
                    <input type="password"
                           name="password"
                           class="input validator w-full"
                           placeholder="Password"
                           required>
                    <span class="validator-hint hidden text-red-500 text-sm mt-1">Required</span>
                </label>

                <button type="submit" class="btn btn-neutral w-full max-w-xs">
                    Login
                </button>

                <divider class="my-2"></divider>

                <div class="flex justify-center items-center gap-2">
                    <span>
                        Don't have an account?
                        <a href="/register" class="text-blue-500 hover:underline">Register here</a>
                    </span>
                </div>
            </form>
        </div>
    </div>
</x-layout>