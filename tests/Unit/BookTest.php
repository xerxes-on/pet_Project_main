<?php

namespace Tests\Unit;

use App\Models\Author;
use App\Models\Book;
use Tests\TestCase;

class BookTest extends TestCase
{

    /** @test */
    public function it_can_create_a_book()
    {
        $faker = \Faker\Factory::create();
        $bookData = Book::create([
            'title' => $faker->realTextBetween(5, 35),
            'author_id' => Author::inRandomOrder()->first()['id'],
            'number_of_pages' => $faker->numberBetween(60, 500),
            'published_date' => $faker->date(),
            'rating' => $faker->randomFloat(2, 0, 10),
            'created_at' => $faker->dateTimeBetween('-1 year', now()),
            'images' => $faker->randomFloat()
        ]);

        $this->assertDatabaseHas('books', ['title' => $bookData->title]);
    }

    /** @test */
    public function it_can_read_a_book()
    {
        $faker = \Faker\Factory::create();
        $bookData = Book::create([
            'title' => $faker->realTextBetween(5, 35),
            'author_id' => Author::inRandomOrder()->first()['id'],
            'number_of_pages' => $faker->numberBetween(60, 500),
            'published_date' => $faker->date(),
            'rating' => $faker->randomFloat(2, 0, 10),
            'created_at' => $faker->dateTimeBetween('-1 year', now()),
            'images' => $faker->randomFloat()
        ]);
        $foundBook = Book::find($bookData->id);

        $this->assertEquals($bookData->title, $foundBook->title);
    }

    /** @test */
    public function it_can_update_a_book()
    {
        $faker = \Faker\Factory::create();
        $book = Book::create([
            'title' => $faker->realTextBetween(5, 35),
            'author_id' => Author::inRandomOrder()->first()['id'],
            'number_of_pages' => $faker->numberBetween(60, 500),
            'published_date' => $faker->date(),
            'rating' => $faker->randomFloat(2, 0, 10),
            'created_at' => $faker->dateTimeBetween('-1 year', now()),
            'images' => $faker->randomFloat()
        ]);

        $book->update(['title' => 'Updated Title']);

        $this->assertDatabaseHas('books', ['title' => 'Updated Title']);
    }

    /** @test */
    public function it_can_delete_a_book()
    {
        $faker = \Faker\Factory::create();
        $book = Book::create([
            'title' => $faker->realTextBetween(5, 35),
            'author_id' => Author::inRandomOrder()->first()['id'],
            'number_of_pages' => $faker->numberBetween(60, 500),
            'published_date' => $faker->date(),
            'rating' => $faker->randomFloat(2, 0, 10),
            'created_at' => $faker->dateTimeBetween('-1 year', now()),
            'images' => $faker->randomFloat()
        ]);

        $book->delete();

        $this->assertDatabaseMissing('books', ['id' => $book->id]);
    }
}
