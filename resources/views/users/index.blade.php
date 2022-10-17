<x-layout>
    <x-setting heading="Manage posts">
        <div class="flex flex-col">
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-100 border-b">
                                <tr>
                                  <th scope="col" class="text-sm font-bold font-medium text-gray-900 px-6 py-4 text-left">
                                    Profile pic
                                  </th>
                                  <th scope="col" class="text-sm font-bold font-medium text-gray-900 px-6 py-4 text-left">
                                    Name
                                  </th>
                                  <th scope="col" class="text-sm font-bold font-medium text-gray-900 px-6 py-4 text-left">
                                    Username
                                  </th>
                                  <th scope="col" class="text-sm font-bold font-medium text-gray-900 px-6 py-4 text-left">
                                    Email
                                  </th>
                                  <th scope="col" class="text-sm font-bold font-medium text-gray-900 px-6 py-4 text-left">
                                    Created
                                  </th>
                                  <th scope="col" class="text-sm font-bold font-medium text-gray-900 px-6 py-4 text-left">
                                    Role
                                  </th>
                                </tr>
                              </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach ($users as $user)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex items-center">
                                                <div class="flex-shrink-0 w-10 h-10">
                                                    <img src =
                                                        @if (! $user->profile_picture)
                                                            "https://i.pravatar.cc/60?u={{ $user->id }}"
                                                        @else
                                                            {{ asset('storage/' . $user->profile_picture) }}
                                                        @endif
                                                            class="rounded-xl w-full"
                                                    >
                                                </div>
                                            </div>
                                        </td>

                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex items-center">
                                                <div class="text-sm font-medium text-gray-900">

                                                        {{ $user->name }}

                                                </div>
                                            </div>
                                        </td>

                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex items-center">
                                                <div class="text-sm font-medium text-gray-900">

                                                        {{ $user->username }}

                                                </div>
                                            </div>
                                        </td>

                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex items-center">
                                                <div class="text-sm font-medium text-gray-900">

                                                        {{ $user->email }}

                                                </div>
                                            </div>
                                        </td>

                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex items-center">
                                                <div class="text-sm font-medium text-gray-900">
                                                        @if (count($user->posts) == 0)
                                                            This user hasn't  created any posts
                                                        @elseif (count($user->posts) == 1)
                                                            Created {{ $user->posts->count() }} post
                                                        @else
                                                            Created {{ $user->posts->count() }} posts
                                                        @endif
                                                </div>
                                            </div>
                                        </td>

                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex items-center">
                                                <div class="text-sm font-medium text-gray-900">

                                                    @if($user->admin == true)
                                                        <h3 class="text-gray-600 font-lg text-semibold leading-6">
                                                            <span class="bg-green-500 py-1 px-2 rounded text-white text-sm"> Admin</span>
                                                        </h3>
                                                    @else
                                                        <h3 class="text-gray-600 font-lg text-semibold leading-6">
                                                            <span class="bg-blue-500 py-1 px-2 rounded text-white text-sm"> User</span>
                                                        </h3>
                                                    @endif

                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="mt-5">
                        {{ $users->links() }}
                    </div>
                </div>
            </div>
        </div>
    </x-setting>
</x-layout>
