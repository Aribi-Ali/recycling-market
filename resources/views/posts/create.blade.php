<x-post-layout>

    <div class="max-w-4xl p-6 mx-auto mt-10 bg-white rounded-lg shadow-md">
        <h1 class="mb-6 text-2xl font-bold">Create New Post</h1>
        <div class="hidden mb-4">
            <label class="block mb-1 text-sm font-medium">Featured Image</label>
            <input type="file" name="featured_image" class="w-full p-2 border rounded">
        </div>
        <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-4">
                <label class="block mb-1 text-sm font-medium">Title</label>
                <input type="text" name="title" value="{{ old('title') }}" class="w-full p-2 border rounded">
            </div>

            <div class="mb-4">
    <label for="image" class="block mb-2 text-sm font-medium text-gray-700">Upload Image</label>

    <div class="flex items-center space-x-4">
        <!-- Image preview -->
        <img id="image-preview" src="{{ old('image') ? asset('storage/' . old('image')) : 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS5Sh209MMxKFXtyWOKLVXe-JjSc7_eFz-p6g&s' }}"
             alt="Preview"
             class="object-cover w-32 h-32 border border-gray-300 rounded">

        <!-- File input -->
        <input
            type="file"
            name="image"
            id="image"
            accept="image/*"
            class="block w-full text-sm text-gray-900 border border-gray-300 rounded cursor-pointer bg-gray-50 focus:outline-none"
            onchange="previewImage(event)"
        >
    </div>

    @error('image')
        <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
    @enderror
</div>

            <div class="mb-4">
                <label class="block mb-1 text-sm font-medium">Content</label>
                <textarea name="content" id="editor" class="w-full p-2 border rounded h-60">{{ old('content') }}</textarea>
            </div>

            <button type="submit" class="px-4 py-2 text-white bg-blue-600 rounded hover:bg-blue-700">
                Publish
            </button>
        </form>
    </div>

    <script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create(document.querySelector('#editor'), {
                ckfinder: {
                    uploadUrl: '{{ route('ckeditor.upload') . '?_token=' . csrf_token() }}'
                },
                image: {
                    // Use a simpler toolbar configuration with items that are definitely available
                    toolbar: [
                        'imageTextAlternative', '|', 'toggleImageCaption'
                    ],
                    // Remove the custom resize options for now
                    resizeUnit: '%',
                    resizeOptions: [{
                            name: 'imageResize:original',
                            value: null,
                            label: 'Original'
                        },
                        {
                            name: 'imageResize:50',
                            value: '50',
                            label: '50%'
                        }
                    ]
                }
            })
            .catch(error => {
                console.error(error);
            });




             function previewImage(event) {
        const reader = new FileReader();
        reader.onload = function(){
            const output = document.getElementById('image-preview');
            output.src = reader.result;
        };
        reader.readAsDataURL(event.target.files[0]);
    }
    </script>

</x-post-layout>
