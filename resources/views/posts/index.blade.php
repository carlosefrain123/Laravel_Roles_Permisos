<x-app-layout>
    {{-- py: padding botton y padding top --}}
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 py-8">
        {{-- Hola papu, como estas
            General: grid-cols-1
            Pantalla Mediana: 2 columnas md:grid-cols-2
            Pantalla Grande: 3 columnas lg:grid-cols-3
            md:col-span-2

            --}}
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($posts as $post)
            <article class="w-full h-80 bg-cover bg-center @if($loop->first) md:col-span-2 @endif" style="background-image: url(@if($post->image){{Storage::url($post->image->url)}}@else https://static.vecteezy.com/system/resources/previews/004/141/669/non_2x/no-photo-or-blank-image-icon-loading-images-or-missing-image-mark-image-not-available-or-image-coming-soon-sign-simple-nature-silhouette-in-frame-isolated-illustration-vector.jpg @endif)">
                <div class="w-full h-full px-8 flex flex-col justify-center">
                    <div>
                        @foreach ($post->tags as $tag)
                            <a href="{{route('posts.tag',$tag)}}" class="inline-block px-3 h-6 bg-{{$tag->color}}-600 text-white rounded-full">
                                {{ $tag->name}}
                            </a>
                        @endforeach
                    </div>
                    <h1 class="text-4xl text-white leading-8 font-bold mt-2">
                        <a href="{{route('posts.show',$post)}}">
                            {{$post->name}}
                        </a>
                    </h1>
                </div>
            </article>
            @endforeach
        </div>
        <div class="mt-4">
            {{$posts->links()}}
        </div>
    </div>
</x-app-layout>
