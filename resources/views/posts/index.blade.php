<x-post-layout>
    <div class="max-w-6xl mx-auto mt-10">
        <div class="flex justify-between mb-6">
            <h1 class="text-3xl font-bold">All Posts</h1>
            <a href="{{ route('posts.create') }}" class="px-4 py-2 text-white bg-blue-600 rounded hover:bg-blue-700">New
                Post</a>
        </div>

        @if (session('success'))
            <div class="p-4 mb-4 text-green-800 bg-green-100 rounded">{{ session('success') }}</div>
        @endif

        <div class="grid gap-4">
            @foreach ($posts as $post)
                <div class="p-4 border rounded shadow hover:bg-gray-50 ">
                    @if ($post->featured_image)
                        <img src="{{ asset('storage/' . $post->featured_image) }}" alt=""
                            class="object-cover w-64 h-64 max-w-md mb-2 rounded shadow">
                    @endif
                    <h2 class="text-xl font-semibold">{{ $post->title }}</h2>
                    <p class="text-gray-600">{{ Illuminate\Support\Str::limit(strip_tags($post->content), 150) }}</p>
                    <div class="flex mt-2 space-x-2">
                        <a href="{{ route('posts.show', $post) }}" class="text-blue-600">View</a>
                        <a href="{{ route('posts.edit', $post) }}" class="text-yellow-600">Edit</a>
                        <form method="POST" action="{{ route('posts.destroy', $post) }}"
                            onsubmit="return confirm('Delete this post?')">
                            @csrf @method('DELETE')
                            <button class="text-red-600">Delete</button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-post-layout>
