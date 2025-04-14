<x-post-layout>
    <div class="max-w-4xl mx-auto mt-10">
        <h1 class="mb-4 text-3xl font-bold">{{ $post->title }}</h1>
        <div class="prose max-w-none">{!! $post->content !!}</div>
    </div>
</x-post-layout>
