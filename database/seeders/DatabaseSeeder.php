<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\Category;
use App\Models\Rating;
use App\Models\User;
use DateTime;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    public function randomDateInRange(DateTime $start, DateTime $end): DateTime
    {
    $randomTimestamp = mt_rand($start->getTimestamp(), $end->getTimestamp());
    $randomDate = new DateTime();
    $randomDate->setTimestamp($randomTimestamp);
    return $randomDate;
}
    public function run(): void
    {
        Rating::factory()->count(50)->create();


//        for ($i = 1; $i <= 100; $i++) {
//            $pivotData = [
//                'id' => $i,
//                'created_at' => $this->randomDateInRange(new DateTime('2017-01-01'), now())
//            ];
//            $book = Book::find($i);
//           $book->update($pivotData[$i-1]);
//        }

    }
}
