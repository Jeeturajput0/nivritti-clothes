<nav
    id="navbar"
    class="site-navbar fixed left-0 top-0 z-50 w-full transition-all duration-500"
>
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div
            id="nav-container"
            class="mt-3 flex h-[72px] items-center justify-between rounded-full border border-brass/30 bg-ivory/95 px-5 shadow-[0_12px_36px_-24px_rgba(7,26,46,.35)] backdrop-blur transition-all duration-500 lg:px-7"
        >
            {{-- Logo --}}
            <a href="/" class="flex items-center">
                <img
                    src="{{ asset('images/logo/logo.png') }}"
                    alt="Nivritti"
                    class="h-11 w-auto object-contain sm:h-[52px]"
                >
            </a>

            {{-- Desktop Menu --}}
            <div class="hidden items-center gap-7 md:flex lg:gap-9">
                <a
                    href="/"
                    class="nav-link group relative text-[11px] font-semibold uppercase tracking-[.16em] {{ request()->routeIs('home') ? 'text-brass-deep' : 'text-ink' }} transition duration-300 hover:text-brass-deep"
                >
                    Home
                    <span class="absolute -bottom-2 left-0 h-[1.5px] {{ request()->routeIs('home') ? 'w-full' : 'w-0 group-hover:w-full' }} bg-brass transition-all duration-300"></span>
                </a>

                <a
                    href="/about"
                    class="nav-link group relative text-[11px] font-semibold uppercase tracking-[.16em] {{ request()->routeIs('about') ? 'text-brass-deep' : 'text-ink' }} transition duration-300 hover:text-brass-deep"
                >
                    About
                    <span class="absolute -bottom-2 left-0 h-[1.5px] {{ request()->routeIs('about') ? 'w-full' : 'w-0 group-hover:w-full' }} bg-brass transition-all duration-300"></span>
                </a>

                <a
                    href="/catalog"
                    class="nav-link group relative text-[11px] font-semibold uppercase tracking-[.16em] {{ request()->routeIs('catalog') ? 'text-brass-deep' : 'text-ink' }} transition duration-300 hover:text-brass-deep"
                >
                    Collections
                    <span class="absolute -bottom-2 left-0 h-[1.5px] {{ request()->routeIs('catalog') ? 'w-full' : 'w-0 group-hover:w-full' }} bg-brass transition-all duration-300"></span>
                </a>

                <a
                    href="/gallery"
                    class="nav-link group relative text-[11px] font-semibold uppercase tracking-[.16em] {{ request()->routeIs('gallery') ? 'text-brass-deep' : 'text-ink' }} transition duration-300 hover:text-brass-deep"
                >
                    Gallery
                    <span class="absolute -bottom-2 left-0 h-[1.5px] {{ request()->routeIs('gallery') ? 'w-full' : 'w-0 group-hover:w-full' }} bg-brass transition-all duration-300"></span>
                </a>

                <a
                    href="/contact"
                    class="nav-link group relative text-[11px] font-semibold uppercase tracking-[.16em] {{ request()->routeIs('contact') ? 'text-brass-deep' : 'text-ink' }} transition duration-300 hover:text-brass-deep"
                >
                    Contact
                    <span class="absolute -bottom-2 left-0 h-[1.5px] {{ request()->routeIs('contact') ? 'w-full' : 'w-0 group-hover:w-full' }} bg-brass transition-all duration-300"></span>
                </a>
            </div>

            {{-- Right Actions --}}
            <div class="flex items-center gap-2">
                {{-- Search --}}
                <button
                    class="hidden h-10 w-10 items-center justify-center rounded-full text-ink transition duration-300 hover:bg-ink/5 hover:text-brass-deep sm:flex"
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

                {{-- Mobile Menu Button --}}
                <button
                    id="menu-btn"
                    class="flex h-10 w-10 items-center justify-center rounded-full text-ink transition hover:bg-ink/5 hover:text-brass-deep md:hidden"
                    aria-label="Open menu"
                    aria-controls="mobile-menu"
                    aria-expanded="false"
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
            class="mt-2 hidden overflow-hidden border border-brass/30 bg-ivory p-4 shadow-xl md:hidden"
        >
            <div class="flex flex-col gap-1">
                <a
                    href="/"
                    class="px-4 py-3 text-sm text-ink transition hover:bg-ink/5 hover:text-brass-deep"
                >
                    Home
                </a>

                <a
                    href="/about"
                    class="px-4 py-3 text-sm text-ink transition hover:bg-ink/5 hover:text-brass-deep"
                >
                    About
                </a>

                <a
                    href="/catalog"
                    class="px-4 py-3 text-sm text-ink transition hover:bg-ink/5 hover:text-brass-deep"
                >
                    Collections
                </a>

                <a
                    href="/gallery"
                    class="px-4 py-3 text-sm text-ink transition hover:bg-ink/5 hover:text-brass-deep"
                >
                    Gallery
                </a>

                <a
                    href="/contact"
                    class="px-4 py-3 text-sm text-ink transition hover:bg-ink/5 hover:text-brass-deep"
                >
                    Contact
                </a>
            </div>
        </div>
    </div>
</nav>
