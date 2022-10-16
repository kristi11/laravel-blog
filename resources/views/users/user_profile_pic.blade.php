<img src =
    @if (! $user->profile_picture)
        "https://i.pravatar.cc/60?u={{ $user->id }}"
    @else
        {{ asset('storage/' . $user->profile_picture) }}
    @endif
        class="rounded-xl w-full"
>
