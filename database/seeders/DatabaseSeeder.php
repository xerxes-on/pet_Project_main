<?php

namespace Database\Seeders;

use App\Models\Author;
use App\Models\Book;
use App\Models\Category;
use App\Models\Rating;
use App\Models\User;
use DateTime;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Random\RandomException;

class DatabaseSeeder extends Seeder
{
    public function randomDateInRange(DateTime $start, DateTime $end): DateTime
    {
    $randomTimestamp = mt_rand($start->getTimestamp(), $end->getTimestamp());
    $randomDate = new DateTime();
    $randomDate->setTimestamp($randomTimestamp);
    return $randomDate;
}

    /**
     * @throws RandomException
     */
    public function run(): void
    {
//        Book::factory()->count(50)->create();

//        for ($i = 1; $i <= 100; $i++) {
//            $pivotData = [
//                'images' => 'default_images/profile_' . random_int(7,14) . ".png"
//            ];
//            $book = Book::find($i);
//           $book->update($pivotData);
//        }

    }
}
