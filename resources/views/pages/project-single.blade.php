@extends('layouts.main')

@section('meta_tags')
    <title>{{ $project -> name }} | Portfolio Project | Branislav Radovanovic</title>
    <meta name="description" content="{{ Str::limit(strip_tags($project->description), 160) }}">
    
    <!-- Open Graph -->
    <meta property="og:title" content="{{ $project -> name }} | My Portfolio">
    <meta property="og:description" content="{{ Str::limit(strip_tags($project->description), 300) }}">
    <meta property="og:type" content="article">
    <meta property="og:url" content="{{ url()->current() }}">
    @if($project -> ProjectPics->first())
        <meta property="og:image" content="{{ asset($project->ProjectPics->first()->path) }}">
    @endif
    
    <!-- Schema.org -->
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "CreativeWork",
        "name": "{{ $project -> name }}", 
        "description": "{{ Str::limit(strip_tags($project->description), 160) }}",
        "dateCreated": "{{ $project -> created_at -> toIso8601String() }}",
        "creator": {
            "@type": "Person",
            "name": "Branislav Radovanovic"
        }
    }
    </script>
@endsection

@section('head_scripts')
    <link rel="canonical" href="{{ route('projects.show', $project -> id) }}">
@endsection






@section('content')

    <section id="home" class="breadcrumb-section">

            <div class="row d-flex justify-content-center  align-items-center">
                <div class="col-12 col-lg-10 d-flex flex-column align-items-center justify-content-center">
                    {{-- <!-- Content --> --}}
                    <div class="content w-60">
                        <h1 class="title">{{$project -> name}}</h1>
                        
                    </div>
                </div>
            </div>

            <div class = "row">
                <div class="col-6 content item d-flex flex-column flex-md-row justify-content-center mt-4" id = "project-meta">
                    {{-- <!-- Role --> --}}
                    <div class="role">
                        <h6 class="title mt-0 mb-1 mb-md-3">Tags</h6>
                        <div class="portfolio-terms">
                            @foreach ($project -> tags as $tag )
                                <p class="terms ">{{ $tag -> name }}, </p>
                            @endforeach
                        </div>
                    </div>

                    {{-- <!-- Client --> --}}
                    <div class="client my-3 my-md-0">
                        <h6 class="title mt-0 mb-1 mb-md-3">Client</h6>
                        <p class = "terms">Freelance</p>
                    </div>

                    {{-- <!-- Category --> --}}
                    <div class="category">
                        <h6 class="title mt-0 mb-1 mb-md-3">Date</h6>
                        <p class="terms">{{ $project->created_at->format('F d, Y') }}</p>
                    </div>
                </div>
            </div>

            @auth
                <div class = "row">
                    <a href="{{ route('projects.delete' , $project -> id ) }}" class="btn btn-primary mt-3">Delete Project</a>
                </div>
            @endauth
            
    </section>


    <section class="content mt-0 pt-0 border-top border-light-subtle">
        <div class="container">
            <div class="row justify-content-between">
                <div class = "col-12  d-flex flex-column justify-content-center align-items-center">
                    <h2 class="title text-center">Project Description</h2>
                    <p class="description mt-3 mb-4">{!! $project -> description !!}</p>
                </div>
            </div>
            <div class="row justify-content-between">
                <div class = "col-12  d-flex flex-column justify-content-center align-items-center">
                    <h2 class="title text-center">Project Task</h2>
                    <p class="description mt-3 mb-4">{!! $project -> task !!}</p>
                </div>
            </div>







            
            <div class="row portfolio-content items">
                <div class="col-12">
                    @foreach ($project -> ProjectPics -> where('pic_type_id' , 2) as $pic )
                    <div class="reveal-img item">
                        <img src="{{ asset($pic -> path ) }}" alt="">
                    </div>
                    @endforeach
                   
                    {{-- <div class="reveal-img item">
                        <img src="assets/img/content/case-2.jpg" alt="">
                    </div>
                    <div class="reveal-img item">
                        <img src="assets/img/content/case-3.jpg" alt="">
                    </div> --}}
                </div>
            </div>


        </div>
    </section>

@endsection

@section('scripts')
    <script src="{{ asset('assets/js/main.js') }}"></script>

@endsection