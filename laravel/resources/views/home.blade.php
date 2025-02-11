@extends('layouts.main')

@section('title', 'Home - Torbit')

@section('content')
<section class="hero-section text-center text-white" style="position: relative; padding: 100px 0;">
    <img src="{{ asset('images/ferrara.png') }}" alt="Hero Background" class="img-fluid w-100" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; object-fit: cover; z-index: -1; filter: blur(5px);">
    <div class="container" style="position: relative; z-index: 1; color: black; background-color: rgba(255, 255, 255, 0.8); border-radius: 10px; padding: 20px;">
        @if(isset($user))
            <h1 class="display-4">Benvenuto, {{ $user->name }}!</h1>
        @else
            <h1 class="display-4">Benvenuto, ospite!</h1>
        @endif
    </div>
</section>
@endsection
