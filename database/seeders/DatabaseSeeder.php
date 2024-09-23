<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\Category;
use App\Models\Quote;
use App\Models\User;
use Database\Factories\UserFactory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Random\RandomException;

class DatabaseSeeder extends Seeder
{

    /**
     * @throws RandomException
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();
        $this->call(AuthorSeeder::class);
        $this->call(BookSeeder::class);
        $this->call(RoleSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(QuoteSeeder::class);
        $this->call(Userseeder::class);
        $this->call(RatingSeeder::class);



        $pivotData = [];
        for ($i = 1; $i <= 50; $i++) {
            $pivotData[] = [
                'book_id' => Book::inRandomOrder()->first()->id,
                'category_id' => Category::inRandomOrder()->first()->id,
            ];
        }
        DB::table('books_categories')->insert($pivotData);
//
        $pivotData = [];
        for ($i = 1; $i <= 50; $i++) {
            $pivotData[] = [
                'quote_id' => Quote::inRandomOrder()->first()->id,
                'category_id' => Category::inRandomOrder()->first()->id,
            ];
        }
        DB::table('category_quote')->insert($pivotData);

        $pivotData = [];
        for ($i = 1; $i <= 50; $i++) {
            $pivotData[] = [
                'user_id' => User::inRandomOrder()->first()->id,
                'book_id' => Book::inRandomOrder()->first()->id,
                'status'=> random_int(0,2)
            ];
        }
        DB::table('user_books')->insert($pivotData);

        $pivotData = [];
        for ($i = 1; $i <= 50; $i++) {
            $pivotData[] = [
                'user_id' => User::inRandomOrder()->first()->id,
                'category_id' => Category::inRandomOrder()->first()->id,
            ];
        }
        DB::table('category_user')->insert($pivotData);
        $pivotData = [];
        for ($i = 1; $i <= 200; $i++) {
            $pivotData[] = [
                'follower_id' => User::inRandomOrder()->first()->id,
                'following_id' => User::inRandomOrder()->first()->id,
            ];
        }
        DB::table('follows')->insert($pivotData);
        $pivotData = [];
        for ($i = 1; $i <= 200; $i++) {
            $pivotData[] = [
                'quote_id' => Quote::inRandomOrder()->first()->id,
                'user_id' => User::inRandomOrder()->first()->id,
            ];
        }
        DB::table('user_quotes')->insert($pivotData);
    }
}
