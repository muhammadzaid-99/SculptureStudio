<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Product;
use App\Models\Service;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create a test user
        User::factory()->create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password'=> bcrypt('12345678'),
        ]);

        // Seed products
        Product::create([
            'title' => 'Woman Sculpture',
            'description' => 'Elegantly draped figure in shawl, capturing feminine grace with lifelike, flowing detail.',
            'price' => 199,
            'image' => 'assets/images/product-1.jpg',
        ]);

        Product::create([
            'title' => 'Veiled Lady Sculpture',
            'description' => 'A veiled lady with delicate features and intricate design, adding mystery to any space.',
            'price' => 149,
            'image' => 'assets/images/product-2.jpg',
        ]);

        Product::create([
            'title' => 'Hand Sculpture',
            'description' => 'A realistic hand sculpture embodying craftsmanship, perfect as a unique art centerpiece.',
            'price' => 99,
            'image' => 'assets/images/product-3.jpg',
        ]);

        // Seed services
        Service::create([
            'title' => 'Basic Sculpting Course',
            'description' => 'Perfect for beginners, this course introduces the fundamentals of sculpting. Participants will learn how to shape, carve, and model clay into creative designs, focusing on foundational techniques like hand-building, forming basic structures, and understanding tools and materials.',
            'duration' => '3 weeks',
            'image' => 'assets/images/course-1.jpg',
        ]);

        Service::create([
            'title' => 'Advanced Sculpting Course',
            'description' => 'This course is designed for individuals with prior sculpting experience looking to enhance their skills. Participants will explore advanced techniques such as complex molding, creating textures, and working with mixed media. The curriculum emphasizes creative expression and refinement, guiding students to design detailed sculptures.',
            'duration' => '8 weeks',
            'image' => 'assets/images/course-2.jpg',
        ]);
    }
}
