<x-layout>
<x-setting heading="Profile">
<div class="container mx-auto my-5 p-5">
        <div class="md:flex no-wrap md:-mx-2 ">
            <!-- Left Side -->
            <div class="w-full md:w-3/12 md:mx-2">
                <!-- Profile Card -->
                <div class="bg-white p-3 border-t-4 border-green-400">
                    <div class="image overflow-hidden">
                            @include('users.user_profile_pic')
                    </div>
                    <h1 class="text-gray-900 font-bold text-xl leading-8 my-1">{{ $user->name }}</h1>
                    @can ('admin')
                    <h3 class="text-gray-600 font-lg text-semibold leading-6 mb-4">
                        Role: <span class="bg-green-500 py-1 px-2 rounded text-white text-sm"> Admin</span>
                    </h3>
                    @else
                    <h3 class="text-gray-600 font-lg text-semibold leading-6 mb-4">
                        Role: <span class="bg-blue-500 py-1 px-2 rounded text-white text-sm">User</span>
                    </h3>
                    @endcan
                    <a class="bg-blue-500 py-1 px-2 rounded text-white text-sm" href="/users/{{ $user->id }}/edit">Edit Account</a>
                </div>
                    <form method="POST" action="/users/{{ $user->id }}">
                        @csrf
                        @method('DELETE')

                        <button type="submit" class="bg-red-500 py-1 px-2 rounded text-white text-sm">Delete account</button>
                    </form>
                <!-- End of profile card -->
            </div>
            <!-- Right Side -->
            <div class="w-full md:w-9/12 mx-2 h-64">
                <!-- Profile tab -->
                <!-- About Section -->
                <div class="bg-white p-3 shadow-sm rounded-sm">
                    <div class="flex items-center space-x-2 font-semibold text-gray-900 leading-8">
                        <span clas="text-green-500">
                            <svg class="h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                        </span>
                        <span class="tracking-wide">About</span>
                    </div>
                    <div class="text-gray-700">
                        <div class="grid text-sm">
                            <div class="grid grid-cols-2">
                                <div class="px-4 py-2 font-semibold">Name</div>
                                <div class="px-4 py-2">{{ $user->name }}</div>
                            </div>

                            <div class="grid grid-cols-2">
                                <div class="px-4 py-2 font-semibold">Username</div>
                                <div class="px-4 py-2">{{ $user->username }}</div>
                            </div>

                            <div class="grid grid-cols-2">
                                <div class="px-4 py-2 font-semibold">Email</div>
                                <div class="px-4 py-2">
                                    <a class="text-blue-800" href="mailto:{{ $user->email }}">{{ $user->email }}</a>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <!-- End of about section -->

                    <ul class="bg-gray-100 text-gray-600 hover:text-gray-700 hover:shadow py-2 px-3 mt-3 divide-y rounded shadow-sm">
                        <li class="flex items-center py-3">
                            <span>Member since</span>
                            <span class="ml-auto">{{ $user->created_at->format('F j, Y, g:i a') }}</span>
                        </li>
                    </ul>
                </div>
                <!-- End of profile tab -->
            </div>
        </div>
    </div>
</div>
</x-setting>
</x-layout>
