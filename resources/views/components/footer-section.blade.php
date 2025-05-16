<footer class="pt-16 pb-8 text-white bg-gray-900">
  <div class="container px-4 mx-auto">
    <div class="grid grid-cols-1 gap-8 mb-12 md:grid-cols-2 lg:grid-cols-4">
      <!-- Company Info -->
      <div>
        <h3 class="mb-4 text-xl font-bold">HealthHub</h3>
        <p class="mb-4 text-gray-400">
          Empowering you to take control of your health journey with personalized care and cutting-edge
          solutions.
        </p>
        <div class="flex space-x-4">
          <!-- Facebook -->
          <a href="#" class="text-gray-400 transition-colors hover:text-white">
            <!-- ...svg code -->
          </a>
          <!-- Twitter -->
          <a href="#" class="text-gray-400 transition-colors hover:text-white">
            <!-- ...svg code -->
          </a>
          <!-- Instagram -->
          <a href="#" class="text-gray-400 transition-colors hover:text-white">
            <!-- ...svg code -->
          </a>
          <!-- LinkedIn -->
          <a href="#" class="text-gray-400 transition-colors hover:text-white">
            <!-- ...svg code -->
          </a>
        </div>
      </div>

      <!-- Quick Links -->
      <div>
        <h3 class="mb-4 text-xl font-bold">Quick Links</h3>
        <ul class="space-y-2">
          <li><a href="#" class="text-gray-400 transition-colors hover:text-white">{{ __('landingpage.home') }}</a></li>
          <li><a href="#" class="text-gray-400 transition-colors hover:text-white">{{ __('landingpage.about') }} Us</a></li>
          <li><a href="#" class="text-gray-400 transition-colors hover:text-white">{{ __('landingpage.services') }}</a></li>
          <li><a href="#" class="text-gray-400 transition-colors hover:text-white">Testimonials</a></li>
          <li><a href="#" class="text-gray-400 transition-colors hover:text-white">{{ __('landingpage.contact') }}</a></li>
        </ul>
      </div>

      <!-- Services -->
      <div>
        <h3 class="mb-4 text-xl font-bold">Our {{ __('landingpage.services') }}</h3>
        <ul class="space-y-2">
          <li><a href="#" class="text-gray-400 transition-colors hover:text-white">Preventive Care</a></li>
          <li><a href="#" class="text-gray-400 transition-colors hover:text-white">{{ __('landingpage.telemedicine') }}</a></li>
          <li><a href="#" class="text-gray-400 transition-colors hover:text-white">Personalized Plans</a></li>
          <li><a href="#" class="text-gray-400 transition-colors hover:text-white">Mental Wellness</a></li>
          <li><a href="#" class="text-gray-400 transition-colors hover:text-white">Nutrition Guidance</a></li>
        </ul>
      </div>

      <!-- Contact Info -->
      <div>
        <h3 class="mb-4 text-xl font-bold">{{ __('landingpage.contact') }} Us</h3>
        <ul class="space-y-4">
          <li class="flex items-start">
            <!-- Address Icon -->
            <!-- ...svg code -->
            <span class="text-gray-400">123 Health Street, Wellness City, HC 12345</span>
          </li>
          <li class="flex items-center">
            <!-- Phone Icon -->
            <!-- ...svg code -->
            <span class="text-gray-400">(123) 456-7890</span>
          </li>
          <li class="flex items-center">
            <!-- Email Icon -->
            <!-- ...svg code -->
            <span class="text-gray-400">info@healthhub.com</span>
          </li>
        </ul>
      </div>
    </div>

    <!-- Newsletter -->
    <div class="pt-8 pb-4 border-t border-gray-800">
      <div class="max-w-xl mx-auto text-center">
        <h3 class="mb-4 text-xl font-bold">{{ __('landingpage.subscribe_newsletter') }}</h3>
        <p class="mb-4 text-gray-400">{{ __('landingpage.newsletter_text') }}</p>
        <div class="flex flex-col gap-2 sm:flex-row">
          <input type="email" placeholder="{{ __('landingpage.your_email') }}"
            class="flex-grow px-4 py-2 text-gray-900 rounded-lg focus:outline-none focus:ring-2 focus:ring-teal-500" />
          <button
            class="px-6 py-2 font-semibold text-white transition-colors bg-teal-600 rounded-lg hover:bg-teal-700">
            {{ __('landingpage.subscribe') }}
          </button>
        </div>
      </div>
    </div>
  </div>
</footer>
