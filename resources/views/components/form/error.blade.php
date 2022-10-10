@props(['name'])
@error($name)
    <p class="mt-2 text-xs text-red-500"> {{ $message }} </p>
@enderror
