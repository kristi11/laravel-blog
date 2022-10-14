<x-layout>
    <x-setting :heading="'Edit your profile: ' . $user->name">
         <form method="POST" action="/users/{{ $user->id }}" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <x-form.input name="name" :value="old('name',$user->name)"/>
            <x-form.input name="username" :value="old('username',$user->username)"/>
                            <div class="flex mt-6">
                    <div class="flex-1">
                        <x-form.input name="profile_picture" type="file" :value="old('profile_picture',$user->profile_picture)"/>
                    </div>
                        <img src =
                        @if (! $user->profile_picture)
                            "https://i.pravatar.cc/60?u={{ $user->id }}"
                        @else
                            {{ asset('storage/' . $user->profile_picture) }}
                        @endif
                            alt="Picture used to describe the user" class="rounded-xl ml-6" width="100"
                        >
                </div>
            <x-form.input name="password" type="password"/>
            <x-form.button>Update</x-form.button>
        </form>
    </x-setting>
</x-layout>
