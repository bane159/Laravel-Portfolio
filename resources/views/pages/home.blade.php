@extends('layouts.main')



@section('content')
    
{{-- <!-- ***** Hero Area Start ***** --> --}}
@php
    if(Session()->has('message')){
        echo '<script>alert("'.Session()->get('message').'")</script>';
    }
@endphp
<section id="home" class="hero-section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                {{-- <!-- Hero Content --> --}}
                <div class="hero-content">
                    <span class="intro-text">Hello! I’m .</span> 
                    <h1>Branislav Radovanovic</h1>
                    <h2 class="title section-title mt-3 mt-md-4 mb-md-5">I'm specializing in <span>Full stack web development</span></h2>

                    {{-- <!-- Content --> --}}
                    <div class="content d-flex flex-column flex-md-row justify-content-md-between">
                        <div class="hero-button order-last order-md-first mt-4 mt-md-0 z-100">
                            <a class="btn magnetic-button z-100" href="/contact">Let's Talk! <i class="icon bi bi-arrow-right ms-1"></i><span></span></a>
                        </div>
                            <p class="sub-title order-first order-md-last">I'm Branislav Radovanovic, a versatile Full Stack Web Developer that persues his programming goals with huge passion and love. I'm currently studying ICT at college, and I'm excited to pursue a career in programming. Apart from programming, I have a rich sports background. I played volleyball for 14 years, and I was a part of the teams that were in top 8 and first place in Serbian league. This experience taught me the importance of teamwork, communication, and hard work, skills that I apply to my programming projects. 
                            </p>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="hero-bg">
        <img class="circle-1" src="{{ asset("assets/img/content/hero-bg-1.svg") }}" alt="hero svg image Branislav Radovanovic"> 
        <img class="circle-2" src="{{ asset("assets/img/content/hero-bg-2.svg") }}" alt="hero svg image Branislav Radovanovic">
    </div>
</section>

{{-- <!-- ***** Hero Area End ***** --> --}}





<!-- ***** Works Area Start ***** -->
<section class="works explore-area portfolio-filter pt-0" id ="projects">
    <div class="container-xxl">
        


            <div class="row">
                <div class="col-12">
                    <!-- Intro -->
                    <div class="intro d-flex justify-content-center align-items-center text-center">
                        <h3 class="title reveal-text">Freelance & Study Projects</h3>
                        {{-- <a class="btn btn-outline content-btn swap-icon" href="portfolio-dark.html">View All <i class="icon bi bi-arrow-right-short"></i></a> --}}
                    </div>
                </div>
            </div>
        {{-- <div class="row justify-content-center text-center">
            <div class="col-12">
                <div class="btn-group filter-menu" role="group" aria-label="Basic radio toggle button group">
                    <div class="input-item d-flex">
                        <div class="content">
                            <input type="radio" class="btn-check filter-btn" name="shuffle-filter" id="all" value="all" checked>
                            <label class="btn" for="all">All</label>
                        </div>
                        <span class="count">07</span>
                    </div>

                    <div class="input-item d-flex">
                        <div class="content">
                            <input type="radio" class="btn-check filter-btn" name="shuffle-filter" id="branding" value="branding">
                            <label class="btn" for="branding">Branding</label>
                        </div>
                        <span class="count">04</span>
                    </div>

                    <div class="input-item d-flex">
                        <div class="content">
                            <input type="radio" class="btn-check filter-btn" name="shuffle-filter" id="ui-ux" value="ui-ux">
                            <label class="btn" for="ui-ux">UI/UX</label>
                        </div>
                        <span class="count">03</span>
                    </div>

                    <div class="input-item d-flex">
                        <div class="content">
                            <input type="radio" class="btn-check filter-btn" name="shuffle-filter" id="app-design" value="app-design">
                            <label class="btn" for="app-design">App Design</label>
                        </div>
                        <span class="count">05</span>
                    </div>
                </div>
            </div>
        </div> --}}

        <div class = "row justify-content-lg-center filter-items items inner row-cols-1 row-cols-md-2 row-cols-lg-3">
 
            @foreach ($Projects as $project)
                
           
            <div class="col-12 col-lg-4  col-md-6  item-added filter-item" {{-- data-groups='["branding","app-design"]' --}}>
                <!-- Portfolio Item -->
                <div class="card portfolio-item layout-2 scale has-shadow">
                    <div class="image-holder">
                        <!-- Card Thumb -->
                        <a class="card-thumb" href="/projects/{{ $project -> id }}">
                            <img src="assets/img/content/400x400.jpg" alt="">
                        </a>
                    </div>
                    <!-- Card content -->
                    <div class="card-content p-2">
                        <div class="heading">
                            <h4 class="title mt-2 mt-md-3 mb-3">{{$project -> name}}</h4>
                            <div class="p-2 show-project">
                                <div class="card-terms">
                                    @foreach ($project -> tags as $tag )
                                    <a class="terms badge outlined">{{$tag -> name}}</a>
                                    @endforeach
                                    
                                </div>
                                <div class="project-link">
                                    <a href="{{ $project -> url }}">Show Project</a>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            @endforeach

           

        
    </div>

    <div class="container mt-5">
        <div class="row">
            <div class="col-12">
                
                <div class="wrapper">
                    {{ $Projects -> links() }}
                </div>
            </div>
        </div>
    </div>
    


    <div class="container mt-5">
        <div class="row">
            <div class="col-12">
                
                <div class="wrapper">
                    <p class="sub-title">In my free time i do freelance work in making powerfull web applications using Laravel PHP framework, php, javascript JQuery and more.. Dont hesitate to go to projects section and be assured of my work! Programming is my passion and every new project that i work on brings me joy.</p>
                    <a class="btn magnetic-button btn-outline" href="/projects">Projects <i class="icon bi bi-arrow-right ms-1"></i><span></span></a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ***** Works Area End ***** -->







<section class="services pt-0" id ="skills">
    <div class="container">


        <div class="row">
            <div class="col-12">
                <!-- Intro -->
                <div class="intro d-flex justify-content-center align-items-center text-center">
                    <h3 class="title ">Skills</h3>
                    {{-- <a class="btn btn-outline content-btn swap-icon" href="portfolio-dark.html">View All <i class="icon bi bi-arrow-right-short"></i></a> --}}
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-12">
                <!-- Content -->
                <div class="content">
                    <h4 class="title reveal-text mt-0">I`m currently looking for a full stack web developer position, backed by my studies at ICT collage i will assure you hired a proffesional!.</h4>
                </div>
            </div>
        </div>
                <div class="wrapper">
                    <p class="sub-title">In my free time i do freelance work in making powerfull web applications using Laravel PHP framework and JQuery. Dont hesitate to go to projects section and be assured of my work!</p>
                    <a class="btn magnetic-button btn-outline" href="/contact">Hire me!<i class="icon bi bi-arrow-right ms-1"></i><span></span></a>
                </div>
           
        

        {{-- marquee start --}}

    
        <div class="marquee">
            <ul class="list-unstyled">
                <li class="item">
                    <a href="#" class="marquee-item rounded">
                        <div class="marquee-content">
                            <img src="{{ asset("assets/img/content/php-logo.png") }}" alt="">
                        </div>
                    </a>
                </li>
                <li class="item">
                    <a href="#" class="marquee-item rounded">
                        <div class="marquee-content">
                            <img src="{{ asset("assets/img/content/javascript-logo.png") }}" alt="">
                        </div>
                    </a>
                </li>
                <li class="item">
                    <a href="#" class="marquee-item rounded">
                        <div class="marquee-content">
                            <img src="{{ asset("assets/img/content/c++++-logo.png") }}" alt="">
                        </div>
                    </a>
                </li>
                <li class="item">
                    <a href="#" class="marquee-item rounded">
                        <div class="marquee-content">
                            <img src="{{ asset("assets/img/content/sql-logo.png") }}" alt="">
                        </div>
                    </a>
                </li>
                <li class="item">
                    <a href="#" class="marquee-item rounded">
                        <div class="marquee-content">
                            <img src="{{ asset("assets/img/content/linux-logo.png") }}" alt="">
                        </div>
                    </a>
                </li>
                <li class="item">
                    <a href="#" class="marquee-item rounded">
                        <div class="marquee-content">
                            <img src="{{ asset("assets/img/content/sass-logo.png") }}" alt="">
                        </div>
                    </a>
                </li>
                <li class="item">
                    <a href="#" class="marquee-item rounded">
                        <div class="marquee-content">
                            <img src="{{ asset("assets/img/content/cisco-logo.png") }}" alt="">
                        </div>
                    </a>
                </li>
                <li class="item">
                    <a href="#" class="marquee-item rounded">
                        <div class="marquee-content">
                            <img src="{{ asset("assets/img/content/php-logo.png") }}" alt="">
                        </div>
                    </a>
                </li>
                <li class="item">
                    <a href="#" class="marquee-item rounded">
                        <div class="marquee-content">
                            <img src="assets/img/content/brand-7.png" alt="">
                        </div>
                    </a>
                </li>
                <li class="item">
                    <a href="#" class="marquee-item rounded">
                        <div class="marquee-content">
                            <img src="assets/img/content/brand-7.png" alt="">
                        </div>
                    </a>
                </li>
            </ul>
        </div>

        {{-- <!-- Marquee --> --}}
        {{-- <!-- ***** Services Area End ***** --> --}}

        {{-- showoff start --}}
        <div class = "row">
            <div class="row justify-content-between">   
                <div class="col-12 col-lg-8">
                    <div class="row items">
                        <!-- Item -->
                        <div class="col-12 col-md-6 item align-self-center my-5">
                            <div id="skills" class="content mt-5 mt-md-0">
                                <div class="progress">
                                    <span class="title">UI/UX HTML CSS Sass Bootstrap\Tailwind</span>
                                    <div class="progress-bar" data-progress="99">
                                        <span>99%</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 item align-self-center my-5">
                            <div id="skills" class="content mt-5 mt-md-0">
                                <div class="progress">
                                    <span class="title">JavaScript JQuery</span>
                                    <div class="progress-bar" data-progress="96">
                                        <span>96%</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 item align-self-center my-5">
                            <div id="skills" class="content mt-5 mt-md-0">
                                <div class="progress">
                                    <span class="title">PHP & Laravel</span>
                                    <div class="progress-bar" data-progress="97">
                                        <span>97%</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 item align-self-center my-5">
                            <div id="skills" class="content mt-5 mt-md-0">
                                <div class="progress">
                                    <span class="title">C#</span>
                                    <div class="progress-bar" data-progress="94">
                                        <span>94%</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 item align-self-center my-5">
                            <div id="skills" class="content mt-5 mt-md-0">
                                <div class="progress">
                                    <span class="title">SQL & MySql & MariaDB </span>
                                    <div class="progress-bar" data-progress="96">
                                        <span>96%</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 item align-self-center my-5">
                            <div id="skills" class="content mt-5 mt-md-0">
                                <div class="progress">
                                    <span class="title">Linux</span>
                                    <div class="progress-bar" data-progress="80">
                                        <span>94%</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 item align-self-center my-5">
                            <div id="skills" class="content mt-5 mt-md-0">
                                <div class="progress">
                                    <span class="title">Networking & Cisco</span>
                                    <div class="progress-bar" data-progress="80">
                                        <span>90%</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 item align-self-center my-5">
                            <div id="skills" class="content mt-5 mt-md-0">
                                <div class="progress">
                                    <span class="title">Problem Solving & Debugging</span>
                                    <div class="progress-bar" data-progress="99">
                                        <span>99%</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="row service-wrapper items mt-md-5">
            {{-- <!-- Service Item --> --}}
            <div class="col-12 col-md-6 col-lg-4 ">
                <div class="item d-flex align-items-start">
                    <div class="item-count">01</div>
                    <div class="content">
                        <h4 class="mt-0">PHP</h4>
                        <p>I develop robust web applications using PHP (Laravel), applying MVC architecture principles mastered during my ICT college studies. Through freelance and project work, I've gained experiance and confidence into delivering good and efftiant solutions.</p>
                    </div>
                </div>
            </div>

            {{-- <!-- Service Item --> --}}
            <div class="col-12 col-md-6 col-lg-4 ">
                <div class="item d-flex align-items-start">
                    <div class="item-count">02</div>
                    <div class="content">
                        <h4 class="mt-0">JavaScript</h4>
                        <p>I develop dynamic, modern web applications using JavaScript and JQuery, focusing on performance, scalability, and seamless user experiences. My expertise is vast over all projects that i used js and most importantly freelance work, allowing me to build everything from interactive frontends to full-stack solutions.</p>
                    </div>
                </div>
            </div>

            {{-- <!-- Service Item --> --}}
            <div class="col-12 col-md-6 col-lg-4 ">
                <div class="item d-flex align-items-start">
                    <div class="item-count">03</div>
                    <div class="content">
                        <h4 class="mt-0">C#</h4>
                        <p>I develop Windows applications using C# and Entity Framework, focusing on robust architecture and efficient data handling. My experience includes building business logic layers, optimizing database interactions, and creating intuitive desktop solutions. Moving forward, I’m expanding into ASP.NET for modern web development</p>
                    </div>
                </div>
            </div>

            {{-- <!-- Service Item --> --}}
            <div class="col-12 col-md-6 col-lg-4 ">
                <div class="item d-flex align-items-start">
                    <div class="item-count">04</div>
                    <div class="content">
                        <h4 class="mt-0">Databases</h4>
                        <p>"I architect and optimize SQL databases (MS SQL/SSMS), mastering advanced concept - skills honed through my ICT college studies and hands-on projects. Whether building complex stored procedures or ensuring bulletproof data integrity.</p>
                    </div>
                </div>
            </div>
            {{-- <!-- Service Item --> --}}
            <div class="col-12 col-md-6 col-lg-4">
                <div class="item d-flex align-items-start">
                    <div class="item-count">05</div>
                    <div class="content">
                        <h4 class="mt-0">Linux</h4>
                        <p>I configure and maintain Linux servers, applying foundational skills gained through my ICT college studies. From initial setup to basic system administration, I handle user management, package installation, and network configuration. While not an expert, I'm comfortable working in terminal.</p>
                    </div>
                </div>
            </div>

            {{-- <!-- Service Item --> --}}
            <div class="col-12 col-md-6 col-lg-4 ">
                <div class="item d-flex align-items-start">
                    <div class="item-count">06</div>
                    <div class="content">
                        <h4 class="mt-0">UI/UX</h4>
                        <p>I design functional, responsive interfaces using HTML, CSS (SCSS), Bootstrap, and Tailwind—skills strengthened through my ICT college training. While focused more on frontend implementation than pure design, I bridge aesthetics with usability, ensuring clean layouts that work across devices.</p>
                    </div>
                </div>
            </div>




            {{-- <!-- Service Item --> --}}
            {{-- <div class="col-12 col-md-6 col-lg-4 ">
                <div class="item d-flex align-items-start">
                    <div class="item-count">07</div>
                    <div class="content">
                        <h4 class="mt-0">Cisco</h4>
                        <p>"I configure and maintain Cisco infrastructure - routers, switches, end devices and more- using professional-grade equipment and simulators. My ICT college training provided a strong foundation in network principles, which I've expanded through hands-on experience with enterprise hardware.</p>
                    </div>
                </div>
            </div> --}}
            
        </div>
    </div>
</section>

<section class="border-top border-light-subtle" id="about">
    <div class="container-md">
        

        <div class="row">
            <div class="col-12">
                <!-- Intro -->
                <div class="intro d-flex justify-content-center align-items-center text-center">
                    <h3 class="title reveal-text">About me!</h3>
                    {{-- <a class="btn btn-outline content-btn swap-icon" href="portfolio-dark.html">View All <i class="icon bi bi-arrow-right-short"></i></a> --}}
                </div>
            </div>
        </div>

        <div class="wrapper">
            <p class="sub-title text-center">I`m constantly exploring new technologies and programming languages, and I enjoy creating websites and games that are both functional and visually appealing. My skills include HTML, CSS, JavaScript, React, Node.js, and more. I always strive to improve my skills and keep up with the latest industry trends. In the future, I hope to work on exciting projects that challenge me and allow me to grow as a developer. I believe that with my strong work ethic, dedication, and technical skills, I can make a valuable contribution to any team or project. </p> 
            <p class="sub-title text-center">I transform ideas into practical applications, delivering innovative solutions that elevate brands, improve effitiancy and captivate audiences around the world. With a passion for technology and a commitment to excellence, I am dedicated to helping businesses thrive in the digital age.</p>
            <a class="btn magnetic-button btn-outline" href="/contact">Hire me!<i class="icon bi bi-arrow-right ms-1"></i><span></span></a>
        </div>


    </div>
</section>

    <x-faq />


    {{-- <x-featured-blogs /> --}}


	<x-cta />


@endsection

@section('scripts')

<script src="{{ asset("assets/js/main.js") }}"></script>

@endsection