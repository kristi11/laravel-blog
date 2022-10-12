<x-layout>
    <x-setting heading="Manage categories">
        <x-form.error name="category"/>
        <form method="POST" action="/admin/categories" class="grid gap-4 grid-cols-3 mb-2">
            @csrf

            <x-form.input name="name" type="text"/>
            <x-form.input name="slug" type="text"/>

            <x-form.button>Add category</x-form.button>

        </form>
        <div class="flex flex-col">
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                       <table class="min-w-full divide-y divide-gray-200">
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach ($categories as $category)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex items-center">
                                                <div class="text-sm font-medium text-gray-900">
                                                    <p>
                                                        {{ $category->name }}
                                                    </p>
                                                </div>
                                            </div>
                                        </td>

                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex items-center">
                                                <div class="text-sm font-medium text-gray-900">
                                                    <p>
                                                        @if (count($category->posts) == 0)
                                                        no posts for this category
                                                        @elseif (count($category->posts) == 1)
                                                        {{ $category->posts->count() }} post with this category
                                                        @else
                                                        {{ $category->posts->count() }} posts with this category
                                                        @endif
                                                    </p>
                                                </div>
                                            </div>
                                        </td>

                                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                            <a href="/admin/categories/{{ $category->id }}/edit" class="text-blue-500 hover:text-blue-600">Edit</a>
                                        </td>

                                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                            <form method="POST" action="/admin/categories/{{ $category->id }}">
                                                @csrf
                                                @method('DELETE')

                                                <button type="submit" class=""><i class="fa-solid fa-trash-can" title="delete"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    <div class="mt-5">
                        {{ $categories->links() }}
                    </div>
                </div>
            </div>
        </div>
    </x-setting>
</x-layout>



