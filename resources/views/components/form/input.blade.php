@props(['name'])
<x-form.field>
    <x-form.label name="{{ $name }}"/>
    <input class="border border-gray-200 p-2 w-full rounded"
    {{-- if passing on $attributes then type is not nessecary because type will always be text --}}
        name="{{ $name }}"
        id="{{ $name }}"
        {{ $attributes(['value' => old($name)]) }}
    >

    <x-form.error name="{{ $name }}"/>
</x-form.field>
