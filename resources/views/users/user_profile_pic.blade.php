<img src =
    @if (! $user->profile_picture)
        "https://i.pravatar.cc/60?u={{ $user->id }}"
    @else
        {{ asset('storage/' . $user->profile_picture) }}
    @endif
        alt="Blog Post illustration"
        class="rounded-xl w-full"
>
