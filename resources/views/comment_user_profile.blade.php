<img src =
    @if (! $comment->author->profile_picture)
        "https://i.pravatar.cc/60?u={{ $comment->author->id }}"
    @else
        {{ asset('storage/' . $comment->author->profile_picture) }}
    @endif
        alt="Blog comment user"
        class="rounded-xl"
        width="60"
        height="60"
>
