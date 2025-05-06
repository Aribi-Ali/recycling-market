<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Create New Product') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <!-- Error Messages -->
                    @if($errors->any())
                    <div class="p-4 mb-6 border-l-4 border-red-500 bg-red-50">
                        <div class="flex">
                            <div class="flex-shrink-0">
                                <svg class="w-5 h-5 text-red-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                                </svg>
                            </div>
                            <div class="ml-3">
                                <h3 class="text-sm font-medium text-red-800">Please fix the following errors:</h3>
                                <div class="mt-2 text-sm text-red-700">
                                    <ul class="pl-5 space-y-1 list-disc">
                                        @foreach($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif

                    <form action="{{ route('seller.products.store') }}"
                          method="POST"
                          enctype="multipart/form-data"
                          x-data="{ isFree: {{ old('is_free', false) ? 'true' : 'false' }} }">
                        @csrf

                        <div class="grid grid-cols-1 gap-6 lg:grid-cols-2">
                            <!-- Left Column -->
                            <div class="space-y-6">
                                <!-- Title -->
                                <div>
                                    <label for="title" class="block mb-1 text-sm font-medium text-gray-700">Product Title *</label>
                                    <input type="text"
                                           name="title"
                                           id="title"
                                           value="{{ old('title', '') }}"
                                           class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm @error('title') border-red-300 text-red-900 placeholder-red-300 focus:outline-none focus:ring-red-500 focus:border-red-500 @enderror"
                                           required>
                                    @error('title')
                                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- Description -->
                                <div>
                                    <label for="description" class="block mb-1 text-sm font-medium text-gray-700">Description *</label>
                                    <textarea name="description"
                                              id="description"
                                              rows="5"
                                              class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm @error('description') border-red-300 text-red-900 placeholder-red-300 focus:outline-none focus:ring-red-500 focus:border-red-500 @enderror"
                                              required>{{ old('description', '') }}</textarea>
                                    @error('description')
                                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- Price Options -->
                                <div class="space-y-4">
                                    <!-- Is Free -->
                                    <div class="flex items-center">
                                        <input type="checkbox"
                                               name="is_free"
                                               id="is_free"
                                               value="1"
                                               x-model="isFree"
                                               class="w-4 h-4 text-indigo-600 border-gray-300 rounded focus:ring-indigo-500">
                                        <label for="is_free" class="block ml-2 text-sm text-gray-700">This product is free</label>
                                    </div>

                                    <!-- Price -->
                                    <div x-show="!isFree">
                                        <label for="price" class="block mb-1 text-sm font-medium text-gray-700">Price (DZD)</label>
                                        <div class="relative rounded-md shadow-sm">
                                            <input type="number"
                                                   name="price"
                                                   id="price"
                                                   value="{{ old('price', 0) }}"
                                                   min="0"
                                                   step="0.01"
                                                   class="block w-full rounded-md border-gray-300 pr-12 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm @error('price') border-red-300 text-red-900 placeholder-red-300 focus:outline-none focus:ring-red-500 focus:border-red-500 @enderror">
                                            <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                                                <span class="text-gray-500 sm:text-sm">DZD</span>
                                            </div>
                                        </div>
                                        @error('price')
                                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Condition -->
                                <div>
                                    <label for="condition" class="block mb-1 text-sm font-medium text-gray-700">Condition *</label>
                                    <select name="condition"
                                            id="condition"
                                            class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm @error('condition') border-red-300 text-red-900 placeholder-red-300 focus:outline-none focus:ring-red-500 focus:border-red-500 @enderror"
                                            required>
                                        <option value="">Select condition</option>
                                        <option value="new" {{ old('condition') == 'new' ? 'selected' : '' }}>New</option>
                                        <option value="used" {{ old('condition') == 'used' ? 'selected' : '' }}>Used</option>
                                    </select>
                                    @error('condition')
                                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <!-- Right Column -->
                            <div class="space-y-6">
                                <!-- Category -->
                                <div>
                                    <label for="category_id" class="block mb-1 text-sm font-medium text-gray-700">Category *</label>
                                    <select name="category_id"
                                            id="category_id"
                                            class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm @error('category_id') border-red-300 text-red-900 placeholder-red-300 focus:outline-none focus:ring-red-500 focus:border-red-500 @enderror"
                                            required>
                                        <option value="">Select category</option>
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                                {{ $category->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('category_id')
                                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- Published At -->
                                <div>
                                    <label for="published_at" class="block mb-1 text-sm font-medium text-gray-700">Publication Date</label>
                                    <input type="datetime-local"
                                           name="published_at"
                                           id="published_at"
                                           value="{{ old('published_at', '') }}"
                                           class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm @error('published_at') border-red-300 text-red-900 placeholder-red-300 focus:outline-none focus:ring-red-500 focus:border-red-500 @enderror">
                                    @error('published_at')
                                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- Product Images -->
                                <div x-data="imageUploader()">
                                    <label class="block mb-1 text-sm font-medium text-gray-700">Product Images</label>
                                    <div class="flex justify-center px-6 pt-5 pb-6 mt-1 border-2 border-gray-300 border-dashed rounded-md">
                                        <div class="space-y-1 text-center">
                                            <svg class="w-12 h-12 mx-auto text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                                                <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>
                                            <div class="flex text-sm text-gray-600">
                                                <label for="images" class="relative font-medium text-indigo-600 bg-white rounded-md cursor-pointer hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                                                    <span>Upload images</span>
                                                    <input id="images" name="images[]" type="file" class="sr-only" multiple accept="image/*" @change="handleImageUpload">
                                                </label>
                                                <p class="pl-1">or drag and drop</p>
                                            </div>
                                            <p class="text-xs text-gray-500">PNG, JPG, GIF up to 3MB</p>
                                        </div>
                                    </div>

                                    <!-- Image Preview -->
                                    <div class="image-preview" x-show="imagePreviewUrls.length > 0">
                                        <template x-for="(url, index) in imagePreviewUrls" :key="index">
                                            <div class="image-preview-item">
                                                <img :src="url" alt="Preview">
                                                <div class="remove-btn" @click="removeImage(index)">×</div>
                                            </div>
                                        </template>
                                    </div>

                                    @error('images')
                                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                    @error('images.*')
                                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <!-- Submit -->
                        <div class="flex justify-end mt-8">
                            <a href="{{ route('products.index') }}" class="inline-flex items-center px-4 py-2 mr-3 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                                Cancel
                            </a>
                            <button type="submit" class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-indigo-600 border border-transparent rounded-md shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                                Create Product
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Push FilePond Scripts to the end of the page -->

    <!-- Alpine JS -->
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <!-- For image preview -->
    <style>
        .image-preview {
            width: 100%;
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 10px;
            margin-top: 10px;
        }
        .image-preview-item {
            position: relative;
            padding-bottom: 100%;
            overflow: hidden;
            border-radius: 4px;
            border: 1px solid #e5e7eb;
        }
        .image-preview-item img {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        .image-preview-item .remove-btn {
            position: absolute;
            top: 5px;
            right: 5px;
            background-color: rgba(239, 68, 68, 0.9);
            color: white;
            border-radius: 9999px;
            width: 20px;
            height: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            font-size: 14px;
            line-height: 1;
        }
    </style>

    <script>
        function imageUploader() {
            return {
                imagePreviewUrls: [],
                selectedFiles: [],

                handleImageUpload(event) {
                    const files = event.target.files;

                    // Validate files (size, type, count)
                    for (let i = 0; i < files.length; i++) {
                        const file = files[i];

                        // Check file type
                        if (!file.type.match('image.*')) {
                            alert('Only image files are allowed');
                            continue;
                        }

                        // Check file size (3MB max)
                        if (file.size > 3 * 1024 * 1024) {
                            alert('File size must be less than 3MB');
                            continue;
                        }

                        // Max 5 files
                        if (this.imagePreviewUrls.length >= 5) {
                            alert('You can upload a maximum of 5 images');
                            break;
                        }

                        // Create preview
                        const reader = new FileReader();
                        reader.onload = (e) => {
                            this.imagePreviewUrls.push(e.target.result);
                            this.selectedFiles.push(file);
                        };
                        reader.readAsDataURL(file);
                    }

                    // Reset file input to allow selecting the same file again
                    event.target.value = '';
                },

                removeImage(index) {
                    this.imagePreviewUrls.splice(index, 1);
                    this.selectedFiles.splice(index, 1);

                    // Create a new DataTransfer object
                    const dataTransfer = new DataTransfer();

                    // Add remaining files to the DataTransfer object
                    this.selectedFiles.forEach(file => {
                        dataTransfer.items.add(file);
                    });

                    // Update the file input with the new FileList
                    document.querySelector('input[name="images[]"]').files = dataTransfer.files;
                }
            }
        }

        document.addEventListener('DOMContentLoaded', function() {
            // Handle price input visibility based on "free" checkbox
            const isFreeCheckbox = document.getElementById('is_free');
            const priceInput = document.getElementById('price');

            if (isFreeCheckbox && priceInput) {
                isFreeCheckbox.addEventListener('change', function() {
                    if (this.checked) {
                        priceInput.value = '0';
                    }
                });
            }

            // Enable drag and drop for the image upload area
            const uploadArea = document.querySelector('.border-dashed');

            ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
                uploadArea.addEventListener(eventName, preventDefaults, false);
            });

            function preventDefaults(e) {
                e.preventDefault();
                e.stopPropagation();
            }

            ['dragenter', 'dragover'].forEach(eventName => {
                uploadArea.addEventListener(eventName, highlight, false);
            });

            ['dragleave', 'drop'].forEach(eventName => {
                uploadArea.addEventListener(eventName, unhighlight, false);
            });

            function highlight() {
                uploadArea.classList.add('border-indigo-300', 'bg-indigo-50');
            }

            function unhighlight() {
                uploadArea.classList.remove('border-indigo-300', 'bg-indigo-50');
            }

            uploadArea.addEventListener('drop', handleDrop, false);

            function handleDrop(e) {
                const dt = e.dataTransfer;
                const files = dt.files;
                const fileInput = document.querySelector('input[name="images[]"]');

                // Trigger change event with the dropped files
                if (fileInput.__x) {
                    const event = {
                        target: {
                            files: files,
                            value: ''
                        }
                    };
                    fileInput.__x.$data.handleImageUpload(event);
                }
            }
        });
    </script>
    
</x-app-layout>
