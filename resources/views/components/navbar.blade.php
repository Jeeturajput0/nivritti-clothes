<nav
    id="navbar"
    class="site-navbar fixed left-0 top-0 z-50 w-full transition-all duration-500"
>
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div
            id="nav-container"
            class="mt-0 flex h-[76px] items-center justify-between border-b border-brass/40 px-5 shadow-none transition-all duration-500 lg:px-7"
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
                    class="nav-link group relative text-[11px] font-semibold uppercase tracking-[.16em] text-ivory transition duration-300 hover:text-brass"
                >
                    Home
                    <span class="absolute -bottom-2 left-0 h-[1.5px] w-0 bg-brass transition-all duration-300 group-hover:w-full"></span>
                </a>

                <a
                    href="/about"
                    class="nav-link group relative text-[11px] font-semibold uppercase tracking-[.16em] text-ivory transition duration-300 hover:text-brass"
                >
                    About
                    <span class="absolute -bottom-2 left-0 h-[1.5px] w-0 bg-brass transition-all duration-300 group-hover:w-full"></span>
                </a>

                <a
                    href="/gallery"
                    class="nav-link group relative text-[11px] font-semibold uppercase tracking-[.16em] text-ivory transition duration-300 hover:text-brass"
                >
                    Gallery
                    <span class="absolute -bottom-2 left-0 h-[1.5px] w-0 bg-brass transition-all duration-300 group-hover:w-full"></span>
                </a>

                <a
                    href="/catalog"
                    class="nav-link group relative text-[11px] font-semibold uppercase tracking-[.16em] text-ivory transition duration-300 hover:text-brass"
                >
                    Collection
                    <span class="absolute -bottom-2 left-0 h-[1.5px] w-0 bg-brass transition-all duration-300 group-hover:w-full"></span>
                </a>

                <a
                    href="/contact"
                    class="nav-link group relative text-[11px] font-semibold uppercase tracking-[.16em] text-ivory transition duration-300 hover:text-brass"
                >
                    Contact
                    <span class="absolute -bottom-2 left-0 h-[1.5px] w-0 bg-brass transition-all duration-300 group-hover:w-full"></span>
                </a>
            </div>

            {{-- Right Actions --}}
            <div class="flex items-center gap-2">
                {{-- Search --}}
                <button
                    class="hidden h-10 w-10 items-center justify-center rounded-full text-ivory transition duration-300 hover:bg-white/10 hover:text-brass sm:flex"
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
                    class="flex h-10 w-10 items-center justify-center rounded-full text-ivory transition hover:bg-white/10 hover:text-brass md:hidden"
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
            class="mt-2 hidden overflow-hidden border border-brass/30 bg-wine p-4 shadow-xl md:hidden"
        >
            <div class="flex flex-col gap-1">
                <a
                    href="/"
                    class="px-4 py-3 text-sm text-ivory transition hover:bg-white/10 hover:text-brass"
                >
                    Home
                </a>

                <a
                    href="/about"
                    class="px-4 py-3 text-sm text-ivory transition hover:bg-white/10 hover:text-brass"
                >
                    About
                </a>

                <a
                    href="/gallery"
                    class="px-4 py-3 text-sm text-ivory transition hover:bg-white/10 hover:text-brass"
                >
                    Gallery
                </a>

                <a
                    href="/catalog"
                    class="px-4 py-3 text-sm text-ivory transition hover:bg-white/10 hover:text-brass"
                >
                    Collection
                </a>

                <a
                    href="/contact"
                    class="px-4 py-3 text-sm text-ivory transition hover:bg-white/10 hover:text-brass"
                >
                    Contact
                </a>
            </div>
        </div>
    </div>
</nav>
