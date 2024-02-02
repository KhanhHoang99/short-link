<?php

namespace Database\Seeders;
use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        // Clear existing records to start with a clean slate
        Category::truncate();

        // Insert sample data
        Category::create(['name' => 'Technology']);
        Category::create(['name' => 'Science']);
        Category::create(['name' => 'Business']);

    }
}
