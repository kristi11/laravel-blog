<x-layout>
    <section class="px-6 py-8">
        <main class="max-w-lg mx-auto mt-10">
            <x-panel>
                <h1 class="font-bold text-xl text-center">Log In</h1>
                <div class="border border-red-200 text-center text-red-400 text-sm mt-3">
                    <p>Email: admin@admin.com</p>
                    <p>Password: password</p>
                </div>
                <form method="POST" action="/sessions" class="mt-10">
                    @csrf
                        <x-form.input name="email" type="email" autocomplete="username"/>
                        <x-form.input name="password" type="password" autocomplete="new-password"/>

                        <x-form.button>Log In</x-form.button>
                </form>
            </x-panel>
        </main>
    </section>
</x-layout>
