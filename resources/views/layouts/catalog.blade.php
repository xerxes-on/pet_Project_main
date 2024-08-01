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
         <div class="container">
                <div id="book-grid" >
                            <!-- Books will be displayed here -->
                </div>
{{--        <div class="grid cursor-pointer grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-6">--}}
{{--            @foreach($books as $book)--}}
{{--                <div class="w-56 bg-white border rounded-xl border-gray-200 text-center transform transition-transform hover:scale-105">--}}
{{--                <img src="assets/images/books5.png" alt="Book 1" class="w-full rounded-xl">--}}
{{--            </div>--}}
{{--            @endforeach--}}
{{--        </div>--}}
    </div>
         <span class="pagination">{{ $books->links()}}</span>
<script>

    $('#search').on('keyup', function(){
    search();
});
    search();
    function search(){
        var keyword = $('#search').val();
        $.post('{{ route("book.search") }}',
    {
        _token: $('meta[name="csrf-token"]').attr('content'),
        keyword:keyword
    },
    function(data){
            displayBooks(data);
            console.log(data);
});
}

    function displayBooks(res){
    let htmlView = '';
    if(res.books.length <= 0){
    htmlView += `<div class="col-12"><p>No books found.</p></div>`;
} else {
    for(let i = 0; i < res.books.length; i++){
    htmlView += `
               <div class="col-md-3 mb-4">
                   <div class="card">
                       <img src="${res.books[i].image_url}" class="card-img-top" alt="${res.books[i].title}">
                       <div class="card-body">
                           <h5 class="card-title">${res.books[i].title}</h5>
                           <p class="card-text">${res.books[i].author}</p>
                       </div>
                   </div>
               </div>
               `;
}
}
    $('#book-grid').html(htmlView);
}

</script>

@endsection


