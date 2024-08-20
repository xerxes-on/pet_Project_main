<?php

namespace Database\Seeders;

use App\Models\Category;
use Database\Factories\Book_CategoryFactory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
          Category::factory()->count(15)->create();
    }
}
