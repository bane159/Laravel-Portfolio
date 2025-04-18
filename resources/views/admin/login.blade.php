@extends('layouts.main')
@section('content')
    <section class="contact-area border-top border-light-subtle z-100">
        <div class="container">
            <div class = "row justify-content-center align-items-center vh-100">

                <div class="col-12 col-lg-5 text-center mb-4 mb-lg-0">
                    <h1 class="text-white">Login</h1>
                    <p class="text-white">Please enter your email and password to login.</p>
                </div>
                <div class="col-12 col-lg-7 order-first order-md-last mt-sm-4 mt-lg-0">
                    <form id="form-contact" class="contact-form z-100" method="POST" action="{{ route('login') }}">
                        @csrf
                        <!-- Company Name -->
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control @error('email') is-invalid @enderror" 
                                id="email" name="email" placeholder="email" value="{{ old('email') }}">
                            <label for="company-name">email</label>
                        
                                <div class="invalid-feedback d-block" id = "invalid-company_name"> @error('email'){{ $message }}@enderror</div>
                            
                        </div>
                    
                        <!-- Website -->
                        <div class="form-floating mb-3">
                            <input type="password" class="form-control @error('password') is-invalid @enderror" 
                                name="password" id="password" placeholder="password" value="{{ old('password') }}">
                            <label for="website">password</label>
                        
                                <div class="invalid-feedback d-block" id = "invalid-website"> @error('password'){{ $message }}@enderror</div>
                            
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