<section class="py-12 bg-muted/30 md:py-24">
    <div class="container">
        <div class="mb-12 text-center">
            <h2 class="text-3xl font-bold tracking-tighter sm:text-4xl md:text-5xl">
                منصة إعادة تدوير الملابس
            </h2>
            <p class="mx-auto mt-4 max-w-[700px] text-muted-foreground md:text-xl">
                نسعى لمنح ملابسك حياة جديدة، وتقليل التلوث، ودعم المجتمعات المحتاجة.
            </p>
        </div>
        <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
            @foreach([
                [
                    'title' => 'جمع الملابس بسهولة',
                    'description' => 'وفرنا لك وسائل سهلة لتسليم الملابس التي لم تعد تستخدمها.',
                    'icon' => 'map-pin',
                ],
                [
                    'title' => 'فرز وتوزيع عادل',
                    'description' => 'نقوم بفرز الملابس وتوزيعها على الفئات المحتاجة وفقًا لحالتها.',
                    'icon' => 'cloud-rain',
                ],
                [
                    'title' => 'إعادة التدوير الإبداعي',
                    'description' => 'نحوّل بعض الملابس إلى منتجات جديدة عبر عمليات إبداعية صديقة للبيئة.',
                    'icon' => 'cloud',
                ],
                [
                    'title' => 'دعم المجتمعات',
                    'description' => 'نُسهم في دعم العائلات المحتاجة عبر توفير احتياجاتهم من الملابس.',
                    'icon' => 'wind',
                ],
                [
                    'title' => 'حملات توعوية',
                    'description' => 'نُطلق حملات لزيادة الوعي بأهمية إعادة التدوير والاستدامة.',
                    'icon' => 'sun',
                ],
                [
                    'title' => 'تتبع مساهمتك',
                    'description' => 'يمكنك تتبع تأثير تبرعاتك ومعرفة كيف ساعدت الآخرين.',
                    'icon' => 'droplets',
                ],
            ] as $feature)
                <div class="overflow-hidden border rounded-lg shadow-sm bg-card text-card-foreground">
                    <div class="p-6">
                        <div class="mb-4 text-primary">
                            {{-- SVG icons remain unchanged --}}
                            @if($feature['icon'] === 'map-pin')
                                <!-- icon SVG -->
                            @elseif($feature['icon'] === 'cloud-rain')
                                <!-- icon SVG -->
                            @elseif($feature['icon'] === 'cloud')
                                <!-- icon SVG -->
                            @elseif($feature['icon'] === 'wind')
                                <!-- icon SVG -->
                            @elseif($feature['icon'] === 'sun')
                                <!-- icon SVG -->
                            @elseif($feature['icon'] === 'droplets')
                                <!-- icon SVG -->
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
