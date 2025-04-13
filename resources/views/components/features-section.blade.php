<section class="py-12 bg-muted/30 md:py-24">
    <div class="container">
        <div class="mb-12 text-center">
            <h2 class="text-3xl font-bold tracking-tighter sm:text-4xl md:text-5xl">
                Weather Intelligence Platform
            </h2>
            <p class="mx-auto mt-4 max-w-[700px] text-muted-foreground md:text-xl">
                Powerful tools and APIs to help you make weather-informed decisions.
            </p>
        </div>
        <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
            @foreach([
                [
                    'title' => 'Hyperlocal Forecasts',
                    'description' => 'Get minute-by-minute forecasts for any location with unmatched accuracy.',
                    'icon' => 'map-pin',
                ],
                [
                    'title' => 'Real-time Alerts',
                    'description' => 'Receive notifications about severe weather events before they happen.',
                    'icon' => 'cloud-rain',
                ],
                [
                    'title' => 'Historical Data',
                    'description' => 'Access years of weather data to identify patterns and trends.',
                    'icon' => 'cloud',
                ],
                [
                    'title' => 'Weather API',
                    'description' => 'Integrate weather data into your applications with our robust API.',
                    'icon' => 'wind',
                ],
                [
                    'title' => 'Custom Dashboards',
                    'description' => 'Build personalized dashboards to monitor the metrics that matter to you.',
                    'icon' => 'sun',
                ],
                [
                    'title' => 'Mobile Apps',
                    'description' => 'Stay informed on the go with our mobile applications.',
                    'icon' => 'droplets',
                ],
            ] as $feature)
                <div class="overflow-hidden border rounded-lg shadow-sm bg-card text-card-foreground">
                    <div class="p-6">
                        <div class="mb-4 text-primary">
                            @if($feature['icon'] === 'map-pin')
                                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-10 h-10">
                                    <path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z"></path>
                                    <circle cx="12" cy="10" r="3"></circle>
                                </svg>
                            @elseif($feature['icon'] === 'cloud-rain')
                                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-10 h-10">
                                    <path d="M4 14.899A7 7 0 1 1 15.71 8h1.79a4.5 4.5 0 0 1 2.5 8.242"></path>
                                    <path d="M16 14v6"></path>
                                    <path d="M8 14v6"></path>
                                    <path d="M12 16v6"></path>
                                </svg>
                            @elseif($feature['icon'] === 'cloud')
                                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-10 h-10">
                                    <path d="M17.5 19H9a7 7 0 1 1 6.71-9h1.79a4.5 4.5 0 1 1 0 9Z"></path>
                                </svg>
                            @elseif($feature['icon'] === 'wind')
                                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-10 h-10">
                                    <path d="M17.7 7.7a2.5 2.5 0 1 1 1.8 4.3H2"></path>
                                    <path d="M9.6 4.6A2 2 0 1 1 11 8H2"></path>
                                    <path d="M12.6 19.4A2 2 0 1 0 14 16H2"></path>
                                </svg>
                            @elseif($feature['icon'] === 'sun')
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
                            @elseif($feature['icon'] === 'droplets')
                                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-10 h-10">
                                    <path d="M7 16.3c2.2 0 4-1.83 4-4.05 0-1.16-.57-2.26-1.71-3.19S7.29 6.75 7 5.3c-.29 1.45-1.14 2.84-2.29 3.76S3 11.1 3 12.25c0 2.22 1.8 4.05 4 4.05z"></path>
                                    <path d="M12.56 6.6A10.97 10.97 0 0 0 14 3.02c.5 2.5 2 4.9 4 6.5s3 3.5 3 5.5a6.98 6.98 0 0 1-11.91 4.97"></path>
                                </svg>
                            @endif
                        </div>
                        <h3 class="text-xl font-bold">{{ $feature['title'] }}</h3>
                        <p class="mt-2 text-muted-foreground">{{ $feature['description'] }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
