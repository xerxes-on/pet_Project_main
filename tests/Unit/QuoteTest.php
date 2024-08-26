<?php

namespace Tests\Unit;

use App\Models\Author;
use App\Models\Quote;
use Tests\TestCase;


class QuoteTest extends TestCase
{
    /** @test */
    public function it_can_create_a_quote()
    {
        $faker = \Faker\Factory::create();
        $quoteData = Quote::create([
            'author_id' => Author::inRandomOrder()->first()->id,
            'quote' => $faker->realText(),
        ]);

        $this->assertDatabaseHas('quotes', ['quote' => $quoteData->quote]);
    }

    /** @test */
    public function it_can_read_a_quote()
    {
        $faker = \Faker\Factory::create();
        $quoteData = Quote::create([
            'author_id' => Author::inRandomOrder()->first()->id,
            'quote' => $faker->realText(),
        ]);
        $foundQuote = Quote::find($quoteData->id);

        $this->assertEquals($quoteData->quote, $foundQuote->quote);
    }

    /** @test */
    public function it_can_update_a_quote()
    {
        $faker = \Faker\Factory::create();
        $quote = Quote::create([
            'author_id' => Author::inRandomOrder()->first()->id,
            'quote' => $faker->realText(),
        ]);

        $quote->update(['quote' => 'Updated Title']);

        $this->assertDatabaseHas('quotes', ['quote' => 'Updated Title']);
    }


    /** @test */
    public function it_can_delete_a_quote()
    {
        $faker = \Faker\Factory::create();
        $quote = Quote::create([
            'author_id' => Author::inRandomOrder()->first()->id,
            'quote' => $faker->realText(),
        ]);

        $quote->delete();

        $this->assertDatabaseMissing('quotes', ['id' => $quote->id]);
    }


}
