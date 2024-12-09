@extends('layouts.app')

@section('content')
<main class="dashboard-main">
    <style>
        /* General Styles */
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            color: #333;
        }

        h2,
        h3 {
            color: #0056b3;
            text-align: center;
        }

        form {
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            background: #ffffff;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        label {
            display: block;
            margin-bottom: 15px;
            font-size: 16px;
        }

        label input,
        label textarea {
            display: block;
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            font-size: 14px;
            border: 1px solid #ccc;
            border-radius: 4px;
            background: #fdfdfd;
        }

        textarea {
            resize: none;
            height: 80px;
        }

        input[type="file"] {
            padding: 4px;
        }

        button.product-button {
            display: block;
            width: 100%;
            padding: 10px;
            font-size: 16px;
            font-weight: bold;
            color: #fff;
            background-color: #007bff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button.product-button:hover {
            background-color: #0056b3;
        }

        /* Spacing between forms */
        form+form {
            margin-top: 40px;
        }
    </style>
    <p class="text-2xl font-bold py-6">Expand Your Catalog</p>
    <div class="flex gap-6 mt-4">
        <!-- Product Form Section -->
        <div>
            <h3 class="font-bold">Launch a Product</h3>
            <form id="productForm" action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <label>Title: <input type="text" name="title" required></label>
                <label>Description: <textarea name="description" required></textarea></label>
                <label>Price: <input type="text" name="price" required></label>
                <label>Image: <input type="file" name="image" accept="image/*"></label>
                <button type="submit" class="product-button">Add Product</button>
            </form>
        </div>

        <!-- Service Form Section -->
        <div>
            <h3 class="font-bold">Offer a Service</h3>
            <form id="serviceForm" action="{{ route('service.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <label>Title: <input type="text" name="title" required></label>
                <label>Description: <textarea name="description" required></textarea></label>
                <label>Duration: <input type="text" name="duration" required></label>
                <label>Image: <input type="file" name="image" accept="image/*"></label>
                <button type="submit" class="product-button">Add Service</button>
            </form>
        </div>
    </div>

    <hr>

    <div class="mt-8 ">
        <p class="font-bold text-2xl py-6">Manage Existing Products</p>
        <div class="flex gap-4 overflow-x-auto">
            @foreach ($products as $product)
                <div style="min-width: 300px">
                    <h3 class="text-lg">
                        <strong>{{ $product->title }}</strong> - ${{ $product->price }}
                    </h3>
                    <form action="{{ route('product.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <label>Title: <input type="text" name="title" value="{{ $product->title }}" required></label>
                        <label>Description: <textarea name="description"
                                required>{{ $product->description }}</textarea></label>
                        <label>Price: <input type="text" name="price" value="{{ $product->price }}" required></label>
                        <label>Image: <input type="file" name="image" accept="image/*"></label>
                        <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->title }}"
                            style="width: 100px; height: auto;">
                        <button type="submit" style="color: darkblue">Update Product</button>
                    </form>

                    <!-- Delete Product -->
                    <form action="{{ route('product.destroy', $product->id) }}" method="POST" style="margin-top: 0px;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Are you sure?')" style="color: darkred">Delete
                            {{$product->title}}</button>
                    </form>
                </div>
            @endforeach
        </div>
        <hr>

        <p class="text-2xl font-bold py-6">Manage Existing Services</p>
        <div>
            <div class="flex gap-4 overflow-x-auto">
                @foreach ($services as $service)
                    <div style="min-width: 300px">
                        <h3 class="text-lg">
                            <strong>{{ $service->title }}</strong> - {{ $service->duration }}
                        </h3>
                        <div>
                            <form action="{{ route('service.update', $service->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <label>Title: <input type="text" name="title" value="{{ $service->title }}"
                                        required></label>
                                <label>Description: <textarea name="description"
                                        required>{{ $service->description }}</textarea></label>
                                <label>Duration: <input type="text" name="duration" value="{{ $service->duration }}"
                                        required></label>
                                <label>Image: <input type="file" name="image" accept="image/*"></label>
                                <img src="{{ asset('storage/' . $service->image) }}" alt="{{ $service->title }}"
                                    style="width: 100px; height: auto;">
                                <button type="submit" style="color: darkblue">Update Service</button>
                            </form>

                            <!-- Delete Service -->
                            <form action="{{ route('service.destroy', $service->id) }}" method="POST"
                                style="margin-top: 10px;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('Are you sure?')"
                                    style="color: darkred">Delete
                                    {{$service->title}}</button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</main>
@endsection