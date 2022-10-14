<img src =
    @if (! $post->author->profile_picture)
        "https://i.pravatar.cc/60?u={{ $post->author->id }}"
    @else
        {{ asset('storage/' . $post->author->profile_picture) }}
    @endif
        alt="Blog Post illustration"
        class="rounded-xl"
        width="60"
        height="60"
>
