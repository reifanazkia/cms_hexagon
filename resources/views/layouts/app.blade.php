<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CMS Hexagon</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon-new.ico') }}">

    {{-- Load Tailwind CSS & JS via Vite --}}
    @vite(['resources/css/app.css', 'resources/js/app.ts'])

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body class="flex font-sans">

    {{-- Sidebar --}}
    <div class="w-[250px] h-screen bg-[#1669EE] text-white fixed left-0 top-0 flex flex-col">
        {{-- Logo --}}
        <div class="text-center py-4 shrink-0">
            <img src="{{ asset('img/logo.png') }}" alt="Logo" class="mx-auto mb-2 w-16">
            <div class="font-bold text-lg">HEXAGON INC.</div>
        </div>

        {{-- Scrollable Menu --}}
        <div class="overflow-y-auto flex-1 scrollbar-hide pr-1">
            <div class="text-xs uppercase font-bold text-white/70 px-5 pt-4 pb-1 border-b border-white/30">Overview</div>
            <a href="/dashboard" class="block px-5 py-2 hover:bg-[#0f59c3]"><i class="fas fa-home mr-2"></i> Dashboard</a>

            <div class="text-xs uppercase font-bold text-white/70 px-5 pt-4 pb-1 border-b border-white/30">Settings</div>
            <a href="/profile-setting" class="block px-5 py-2 hover:bg-[#0f59c3]"><i class="fas fa-user-cog mr-2"></i> Profile Setting</a>

            <div class="text-xs uppercase font-bold text-white/70 px-5 pt-4 pb-1 border-b border-white/30">Company Info</div>
            <button class="block px-5 py-2 hover:bg-[#0f59c3] w-full text-left dropdown-btn">
                <i class="fas fa-circle-info mr-2"></i> About
                <i class="fas fa-chevron-down float-right mt-1"></i>
            </button>
            <div class="dropdown-container hidden bg-[#0f59c3] pl-8">
                <a href="/about/main" class="block py-2 text-sm hover:bg-[#0c4cb2]">Main About</a>
                <a href="/about/teams" class="block py-2 text-sm hover:bg-[#0c4cb2]">Our Teams</a>
                <a href="/about/clients" class="block py-2 text-sm hover:bg-[#0c4cb2]">Our Clients</a>
            </div>

            <a href="/portofolio" class="block px-5 py-2 hover:bg-[#0f59c3]"><i class="fas fa-briefcase mr-2"></i> Portfolio</a>
            <a href="/services" class="block px-5 py-2 hover:bg-[#0f59c3]"><i class="fas fa-tools mr-2"></i> Services</a>
            <a href="{{ route('pricing.index') }}" class="block px-5 py-2 hover:bg-[#0f59c3]"><i class="fas fa-tags mr-2"></i> Pricing</a>
            <a href="{{ route('detail-pricings.index') }}" class="block px-5 py-2 hover:bg-[#0f59c3]"><i class="fas fa-list-ul mr-2"></i> Detail Pricing</a>

            <div class="text-xs uppercase font-bold text-white/70 px-5 pt-4 pb-1 border-b border-white/30">Recruitment</div>
            <a href="/career" class="block px-5 py-2 hover:bg-[#0f59c3]"><i class="fas fa-chart-line mr-2"></i> Career</a>
            <a href="/jobs" class="block px-5 py-2 hover:bg-[#0f59c3]"><i class="fas fa-tasks mr-2"></i> Jobs</a>

            <div class="text-xs uppercase font-bold text-white/70 px-5 pt-4 pb-1 border-b border-white/30">Content</div>
            <a href="/news" class="block px-5 py-2 hover:bg-[#0f59c3]"><i class="fas fa-newspaper mr-2"></i> News</a>

            <div class="text-xs uppercase font-bold text-white/70 px-5 pt-4 pb-1 border-b border-white/30">Communication</div>
            <a href="/message" class="block px-5 py-2 hover:bg-[#0f59c3]"><i class="fas fa-comment-dots mr-2"></i> Message</a>
            <a href="/reviews" class="block px-5 py-2 hover:bg-[#0f59c3]"><i class="fas fa-star mr-2"></i> Reviews</a>
        </div>
    </div>

    {{-- Main Content --}}
    <div class="ml-[250px] flex-1 bg-[#f9f9f9] min-h-screen">
        {{-- Topbar --}}
        <div class="flex justify-end items-center bg-[#f8f9fa] border-b border-[#dee2e6] p-4">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="border border-blue-700 text-blue-700 px-4 py-1 rounded hover:bg-blue-700 hover:text-white text-sm">Logout</button>
            </form>
        </div>

        {{-- Page Content --}}
        <div class="p-6">
            @yield('content')
        </div>
    </div>

    {{-- Dropdown Script --}}
    <script>
        document.querySelectorAll('.dropdown-btn').forEach(function(btn) {
            btn.addEventListener('click', function () {
                let dropdown = this.nextElementSibling;
                dropdown.classList.toggle('hidden');
            });
        });
    </script>
    @yield('scripts')

</body>
</html>
