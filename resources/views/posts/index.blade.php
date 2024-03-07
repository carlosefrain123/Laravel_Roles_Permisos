<x-app-layout>
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        {{-- Hola papu, como estas --}}
        <div class="grid grid-cols-3 gap-6">
            @foreach ($posts as $post)
            <article>
                {{-- {{$post->image->url}} --}}
                <img src="{{Storage::url($post->image->url)}}" alt="">
            </article>
            @endforeach
        </div>
    </div>
</x-app-layout>
