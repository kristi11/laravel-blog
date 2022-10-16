@props(['heading'])
<section class="max-w-4xl mx-auto py-8">

    <h1 class="font-bold text-xl mb-8 pb-2 border-b">
        {{ $heading }}
    </h1>
    <div class="flex">
        <aside class="w-48 flex-shrink-0">
            <h4 class="font-semibold mb-4">Links</h4>

            <ul>
                <li>
                    <a href="/users/{{ auth()->user()->id }}" class="{{ request()->is('users/'.auth()->user()->id) ? 'text-blue-500' : '' }}">
                        Account
                    </a>
                </li>
                @can ('admin')
                    </li>
                        <a href="/users" class="{{ request()->is('users') ? 'text-blue-500' : '' }}">
                            All users
                        </a>
                    </li>

                    <li>
                        <a href="/admin/posts" class="{{ request()->is('admin/posts') ? 'text-blue-500' : '' }}">
                            All posts
                        </a>

                    <li>
                        <a href="/admin/posts/create" class="{{ request()->is('admin/posts/create') ? 'text-blue-500' : '' }}">
                            New Post
                        </a>
                    </li>
                    <li>
                        <a href="/admin/categories" class="{{ request()->is('admin/categories') ? 'text-blue-500' : '' }}">
                            Categories</a>
                    </li>
                @endcan
            </ul>

        </aside>
        <main class="flex-1">
            <x-panel>
               {{ $slot }}
            </x-panel>
        </main>
    </div>
</section>
