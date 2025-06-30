<div class="flex space-x-4 border-b mb-6">
    <a href="{{ route('about.main') }}" class="px-4 py-2 border-b-2 {{ request()->routeIs('about.main') ? 'border-blue-600 text-blue-600' : 'border-transparent text-gray-600 hover:text-blue-600' }}">
        Main
    </a>
    <a href="{{ route('about.vision-mission') }}" class="px-4 py-2 border-b-2 {{ request()->routeIs('about.vision-mission') ? 'border-blue-600 text-blue-600' : 'border-transparent text-gray-600 hover:text-blue-600' }}">
        Vision & Mission
    </a>
    <a href="{{ route('about.values') }}" class="px-4 py-2 border-b-2 {{ request()->routeIs('about.values') ? 'border-blue-600 text-blue-600' : 'border-transparent text-gray-600 hover:text-blue-600' }}">
        Values
    </a>
    <a href="{{ route('about.gallery') }}" class="px-4 py-2 border-b-2 {{ request()->routeIs('about.gallery') ? 'border-blue-600 text-blue-600' : 'border-transparent text-gray-600 hover:text-blue-600' }}">
        Gallery
    </a>
</div>
