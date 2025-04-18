<header id="header">
    {{-- <!-- Navbar --> --}}
    <nav class="navbar navbar-expand">
        <div class="container header">
            {{-- <!-- Navbar Brand--> --}}
            <div class="magnetic">
                <a class="navbar-brand" href="/">
                    Branislav
                </a>
            </div>
            <div class="ms-auto"></div>

            {{-- <!-- Navbar Nav --> --}}
            <ul class="navbar-nav items d-none d-md-block">
                <li class="nav-item">
                    <a href="/" class="nav-link active">Home</a>
                </li>
                {{-- <li class="nav-item">
                    <a href="/blogs" class="nav-link">Blogs</a>
                </li> --}}
                
                <li class="nav-item">
                    
                    <a href="{{ request()->is('contact') ? '/#projects' : '#projects' }}" class="nav-link">F&Q</a>
                </li>
                <li class="nav-item">
                    
                    <a href="{{ request()->is('contact') ? '/#skills' : '#skills' }}" class="nav-link">Skills</a>
                </li>
                <li class="nav-item">
                    
                    <a href="{{ request()->is('contact') ? '/#about' : '#about' }}" class="nav-link">About</a>
                </li>
                <li class="nav-item">
                    <a href="{{ request()->is('contact') ? '/#faq' : '#faq' }}" class="nav-link">F&Q</a>
                </li>
                
                <li class="nav-item">
                    <a href="{{ request()->is('contact') ? '/contact' : '/contact' }}" class="nav-link">Contact</a>
                </li>

                @auth
                    <li class="nav-item">
                        <a href="{{ route('dashboard') }}" class="nav-link">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('logout') }}" class="nav-link">Logout</a>
                    </li>
                @endauth
            </ul>

            {{-- <!-- Navbar Toggler --> --}}
            <div class="navbar-toggler scrolled" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight">
                <div class="navbar-header">
                    <div class="content">
                        <div class="toggler-icon"></div>
                        <span class="title">Menu</span>
                    </div>
                </div>
            </div>
            @if(session()->has('message'))
				<div class="fixed top-0 left-1/2 transform -translate-x-1/2 bg-laravel text-white px-48 py-3 z-100">
				<p>
					{{session('message')}}
				</p>
				</div>
			@endif
        </div>
    </nav>

</header>