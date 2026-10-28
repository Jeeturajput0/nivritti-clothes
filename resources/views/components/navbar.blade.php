<nav
    id="navbar"
    class="fixed left-0 top-0 z-50 w-full transition-all duration-500"
>
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div
            id="nav-container"
            class="mt-4 flex h-16 items-center justify-between rounded-full border border-white/30 bg-white/70 px-5 shadow-lg shadow-black/5 backdrop-blur-xl transition-all duration-500 lg:px-7"
        >
            {{-- Logo --}}
            <a href="/" class="flex items-center">
                <img
                    src="{{ asset('images/logo/logo.png') }}"
                    alt="Nivritti"
                    class="h-10 w-auto object-contain"
                >
            </a>

            {{-- Desktop Menu --}}
            <div class="hidden items-center gap-8 md:flex">
                <a
                    href="/"
                    class="nav-link group relative text-sm font-medium text-slate-700 transition duration-300 hover:text-[#102840]"
                >
                    Home
                    <span class="absolute -bottom-2 left-0 h-[1.5px] w-0 bg-[#102840] transition-all duration-300 group-hover:w-full"></span>
                </a>

                <a
                    href="/#about-intro"
                    class="nav-link group relative text-sm font-medium text-slate-700 transition duration-300 hover:text-[#102840]"
                >
                    About
                    <span class="absolute -bottom-2 left-0 h-[1.5px] w-0 bg-[#102840] transition-all duration-300 group-hover:w-full"></span>
                </a>

                <a
                    href="/gallery"
                    class="nav-link group relative text-sm font-medium text-slate-700 transition duration-300 hover:text-[#102840]"
                >
                    Gallery
                    <span class="absolute -bottom-2 left-0 h-[1.5px] w-0 bg-[#102840] transition-all duration-300 group-hover:w-full"></span>
                </a>

                <a
                    href="/catalog"
                    class="nav-link group relative text-sm font-medium text-slate-700 transition duration-300 hover:text-[#102840]"
                >
                    Collection
                    <span class="absolute -bottom-2 left-0 h-[1.5px] w-0 bg-[#102840] transition-all duration-300 group-hover:w-full"></span>
                </a>

                <a
                    href="/contact"
                    class="nav-link group relative text-sm font-medium text-slate-700 transition duration-300 hover:text-[#102840]"
                >
                    Contact
                    <span class="absolute -bottom-2 left-0 h-[1.5px] w-0 bg-[#102840] transition-all duration-300 group-hover:w-full"></span>
                </a>
            </div>

            {{-- Right Actions --}}
            <div class="flex items-center gap-2">
                {{-- Search --}}
                <button
                    class="hidden h-10 w-10 items-center justify-center rounded-full text-slate-700 transition duration-300 hover:bg-stone-900 hover:text-white sm:flex"
                    aria-label="Search"
                >
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        width="18"
                        height="18"
                        viewBox="0 0 24 24"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="1.8"
                    >
                        <circle cx="11" cy="11" r="7"></circle>
                        <path d="m20 20-3.5-3.5"></path>
                    </svg>
                </button>

                {{-- Cart --}}
                <a
                    href="/cart"
                    class="flex h-10 w-10 items-center justify-center rounded-full text-slate-700 transition duration-300 hover:bg-stone-900 hover:text-white"
                    aria-label="Cart"
                >
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        width="18"
                        height="18"
                        viewBox="0 0 24 24"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="1.8"
                    >
                        <path d="M6 8h12l1 12H5L6 8Z"></path>
                        <path d="M9 8a3 3 0 0 1 6 0"></path>
                    </svg>
                </a>

                {{-- Login --}}
                <a
                    href="/login"
                    class="hidden rounded-full bg-stone-900 px-5 py-2.5 text-sm font-medium text-white transition duration-300 hover:bg-[#102840] sm:block"
                >
                    Login
                </a>

                {{-- Mobile Menu Button --}}
                <button
                    id="menu-btn"
                    class="flex h-10 w-10 items-center justify-center rounded-full text-stone-800 transition hover:bg-stone-900 hover:text-white md:hidden"
                    aria-label="Open menu"
                >
                    <svg
                        id="menu-icon"
                        xmlns="http://www.w3.org/2000/svg"
                        width="20"
                        height="20"
                        viewBox="0 0 24 24"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="1.8"
                    >
                        <path d="M4 6h16"></path>
                        <path d="M4 12h16"></path>
                        <path d="M4 18h16"></path>
                    </svg>
                </button>
            </div>
        </div>

        {{-- Mobile Menu --}}
        <div
            id="mobile-menu"
            class="mt-2 hidden overflow-hidden rounded-3xl border border-white/30 bg-white/90 p-4 shadow-xl backdrop-blur-xl md:hidden"
        >
            <div class="flex flex-col gap-1">
                <a
                    href="/"
                    class="rounded-2xl px-4 py-3 text-sm text-slate-700 transition hover:bg-slate-100 hover:text-[#102840]"
                >
                    Home
                </a>

                <a
                    href="/about"
                    class="rounded-2xl px-4 py-3 text-sm text-slate-700 transition hover:bg-slate-100 hover:text-[#102840]"
                >
                    About
                </a>

                <a
                    href="/gallery"
                    class="rounded-2xl px-4 py-3 text-sm text-slate-700 transition hover:bg-slate-100 hover:text-[#102840]"
                >
                    Gallery
                </a>

                <a
                    href="/catalog"
                    class="rounded-2xl px-4 py-3 text-sm text-slate-700 transition hover:bg-slate-100 hover:text-[#102840]"
                >
                    Catloge
                </a>

                <a
                    href="/contact"
                    class="rounded-2xl px-4 py-3 text-sm text-slate-700 transition hover:bg-slate-100 hover:text-[#102840]"
                >
                    Contact
                </a>

                <a
                    href="/login"
                    class="mt-2 rounded-2xl bg-stone-900 px-4 py-3 text-center text-sm font-medium text-white transition hover:bg-[#102840]"
                >
                    Login
                </a>
            </div>
        </div>
    </div>
</nav>

{{-- Navbar Animation --}}
<script>
    const navbar = document.getElementById('navbar');
    const navContainer = document.getElementById('nav-container');

    if (navbar && navContainer) {
        window.addEventListener('scroll', () => {
            const isScrolled = window.scrollY > 40;

            navContainer.classList.toggle('mt-4', !isScrolled);
            navContainer.classList.toggle('bg-white/70', !isScrolled);
            navContainer.classList.toggle('shadow-black/5', !isScrolled);

            navContainer.classList.toggle('mt-2', isScrolled);
            navContainer.classList.toggle('bg-white/90', isScrolled);
            navContainer.classList.toggle('shadow-xl', isScrolled);
        });
    }

    const menuBtn = document.getElementById('menu-btn');
    const mobileMenu = document.getElementById('mobile-menu');

    if (menuBtn && mobileMenu) {
        menuBtn.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
        });
    }
</script>
