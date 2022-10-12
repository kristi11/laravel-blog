<x-layout>
    <section class="px-6 py-8">
        <main class="max-w-lg mx-auto mt-10">
            <x-panel>
            <h1 class="font-bold text-xl text-center">Register</h1>
            <form method="POST" action="/register" class="mt-10">
                @csrf

                <x-form.input name="name" type="text"/>
                <x-form.input name="username" type="text"/>
                <x-form.input name="email" type="email"/>
                <x-form.input name="password" type="password"/>

                <x-form.button>Submit</x-form.button>
            </form>
        </main>
    </x-panel>
    </section>
</x-layout>
