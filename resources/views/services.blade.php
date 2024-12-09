@extends('layouts.main')

@section('content')
<main class="product-main">
    <!-- Products Section -->
    <section class="product-section">
        <h2>Featured Products</h2>
        <ul id="productList" class="product-container">
            @foreach ($products as $product)
                <li class="product-card">
                    <img style="height: 230px; width: auto; object-fit: cover;" src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->title }}">
                    <div class="product-info">
                        <h3>{{ $product->title }}</h3>
                        <p class="short-description">{{ \Illuminate\Support\Str::limit($product->description, 50) }}</p>
                        <p class="full-description hidden">{{ $product->description }}</p>
                        <p class="price">${{ $product->price }}</p>
                        <button class="product-button btn-width">Add to Cart</button>
                        <button class="product-button btn-width" onclick="toggleDetails(this)">Show Details</button>
                    </div>
                </li>
            @endforeach
        </ul>
    </section>

    <hr>

    <!-- Services Section -->
    <section class="services-section">
        <h3>Trainings and Services</h3>
        <ul id="serviceList" class="service-container">
            @foreach ($services as $service)
                <li class="service-card">
                    <img style="height: 280px; width: auto; object-fit: cover;" src="{{ asset('storage/' . $service->image) }}" alt="{{ $service->title }}">
                    <div class="service-info">
                        <h4>{{ $service->title }}</h4>
                        <p class="short-description">{{ \Illuminate\Support\Str::limit($service->description, 50) }}</p>
                        <p class="full-description hidden">{{ $service->description }}</p>
                        <div class="service-details">
                            <p>Duration: {{ $service->duration }}</p>
                            <button class="btn-width">Get Enrolled</button>
                        </div>
                        <button class="toggle-button product-button btn-width" onclick="toggleDetails(this)">Show Details</button>
                    </div>
                </li>
            @endforeach
        </ul>
    </section>
</main>
@endsection
