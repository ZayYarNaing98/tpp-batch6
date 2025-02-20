<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'id' => 1,
                'name' => 'Information Technology',
            ],
            [
                'id' => 2,
                'name' => 'Travel',
            ],
            [
                'id' => 3,
                'name' => 'Food & Receipes',
            ],
            [
                'id' => 4,
                'name' => 'Health & Fitness',
            ],
            [
                'id' => 5,
                'name' => 'Education',
            ],
        ];

        foreach($categories as $category)
        {
            Category::create($category);
        }
    }
}
