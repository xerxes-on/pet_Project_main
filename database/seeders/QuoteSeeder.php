<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Quote;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class QuoteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Quote::factory()->count(50)->create();
    }
}
