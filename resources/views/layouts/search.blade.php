@extends('static')
@section('content')
     <main>
        <div class="search flex w-screen justify-between p-10">
            <h1 class="w-1/2 text-end text-3xl">Books</h1>
            <div class="searchbox w-1/3">
                <form action="" method="POST">
                <input type="text" id="search" class="text-xl pl-5 py-2 rounded-xl mr-10 w-full" placeholder="Search: books, authors, quotes ...">
                   </form>
            </div>
        </div>
            <div id="book-grid" class="container grid cursor-pointer grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-6">
                @foreach($books as $book)
                    <div class="w-56 bg-white border rounded-xl border-gray-200 text-center transform transition-transform hover:scale-105">
                        <img src="assets/images/books5.png" alt="Book 1" class="w-full rounded-xl">
                    </div>
                @endforeach
            </div>
         <span class="pagination underline">{{ $books->links()}}</span>
         <div id="pagination" class="mt-4 flex justify-center space-x-2 ">
</div>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script>
    $(document).ready(function() {
        $('#search').on('keyup', function(){
            search(1);
        });
    });

    function search(page = 1){
        var keyword = $('#search').val();
        if (keyword.length > 0) {
            let span  = document.querySelector(".pagination")
            span.style.display = 'none';
            $.post('{{ route("book.search") }}',
            {
                _token: $('meta[name="csrf-token"]').attr('content'),
                keyword: keyword,
                page: page
            },
            function(data){
                displayBooks(data);
                console.log(data);
            });
        } else {
            // If search is empty, show initial books
            $('#book-grid').html(`{!! $books->map(function($book) {
                return "<div class='w-56 bg-white border rounded-xl border-gray-200 text-center transform transition-transform hover:scale-105'><img src='assets/images/books5.png' class='w-full rounded-xl' alt='{$book->title}'></div>";
            })->join('') !!}`);
            $('#pagination').html('');
        }
    }

    function displayBooks(res){
        let htmlView = '';
        if(res.books.data.length <= 0){
            htmlView += `<div class="col-12"><h1>No books found.</h1></div>`;
        } else {
            for(let i = 0; i < res.books.data.length; i++){
                htmlView += `
                <div class="w-56 bg-white border rounded-xl border-gray-200 text-center transform transition-transform hover:scale-105">
                    <img src="assets/images/books5.png" class="w-full rounded-xl" alt="${res.books.data[i].title}">
                </div>
                `;
            }
        }
        $('#book-grid').html(htmlView);

        // Add pagination links
        let paginationHtml = '';
        for(let i = 1; i <= res.books.last_page; i++) {
            paginationHtml += `<button onclick="search(${i})" class="px-3 py-1 underline  text-black ">${i}</button>`;
        }
        $('#pagination').html(paginationHtml);
    }
</script>
@endsection
