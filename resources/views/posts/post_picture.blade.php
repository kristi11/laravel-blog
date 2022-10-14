<img src =
    @if (! $post->thumbnail)
        "https://dummyimage.com/600x400/ededed/ffffff.jpg&text=Empty+placeholder"
    @else
        {{ asset('storage/' . $post->thumbnail) }}
    @endif
        alt="Blog Post illustration"
        class="rounded-xl w-full"
>
