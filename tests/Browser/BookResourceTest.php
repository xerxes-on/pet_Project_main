<?php
//namespace Tests\Browser;
//
//use App\Models\Author;
//use App\Models\Book;
//use App\Models\Category;
//use App\Models\User;
//use Illuminate\Foundation\Testing\DatabaseMigrations;
//use Laravel\Dusk\Browser;
//use Tests\DuskTestCase;
//
//class BookResourceTest extends DuskTestCase
//{
//    use DatabaseMigrations;
//
//    public function test_can_view_book_list()
//    {
//        $this->browse(function (Browser $browser) {
//            $browser->loginAs(User::find(1))
//                    ->visit('/admin/books')
//                    ->assertSee('Books')
//                    ->assertSeeIn('@table', 'Title')
//                    ->assertSeeIn('@table', 'Author');
//        });
//    }
//
//    public function test_can_create_book()
//    {
//        $author = Author::factory()->create();
//        $category = Category::factory()->create();
//
//        $this->browse(function (Browser $browser) use ($author, $category) {
//            $browser->loginAs(User::find(1))
//                    ->visit('/admin/books/create')
//                    ->type('title', 'New Book Title')
//                    ->select('categories', $category->id)
//                    ->select('author_id', $author->id)
//                    ->type('published_date', now()->format('Y-m-d'))
//                    ->type('number_of_pages', 100)
//                    ->attach('images', __DIR__.'/images/sample.jpg') // Ensure this path exists
//                    ->press('Create')
//                    ->assertPathIs('/admin/books')
//                    ->assertSee('New Book Title');
//        });
//    }
//
//    public function test_can_edit_book()
//    {
//        $book = Book::factory()->create();
//        $newAuthor = Author::factory()->create();
//
//        $this->browse(function (Browser $browser) use ($book, $newAuthor) {
//            $browser->loginAs(User::find(1))
//                    ->visit('/admin/books/'.$book->id.'/edit')
//                    ->type('title', 'Updated Book Title')
//                    ->select('author_id', $newAuthor->id)
//                    ->press('Save')
//                    ->assertPathIs('/admin/books')
//                    ->assertSee('Updated Book Title');
//        });
//    }
//
//    public function test_can_delete_book()
//    {
//        $book = Book::factory()->create();
//
//        $this->browse(function (Browser $browser) use ($book) {
//            $browser->loginAs(User::find(1))
//                    ->visit('/admin/books')
//                    ->within('@table', function (Browser $table) use ($book) {
//                        $table->press('@delete-button-'.$book->id);
//                    })
//                    ->press('Confirm')
//                    ->assertDontSee($book->title);
//        });
//    }
//}
