<x-layout>
    <x-slot:title>
        Register
    </x-slot:title>

    <div class="card bg-base-100  max-w-sm  mx-auto shadow-md">
        <form class="fieldset bg-base-200 border-base-300 rounded-box w-sm border p-4" method="POST" action="/login">
            @csrf
            <label class="fieldset">
                <label class="label">Email</label>
                <input type="email" name="email" class="input validator" placeholder="johnsmith@email.com" required />
                <p class="validator-hint hidden">Required</p>
            </label>
            <label class="fieldset">
                <span class="label">Password</span>
                <input type="password" name="password" class="input validator" placeholder="Password" required />
                <span class="validator-hint hidden">Required</span>
            </label>

            <button class="btn btn-neutral mt-4" type="submit">Login</button>
        </form>
    </div>
</x-layout>