<x-app-layout>


    @include('components.hero-section')

    {{-- @include('components.current-weather') --}}
    {{-- @include('components.services-section') --}}
    @include('components.team-slider', ['posts' => $posts])
    {{-- @include('components.forecast-section') --}}
    @include('components.features-section')
    @include('components.cta-section')
    @include('components.footer-section')

</x-app-layout>
