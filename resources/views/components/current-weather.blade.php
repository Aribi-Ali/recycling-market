<section class="py-12 bg-muted/30">
    <div class="container">
        <div class="max-w-4xl mx-auto">
            <div class="overflow-hidden border-none rounded-lg shadow-lg bg-background">
                <div class="p-0">
                    <div class="p-6 bg-primary text-primary-foreground">
                        <div class="flex flex-wrap items-center justify-between gap-4">
                            <div>
                                <h2 class="text-2xl font-bold">San Francisco, CA</h2>
                                <p class="text-primary-foreground/80">{{ date('l, F j, Y') }}</p>
                            </div>
                            <div class="flex items-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-10 h-10">
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
                                <div>
                                    <p class="text-3xl font-bold">72°F</p>
                                    <p class="text-primary-foreground/80">Feels like 70°F</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="grid grid-cols-2 divide-x divide-y sm:grid-cols-4 sm:divide-y-0">
                        @foreach([
                            ['icon' => 'wind', 'label' => 'Wind', 'value' => '8 mph'],
                            ['icon' => 'droplets', 'label' => 'Humidity', 'value' => '45%'],
                            ['icon' => 'cloud-rain', 'label' => 'Rain', 'value' => '0%'],
                            ['icon' => 'cloud', 'label' => 'Cloud Cover', 'value' => '10%'],
                        ] as $item)
                            <div class="flex flex-col items-center justify-center p-4 text-center">
                                <div class="mb-2 text-muted-foreground">
                                    @if($item['icon'] === 'wind')
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-5 h-5">
                                            <path d="M17.7 7.7a2.5 2.5 0 1 1 1.8 4.3H2"></path>
                                            <path d="M9.6 4.6A2 2 0 1 1 11 8H2"></path>
                                            <path d="M12.6 19.4A2 2 0 1 0 14 16H2"></path>
                                        </svg>
                                    @elseif($item['icon'] === 'droplets')
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-5 h-5">
                                            <path d="M7 16.3c2.2 0 4-1.83 4-4.05 0-1.16-.57-2.26-1.71-3.19S7.29 6.75 7 5.3c-.29 1.45-1.14 2.84-2.29 3.76S3 11.1 3 12.25c0 2.22 1.8 4.05 4 4.05z"></path>
                                            <path d="M12.56 6.6A10.97 10.97 0 0 0 14 3.02c.5 2.5 2 4.9 4 6.5s3 3.5 3 5.5a6.98 6.98 0 0 1-11.91 4.97"></path>
                                        </svg>
                                    @elseif($item['icon'] === 'cloud-rain')
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-5 h-5">
                                            <path d="M4 14.899A7 7 0 1 1 15.71 8h1.79a4.5 4.5 0 0 1 2.5 8.242"></path>
                                            <path d="M16 14v6"></path>
                                            <path d="M8 14v6"></path>
                                            <path d="M12 16v6"></path>
                                        </svg>
                                    @elseif($item['icon'] === 'cloud')
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-5 h-5">
                                            <path d="M17.5 19H9a7 7 0 1 1 6.71-9h1.79a4.5 4.5 0 1 1 0 9Z"></path>
                                        </svg>
                                    @endif
                                </div>
                                <p class="text-sm font-medium">{{ $item['label'] }}</p>
                                <p class="text-lg font-bold">{{ $item['value'] }}</p>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
