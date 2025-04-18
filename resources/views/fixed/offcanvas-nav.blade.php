<div class="offcanvas-wrapper">
    <!-- Navbar Toggler -->
    <div class="navbar-toggler" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight">
        <div class="navbar-header">
            <div class="content">
                <div class="toggler-icon"></div>
                <span class="title">Menu</span>
            </div>
        </div>
    </div>

    <!-- Offcanvas -->
    <div class="offcanvas offcanvas-end" id="offcanvasRight">
        <div class="fixed-nav-rounded-div">
            <div class="rounded-div-wrap">
                <div class="rounded-div"></div>
            </div>
        </div>

        <!-- Offcanvas Content -->
        <div class="offcanvas-content">
            <div class="offcanvas-navigation">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title mt-0">Navigation</h5>
                </div>

                <hr>

                <!-- Navigation Menu -->
                <div class="offcanvas-body">
                    <ul class="navbar-nav menu pt-md-4">
                        <li class="nav-item">
                            <a href="{{ request()->is('contact') ? '/' : '#main-wrapper' }}" class="nav-link {{ request()->is('/') ? 'active' : '' }}">Home</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ request()->is('contact') ? '/#projects' : '#projects' }}" class="nav-link">Works</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ request()->is('contact') ? '/#about' : '#about' }}" class="nav-link js-scroll-trigger">About</a>
                        </li> 
                        <li class="nav-item">
                            <a href="{{ request()->is('contact') ? '/contact' : '/contact' }}" class="nav-link">Contact</a>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Offcanvas Social -->
            <div class="offcanvas-social">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title mt-0">Socials</h5>
                </div>

                <hr>

                <x-socials />
            </div>
        </div>
    </div>
</div>