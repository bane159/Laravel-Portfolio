@php
    
    $socials = App\Models\Socials::all();
@endphp

<div class="socials mt-5">
    <nav class="nav justify-content-center">
        @foreach ($socials as $social )
            <a class="nav-link swap-icon" href="{{ $social -> link }}" target = "_blank">{{ $social -> name }} <i class="icon rotate bi bi-arrow-right-short"></i></a>
        
        @endforeach
        {{-- <a class="nav-link swap-icon" href="#">Twitter <i class="icon rotate bi bi-arrow-right-short"></i></a>
        <a class="nav-link swap-icon" href="#">Linkedin <i class="icon rotate bi bi-arrow-right-short"></i></a> --}}
    </nav>
</div>