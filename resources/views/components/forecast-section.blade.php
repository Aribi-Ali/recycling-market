<section class="py-12 md:py-16">
    <div class="container">
        <div class="max-w-4xl mx-auto">
            <h2 class="mb-6 text-2xl font-bold">7-Day Forecast</h2>

            <div x-data="{ activeTab: 'daily' }">
                <div class="grid w-full grid-cols-2 mb-6">
                    <button
                        @click="activeTab = 'daily'"
                        :class="activeTab === 'daily' ? 'bg-background text-foreground shadow-sm' : 'bg-muted text-muted-foreground hover:text-foreground'"
                        class="inline-flex items-center justify-center whitespace-nowrap rounded-l-md px-3 py-1.5 text-sm font-medium ring-offset-background transition-all focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50"
                    >
                        Daily
                    </button>
                    <button
                        @click="activeTab = 'hourly'"
                        :class="activeTab === 'hourly' ? 'bg-background text-foreground shadow-sm' : 'bg-muted text-muted-foreground hover:text-foreground'"
                        class="inline-flex items-center justify-center whitespace-nowrap rounded-r-md px-3 py-1.5 text-sm font-medium ring-offset-background transition-all focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50"
                    >
                        Hourly
                    </button>
                </div>

                <div x-show="activeTab === 'daily'" class="grid gap-4">
                    @for($i = 0; $i < 7; $i++)
                        <div class="border rounded-lg shadow-sm bg-card text-card-foreground">
                            <div class="p-4">
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center gap-4">
                                        <div class="w-24 font-medium">
                                            {{ date('D, M j', strtotime("+$i days")) }}
                                        </div>
                                        <div class="flex items-center gap-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-6 h-6 text-yellow-500">
                                                <circle cx="12" cy="12" r="4"></circle>
                                                <path d="M12 2v2"></path>
                                                <path d="M12 20v2"></path>
                                                <path d="m4.93 4.93 1.41 1.41"></path>
                                                <path d="m17.66 17.66 1.41 1.41"></path>
                                                <path d="M2 12h2"></path>
                                                <path d="M20 12h2"></path>
                                                <path d="m6.34 17.66-1.41 1.41"></path>
                                                <path d="m19.07 4.93-1.41 1.41"></path>
                                            </svg>
                                            <span>Sunny</span>
                                        </div>
                                    </div>
                                    <div class="flex items-center gap-2">
                                        <span class="font-bold">{{ 72 - $i * 2 }}°</span>
                                        <span class="text-muted-foreground">{{ 55 - $i }}°</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endfor
                </div>

                <div x-show="activeTab === 'hourly'" class="grid gap-4" style="display: none;">
                    @for($i = 0; $i < 24; $i++)
                        <div class="border rounded-lg shadow-sm bg-card text-card-foreground">
                            <div class="p-4">
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center gap-4">
                                        <div class="w-24 font-medium">
                                            {{ date('g A', strtotime("+$i hours")) }}
                                        </div>
                                        <div class="flex items-center gap-2">
                                            @if($i > 6 && $i < 18)
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-6 h-6 text-yellow-500">
                                                    <circle cx="12" cy="12" r="4"></circle>
                                                    <path d="M12 2v2"></path>
                                                    <path d="M12 20v2"></path>
                                                    <path d="m4.93 4.93 1.41 1.41"></path>
                                                    <path d="m17.66 17.66 1.41 1.41"></path>
                                                    <path d="M2 12h2"></path>
                                                    <path d="M20 12h2"></path>
                                                    <path d="m6.34 17.66-1.41 1.41"></path>
                                                    <path d="m19.07 4.93-1.41 1.41"></path>
                                                </svg>
                                                <span>Sunny</span>
                                            @else
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-6 h-6 text-gray-500">
                                                    <path d="M17.5 19H9a7 7 0 1 1 6.71-9h1.79a4.5 4.5 0 1 1 0 9Z"></path>
                                                </svg>
                                                <span>Clear</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="font-bold">
                                        {{ round(72 - sin($i / 24 * pi()) * 10) }}°
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endfor
                </div>
            </div>
        </div>
    </div>
</section>
