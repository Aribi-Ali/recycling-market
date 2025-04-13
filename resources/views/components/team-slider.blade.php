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
            <button
                @click="scrollLeft()"
                class="absolute left-0 z-10 p-2 -translate-y-1/2 rounded-full shadow-lg top-1/2 bg-background/80 backdrop-blur-sm"
            >
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="m15 18-6-6 6-6"/>
                </svg>
            </button>

            <button
                @click="scrollRight()"
                class="absolute right-0 z-10 p-2 -translate-y-1/2 rounded-full shadow-lg top-1/2 bg-background/80 backdrop-blur-sm"
            >
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="m9 18 6-6-6-6"/>
                </svg>
            </button>

            <div
                x-ref="slider"
                @mouseenter="pauseScroll()"
                @mouseleave="resumeScroll()"
                class="flex gap-6 pb-8 overflow-x-auto snap-x snap-mandatory scrollbar-hide"
                style="scroll-behavior: smooth;"
            >
                @foreach([
                    [
                        'name' => 'Dr. Sarah Johnson',
                        'role' => 'Chief Meteorologist',
                        'image' => 'images/team/sarah.jpg',
                    ],
                    [
                        'name' => 'Michael Chen',
                        'role' => 'Lead Data Scientist',
                        'image' => 'images/team/michael.jpg',
                    ],
                    [
                        'name' => 'Emily Rodriguez',
                        'role' => 'VP of Product',
                        'image' => 'images/team/emily.jpg',
                    ],
                    [
                        'name' => 'David Kim',
                        'role' => 'Senior Software Engineer',
                        'image' => 'images/team/david.jpg',
                    ],
                    [
                        'name' => 'Aisha Patel',
                        'role' => 'UX/UI Designer',
                        'image' => 'images/team/aisha.jpg',
                    ],
                    [
                        'name' => 'James Wilson',
                        'role' => 'Climate Analyst',
                        'image' => 'images/team/james.jpg',
                    ],
                    [
                        'name' => 'Olivia Martinez',
                        'role' => 'Customer Success Manager',
                        'image' => 'images/team/olivia.jpg',
                    ],
                    [
                        'name' => 'Robert Taylor',
                        'role' => 'API Architect',
                        'image' => 'images/team/robert.jpg',
                    ],
                ] as $member)
                    <div class="min-w-[280px] snap-center group">
                        <div class="overflow-hidden transition-all duration-300 shadow-md bg-background rounded-xl group-hover:shadow-xl group-hover:-translate-y-2">
                            <div class="relative overflow-hidden h-72">
                                <img
                                    src="{{ asset($member['image']) }}"
                                    alt="{{ $member['name'] }}"
                                    class="object-cover w-full h-full transition-all duration-500 group-hover:scale-110"
                                >
                                <div class="absolute inset-0 flex items-end p-6 transition-opacity duration-300 opacity-0 bg-gradient-to-t from-black/70 to-transparent group-hover:opacity-100">
                                    <div class="flex gap-3">
                                        <a href="#" class="flex items-center justify-center rounded-full bg-white/20 backdrop-blur-sm h-9 w-9">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-white">
                                                <path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z"></path>
                                                <rect x="2" y="9" width="4" height="12"></rect>
                                                <circle cx="4" cy="4" r="2"></circle>
                                            </svg>
                                        </a>
                                        <a href="#" class="flex items-center justify-center rounded-full bg-white/20 backdrop-blur-sm h-9 w-9">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-white">
                                                <path d="M22 4s-.7 2.1-2 3.4c1.6 10-9.4 17.3-18 11.6 2.2.1 4.4-.6 6-2C3 15.5.5 9.6 3 5c2.2 2.6 5.6 4.1 9 4-.9-4.2 4-6.6 7-3.8 1.1 0 3-1.2 3-1.2z"></path>
                                            </svg>
                                        </a>
                                        <a href="#" class="flex items-center justify-center rounded-full bg-white/20 backdrop-blur-sm h-9 w-9">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-white">
                                                <rect x="2" y="4" width="20" height="16" rx="2"></rect>
                                                <path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"></path>
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="p-6">
                                <h3 class="text-xl font-bold">{{ $member['name'] }}</h3>
                                <p class="text-primary">{{ $member['role'] }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="flex justify-center mt-8">
                <div class="flex gap-2">
                    @for($i = 0; $i < 8; $i++)
                        <div class="h-2 w-2 rounded-full {{ $i === 0 ? 'bg-primary' : 'bg-muted-foreground/30' }}"></div>
                    @endfor
                </div>
            </div>
        </div>
    </div>
</section>

@push('scripts')
<script>
    function teamSlider() {
        return {
            isPaused: false,
            animationId: null,

            init() {
                this.startAutoScroll();
            },

            startAutoScroll() {
                const slider = this.$refs.slider;
                let lastTimestamp = 0;

                const scroll = (timestamp) => {
                    if (!lastTimestamp) lastTimestamp = timestamp;
                    const elapsed = timestamp - lastTimestamp;
                    lastTimestamp = timestamp;

                    if (!this.isPaused) {
                        slider.scrollLeft += elapsed * 0.05;

                        // Reset scroll position when reaching the end
                        if (slider.scrollLeft >= slider.scrollWidth - slider.clientWidth) {
                            slider.scrollLeft = 0;
                        }
                    }

                    this.animationId = requestAnimationFrame(scroll);
                };

                this.animationId = requestAnimationFrame(scroll);
            },

            pauseScroll() {
                this.isPaused = true;
            },

            resumeScroll() {
                this.isPaused = false;
            },

            scrollLeft() {
                const slider = this.$refs.slider;
                slider.scrollBy({
                    left: -300,
                    behavior: 'smooth'
                });
            },

            scrollRight() {
                const slider = this.$refs.slider;
                slider.scrollBy({
                    left: 300,
                    behavior: 'smooth'
                });
            }
        };
    }
</script>
@endpush
