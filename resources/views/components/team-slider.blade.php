<section class="py-16 overflow-hidden md:py-24 bg-muted/30">
    <div class="container">
        <div class="mb-12 text-center">
            <h2 class="text-3xl font-bold tracking-tighter sm:text-4xl md:text-5xl">
                Meet Our Team
            </h2>
            <p class="mx-auto mt-4 max-w-[700px] text-muted-foreground md:text-xl">
                The experts behind our weather intelligence platform
            </p>
        </div>

        <div class="relative" x-data="teamSlider()">
            <button @click="scrollLeft()"
                class="absolute left-0 z-10 p-2 -translate-y-1/2 rounded-full shadow-lg top-1/2 bg-background/80 backdrop-blur-sm">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="m15 18-6-6 6-6" />
                </svg>
            </button>

            <button @click="scrollRight()"
                class="absolute right-0 z-10 p-2 -translate-y-1/2 rounded-full shadow-lg top-1/2 bg-background/80 backdrop-blur-sm">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="m9 18 6-6-6-6" />
                </svg>
            </button>

            <div x-ref="slider" @mouseenter="pauseScroll()" @mouseleave="resumeScroll()"
                class="flex gap-6 pb-8 overflow-x-auto snap-x snap-mandatory scrollbar-hide"
                style="scroll-behavior: smooth;">
                @foreach ($posts as $post)
                    <div class="min-w-[280px] max-w-[280px] snap-center group">
                        <div
                            class="overflow-hidden transition-all duration-300 shadow-md bg-background rounded-xl group-hover:shadow-xl group-hover:-translate-y-2">
                            <div class="relative aspect-[4/5] overflow-hidden">
                                <!-- Ensure the image has a fixed size and consistent aspect ratio -->
                                <img src="{{ asset('storage/' . $post->featured_image) }}" alt="{{ $post->title }}"
                                    class="object-cover w-full h-64 transition-all duration-500 group-hover:scale-110">
                                <div
                                    class="absolute inset-0 flex items-end p-6 transition-opacity duration-300 opacity-0 bg-gradient-to-t from-black/70 to-transparent group-hover:opacity-100">
                                    <div class="flex gap-3">
                                        <a href="#"
                                            class="flex items-center justify-center rounded-full bg-white/20 backdrop-blur-sm h-9 w-9">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                class="text-white">
                                                <path
                                                    d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z">
                                                </path>
                                                <rect x="2" y="9" width="4" height="12"></rect>
                                                <circle cx="4" cy="4" r="2"></circle>
                                            </svg>
                                        </a>
                                        <a href="#"
                                            class="flex items-center justify-center rounded-full bg-white/20 backdrop-blur-sm h-9 w-9">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                class="text-white">
                                                <path
                                                    d="M22 4s-.7 2.1-2 3.4c1.6 10-9.4 17.3-18 11.6 2.2.1 4.4-.6 6-2C3 15.5.5 9.6 3 5c2.2 2.6 5.6 4.1 9 4-.9-4.2 4-6.6 7-3.8 1.1 0 3-1.2 3-1.2z">
                                                </path>
                                            </svg>
                                        </a>
                                        <a href="#"
                                            class="flex items-center justify-center rounded-full bg-white/20 backdrop-blur-sm h-9 w-9">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                class="text-white">
                                                <rect x="2" y="4" width="20" height="16" rx="2"></rect>
                                                <path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"></path>
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="p-6">
                                <h3 class="text-xl font-bold">{{ $post->title }}</h3>
                                <p class="text-primary">
                                    {{ \Illuminate\Support\Str::limit(strip_tags($post->content), 100) }}
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="flex justify-center mt-8">
                <div class="flex gap-2">
                    @foreach ($posts as $post)
                        <div
                            class="h-2 w-2 rounded-full {{ $loop->index === 0 ? 'bg-primary' : 'bg-muted-foreground/30' }}">
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
