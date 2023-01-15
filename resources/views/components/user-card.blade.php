@props(['user'])

<x-card>
    <div class="flex justify-between">
        {{-- <img class="hidden w-48 mr-6 rounded-lg xl:block"
            src={{ $listing->image ? asset('storage/' . $listing->image) : asset('./images/no-image.png') }}
            alt="" /> --}}

        <x-user-info :user="$user"> </x-user-info>
        @auth
        @if (\Auth::user()->isAdmin())
        <div class="flex flex-col gap-y-1.5">
            <a href="/users/{{ $user->id }}/edit">
                <i class="fa-solid fa-pencil"></i> Edit
            </a>
            <form method="POST" action="/users/{{ $user->id }}">
                @csrf
                @method('DELETE')
                <button class="text-red-500"><i class="fa-solid fa-trash"></i>
                    Delete</button>
            </form>
        </div>
        @endif
        @endauth
        {{-- <img class="hidden w-48 ml-6 rounded-lg lg:block"
        src={{ $listing->image ? asset('storage/' . $listing->image) : asset('./images/no-image.png') }}
        alt="" /> --}}
    </div>
</x-card>