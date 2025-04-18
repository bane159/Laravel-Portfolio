@extends('layouts.main')
@section('meta_tags')
    <title>Contact Me | Branislav Radovanovic - Full Stack Developer</title>
    <meta name="description" content="Get in touch for web development projects. Specializing in Laravel, PHP, and JavaScript solutions.">
    
    <!-- Open Graph -->
    <meta property="og:title" content="Contact Me | Branislav Radovanovic">
    <meta property="og:description" content="Hire a Full Stack Developer for your next project. Laravel/PHP expert.">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    
    <!-- Schema.org -->
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "ContactPage",
        "name": "Contact Branislav Radovanovic",
        "description": "Web development contact form",
        "url": "{{ url()->current() }}"
    }
    </script>
@endsection

@section('head_scripts')
    <!-- Additional head scripts specific to contact page -->
    <link rel="canonical" href="{{ route('contact') }}">
@endsection


@section('content')

			<!-- ***** Breadcrumb Area Start ***** -->
			<section id="home" class="breadcrumb-section">
				<div class="container">
					<div class="row">
						<div class="col-12">
							<!-- Breadcrumb Content -->
							<div class="breadcrumb-content">
								<div class="flex">
									<h1 class="title">Let's talk</h1>
									<span class="line animate-line"></span>
									<h1 class="title">Web!</h1>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
			<!-- ***** Breadcrumb Area End ***** -->


			<!-- ***** Contact Area Start ***** -->
			<section class="contact-area border-top border-light-subtle">
				<div class="container">
					<div class="row justify-content-between">
						<div class="col-12 col-lg-4 order-last order-md-first">
							<div class="contact-info">
								<h3>Schedule a call with me to see if I can help</h3>
								<p>Whether you’re looking to start a new project or simply want to chat, feel free to reach out to me!</p>

								<div class="content contact-form">
									<ul class="list-group list-group-flush ">
										@php
                                            $socials = App\Models\Socials::all();
                                        @endphp
                                        @foreach ($socials as $social)

                                            
                                            <li class="list-group-item">
                                                
                                                <a class="content swap-icon" href="{{$social -> link}}" target = "_blank">{{ $social -> name }} <i class="icon rotate bi bi-arrow-right-short"></i></a>
                                            </li>
                                        @endforeach
										
										<li class="list-group-item text-break">
											<i class="icon icon-envelope-open black"></i>
											<a class="content" href="mailto:hello@brilio.com">branislav.radovanovic.31.22@ict.edu.rs</a>
										</li>

										
									</ul>
								</div>
							</div>
						</div>
						<div class="col-12 col-lg-7 order-first order-md-last mt-sm-4 mt-lg-0">
							<form id="form-contact" class="contact-form z-100" method="POST" action="/contact/send">
                                @csrf
                                
                                <!-- General error display at top -->
                               
                            
                                
                                <!-- Name Field -->
                                <div class="form-floating mb-3 z-100">
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" 
                                           id="name" name="name" placeholder="Name" value="{{ old('name') }}" >
                                    <label for="name">Name</label>
                                    
                                        <div class="invalid-feedback d-block" id = "invalid-name">@error('name'){{ $message }}@enderror</div>
                                    
                                </div>
                            
                                <!-- Email Field -->
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control @error('email') is-invalid @enderror" 
                                           id="email" name="email" placeholder="name@example.com" value="{{ old('email') }}" >
                                    <label for="email">Email address</label>
                                   
                                        <div class="invalid-feedback d-block" id = "invalid-email"> @error('email'){{ $message }}@enderror</div>
                                    
                                </div>
                            
                                <!-- Phone Field -->
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control @error('phone') is-invalid @enderror" 
                                           id="phone" name="phone" placeholder="Phone" value="{{ old('phone') }}">
                                    <label for="phone">Phone</label>
                                    
                                        <div class="invalid-feedback d-block" id = "invalid-phone">@error('phone'){{ $message }}@enderror</div>
                                    
                                </div>
                            
                                <!-- Company Name -->
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control @error('company_name') is-invalid @enderror" 
                                           id="company-name" name="company_name" placeholder="Company Name" value="{{ old('company_name') }}">
                                    <label for="company-name">Company Name</label>
                                   
                                        <div class="invalid-feedback d-block" id = "invalid-company_name"> @error('company_name'){{ $message }}@enderror</div>
                                    
                                </div>
                            
                                <!-- Website -->
                                <div class="form-floating mb-3">
                                    <input type="url" class="form-control @error('website') is-invalid @enderror" 
                                           name="website" id="website" placeholder="Website" value="{{ old('website') }}">
                                    <label for="website">Company Website</label>
                                   
                                        <div class="invalid-feedback d-block" id = "invalid-website"> @error('website'){{ $message }}@enderror</div>
                                    
                                </div>
                            
                                <!-- Interest Radio Buttons -->
                                <div class="form-group mb-3">
                                    <div class="form-label">I'm interested in:</div>
                                    <div class="form-input-group">
                                        <div class="form-input">
                                            <input type="radio" class="btn-check" name="interest" id="option-branding" 
                                                   value="Branding" {{ old('interest') == 'Branding' ? 'checked' : '' }}>
                                            <label class="btn magnetic-button" for="option-branding">Branding<span></span></label>
                                        </div>
                            
                                        <div class="form-input">
                                            <input type="radio" class="btn-check" name="interest" id="option-web-design" 
                                                   value="Web Design" {{ old('interest') == 'Web Design' ? 'checked' : '' }}>
                                            <label class="btn magnetic-button" for="option-web-design">Web Design<span></span></label>
                                        </div>
                            
                                        <div class="form-input">
                                            <input type="radio" class="btn-check" name="interest" id="option-app-design" 
                                                   value="App Design" {{ old('interest') == 'App Design' ? 'checked' : '' }}>
                                            <label class="btn magnetic-button" for="option-app-design">App Design<span></span></label>
                                        </div>
                                        
                                        <div class="form-input">
                                            <input type="radio" class="btn-check" name="interest" id="option-hire" 
                                                   value="Hire me" {{ old('interest') == 'Hire me' ? 'checked' : '' }}>
                                            <label class="btn magnetic-button" for="option-hire">Hire me<span></span></label>
                                        </div>

                                        <div class="form-input">
                                            <input type="radio" class="btn-check" name="interest" id="option-other" 
                                                   value="Other" {{ old('interest') == 'Other' ? 'checked' : '' }}>
                                            <label class="btn magnetic-button" for="option-other">Other<span></span></label>
                                        </div>

                                    </div>
                                    
                                        <div class="invalid-feedback d-block" id = "invalid-interest">@error('interest'){{ $message }}@enderror</div>
                                    
                                </div>
                            
                                <!-- Budget Range -->
                                <div class="form-group mb-3">
                                    <div class="form-label">My budget is: (RSD)</div>
                                    <div class="form-input-group">
                                        <div class="form-input">
                                            <input type="radio" class="btn-check" name="budget_range" id="budget-1" 
                                                   value="< 10k" {{ old('budget_range') == '< 10k' ? 'checked' : '' }}>
                                            <label class="btn magnetic-button" for="budget-1">&lt; 10k<span></span></label>
                                        </div>
                            
                                        <div class="form-input">
                                            <input type="radio" class="btn-check" name="budget_range" id="budget-2" 
                                                   value="10k - 30k" {{ old('budget_range') == '10k - 30k' ? 'checked' : '' }}>
                                            <label class="btn magnetic-button" for="budget-2">10k - 30k<span></span></label>
                                        </div>
                            
                                        <div class="form-input">
                                            <input type="radio" class="btn-check" name="budget_range" id="budget-3" 
                                                   value="30k - 50k" {{ old('budget_range') == '30k - 50k' ? 'checked' : '' }}>
                                            <label class="btn magnetic-button" for="budget-3">30k - 50k<span></span></label>
                                        </div>
                            
                                        <div class="form-input">
                                            <input type="radio" class="btn-check" name="budget_range" id="budget-4" 
                                                   value="50k - 70k" {{ old('budget_range') == '50k - 70k' ? 'checked' : '' }}>
                                            <label class="btn magnetic-button" for="budget-4">50k - 70k<span></span></label>
                                        </div>
                            
                                        <div class="form-input">
                                            <input type="radio" class="btn-check" name="budget_range" id="budget-5" 
                                                   value="> 70k" {{ old('budget_range') == '> 70k' ? 'checked' : '' }}>
                                            <label class="btn magnetic-button" for="budget-5">&gt; 70k<span></span></label>
                                        </div>
                                    </div>
                                    
                                        <div class="invalid-feedback d-block" id = "invalid-budget_range">@error('budget_range'){{ $message }}@enderror</div>
                                    
                                </div>
                            
                                <!-- Exact Budget -->
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control @error('exact_budget') is-invalid @enderror" 
                                           id="budget" placeholder="Exact Budget" name="exact_budget" value="{{ old('exact_budget') }}">
                                    <label for="budget">Do you have an exact budget?</label>
                                    
                                        <div class="invalid-feedback d-block" id = "invalid-exact_budget">@error('exact_budget'){ $message }}@enderror</div>
                                    
                                </div>
                            
                                <!-- Timeline -->
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control @error('timeline') is-invalid @enderror" 
                                           id="timeline" placeholder="Timeline" name="timeline" value="{{ old('timeline') }}">
                                    <label for="timeline">What is your timeline?</label>
                                    
                                        <div class="invalid-feedback d-block" id = "invalid-timeline">@error('timeline'){{ $message }}@enderror</div>
                                    
                                </div>
                            
                                <!-- Message -->
                                <div class="form-floating mb-4">
                                    <textarea class="form-control @error('message') is-invalid @enderror" 
                                              id="message" placeholder="Leave a comment here" style="height: 100px" 
                                              name="message">{{ old('message') }}</textarea>
                                    <label for="message">Message</label>
                                    
                                        <div class="invalid-feedback d-block" id = "invalid-message">@error('message'){{ $message }}@enderror </div>
                                    
                                </div>
                            
                                <!-- Submit Button -->
                                <button type="submit" class="btn magnetic-button">
                                    Submit Message <i class="icon bi bi-arrow-right ms-1"></i><span></span>
                                </button>
                            </form>
							
						</div>
					</div>
				</div>
			</section>



            
			
@endsection


@section('scripts')

<script src="{{ asset("assets/js/contact.js") }}"></script>

@endsection