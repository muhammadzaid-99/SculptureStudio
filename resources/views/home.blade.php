@extends('layouts.main')

@section('title', 'Home')

@section('content')
<section class="hero">
    <h2>Welcome to <span>The Sculpture Studio</span></h2>
    <img src="{{ asset('assets/images/hero.png') }}" alt="sculpture model">
</section>

<section class="intro">
    <h3>A Hub for Creative Expression</h3>
    <p>Founded by Pam England, The Sculpture Studio offers clay and mixed media courses, 
        one-on-one training, and a welcoming space for sculptors of all levels.</p>
</section>

<hr class="divider">

<section class="gallery">
    <div class="gallery-images">
        <img src="{{ asset('assets/images/gallery-1.jpg') }}" alt="">
        <img src="{{ asset('assets/images/gallery-2.jpg') }}" alt="">
        <img src="{{ asset('assets/images/gallery-3.png') }}" alt="">
    </div>

    <div class="description">
        <h3>Community and Individual Sculptures</h3>
        <p>At The Sculpture Studio, we craft captivating sculptures for public spaces and private collections, 
            bringing artistic visions to life.</p>
    </div>
</section>

<section class="subscribe">
    <h2>Subscribe</h2>
    <p>Sign up with your email address to receive news and updates.</p>
    <form class="subscribe-form">
        <input type="email" placeholder="Email Address" required>
        <button type="submit">Sign&nbsp;Up</button>
    </form>
</section>
@endsection
