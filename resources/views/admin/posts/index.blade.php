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
                                    Post pic
                                  </th>
                                  <th scope="col" class="text-sm font-bold font-medium text-gray-900 px-6 py-4 text-left">
                                    Post title
                                  </th>
                                  <th scope="col" class="text-sm font-bold font-medium text-gray-900 px-6 py-4 text-left">
                                    Edit post
                                  </th>
                                  <th scope="col" class="text-sm font-bold font-medium text-gray-900 px-6 py-4 text-left">
                                    Delete post
                                  </th>
                                </tr>
                              </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach ($posts as $post)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex items-center">
                                                <div class="flex-shrink-0 w-10 h-10">
                                                    <img class="w-10 h-10 w-full rounded-full" src =
                                                        @if (! $post->thumbnail)
                                                            "https://dummyimage.com/600x400/ededed/ffffff.jpg&text=Empty+placeholder"
                                                        @else
                                                            {{ asset('storage/' . $post->thumbnail) }}
                                                        @endif
                                                            alt="Blog Post illustration"
                                                            class="rounded-xl w-full"
                                                    >
                                                </div>
                                            </div>
                                        </td>

                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex items-center">
                                                <div class="text-sm font-medium text-gray-900">
                                                    <a href="/posts/{{ $post->slug }}">
                                                        {{ $post->title }}
                                                    </a>
                                                </div>
                                            </div>
                                        </td>

                                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                            <a href="/admin/posts/{{ $post->id }}/edit" class="text-blue-500 hover:text-blue-600">Edit</a>
                                        </td>

                                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                            <form method="POST" action="/admin/posts/{{ $post->id }}">
                                                @csrf
                                                @method('DELETE')

                                                <button type="submit" class=""><i class="fa-solid fa-trash-can" title="delete"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="mt-5">
                        {{ $posts->links() }}
                    </div>
                </div>
            </div>
        </div>
    </x-setting>
</x-layout>
