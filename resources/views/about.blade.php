@extends('layouts.main')

@section('title', 'About Us - The Sculpture Studio')

@section('content')
<main class="about-main">
    <section class="intro-section">
        <h2 class="section-title">About the Studio</h2>
        <p class="section-paragraph">
            The Sculpture Studio, founded by Pam England, is a premier art studio specializing in sculptural design.
            We provide a range of services, from personalized training to public sculpture projects, all while fostering
            a community of creative professionals.
        </p>
    </section>

    <section class="vision-section">
        <h3 class="section-title">Our Vision</h3>
        <p class="section-paragraph">
            At The Sculpture Studio, our vision is to create a supportive and collaborative environment for artists of all levels.
            Whether you're a beginner sculptor or an experienced artist, we aim to provide the tools and inspiration needed to express
            your creativity. We believe that art has the power to transform spaces and communities, and we strive to create sculptures
            that do just that.
        </p>
    </section>

    <div class="button-container">
        <button id="toggle-style-button" onclick="toggleTextStyle()">Change Text Style</button>
    </div>
</main>
@endsection
