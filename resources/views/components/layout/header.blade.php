<header class="navbar bg-base-100 shadow-sm sticky top-0 z-50">
    <div class="navbar-start">
        <div class="dropdown">
            <div tabindex="0" role="button" class="btn btn-ghost lg:hidden">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h8m-8 6h16" />
                </svg>
            </div>
            <ul tabindex="0" class="menu menu-sm dropdown-content bg-base-100 rounded-box z-50 mt-3 w-52 p-2 shadow">
                <li><a href="/">Home</a></li>
                <li><a href="/story/about">About</a></li>
                <li>
                    <a>Services</a>
                    <ul class="p-2">
                        <li><a href="/story/services/web-design">Web Design</a></li>
                        <li><a href="/story/services/branding">Branding</a></li>
                    </ul>
                </li>
                <li><a href="/story/blog">Blog</a></li>
                <li><a href="/story/contact">Contact</a></li>
            </ul>
        </div>
        <a href="/" class="btn btn-ghost text-xl font-bold">
            <span class="text-primary">Storyblok</span> and Laravel
        </a>
    </div>

    <div class="navbar-center hidden lg:flex">
        <ul class="menu menu-horizontal px-1">
            <li><a href="/">Home</a></li>
            <li><a href="/story/about">About</a></li>
            <li>
                <details>
                    <summary>Services</summary>
                    <ul class="p-2 bg-base-100 rounded-box w-48 z-50 shadow">
                        <li><a href="/story/services/web-design">Web Design</a></li>
                        <li><a href="/story/services/branding">Branding</a></li>
                    </ul>
                </details>
            </li>
            <li><a href="/story/blog">Blog</a></li>
            <li><a href="/story/contact">Contact</a></li>
        </ul>
    </div>

    <div class="navbar-end">
        <a href="/story/contact" class="btn btn-primary">Get in Touch</a>
    </div>
</header>
