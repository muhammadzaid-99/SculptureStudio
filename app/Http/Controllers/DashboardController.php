<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Service;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Fetch products and services from the database
        $products = Product::all();
        $services = Service::all();

        // Pass products and services to the view
        return view('dashboard', compact('products', 'services'));
    }
}
