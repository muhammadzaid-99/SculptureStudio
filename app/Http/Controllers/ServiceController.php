<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Product;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * Display a listing of services.
     */
    public function index()
    {
        $products = Product::all();
        $services = Service::all();

        return view('services', compact('products', 'services'));
    }

    /**
     * Show the form for creating a new service.
     */
    public function create()
    {
        return view('dashboard.create-service');
    }

    /**
     * Store a newly created service in the database.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'duration' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $imagePath = $request->file('image')->store('services', 'public');

        Service::create([
            'title' => $request->title,
            'description' => $request->description,
            'duration' => $request->duration,
            'image' => $imagePath,
        ]);

        return redirect()->route('dashboard')->with('success', 'Service created successfully!');
    }

    /**
     * Update the specified service in the database.
     */
    public function update(Request $request, Service $service)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'duration' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('services', 'public');
            $service->image = $imagePath;
        }

        $service->update([
            'title' => $request->title,
            'description' => $request->description,
            'duration' => $request->duration,
        ]);

        return redirect()->route('dashboard')->with('success', 'Service updated successfully!');
    }

    /**
     * Remove the specified service from the database.
     */
    public function destroy(Service $service)
    {
        $service->delete();
        return redirect()->route('dashboard')->with('success', 'Service deleted successfully!');
    }
}
