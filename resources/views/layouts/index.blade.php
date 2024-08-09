@extends('static')
@section( 'content')
    <main class="h-screen">
        <div class="search-bar">
            <i class="fas fa-search"></i>
            <input type="text" placeholder="Search Your Books">
            <i class="fas fa-sliders-h"></i>
        </div>

        <div class="content">
            <aside class="left-sidebar">
                <div class="reading-challenge">
                    <h2>2024 READING CHALLENGE</h2>
                    <p class="text-center text-xs">Challenge Your Self to Read More This Year</p>
                    <div class="challengeimg"><img src="./assets/images/challenge.png" alt="Reading Challenge"></div>
                    <h3>I Want to Read</h3>
                    <div class="goal-setter">
                        <button onclick="decrease()">-</button>
                        <span id="goal" class="text-xl">12</span>
                        <button onclick="increase()">+</button>
                    </div>
                    <p class="text-center">You Can Change Your Goal at Any Time</p>
                </div>
                <div class="book-shelves">
                    <h3>THE BOOK SHELVES</h3>
                    <ul class="text-center">
                        <li>Want to Read <span>(0)</span></li>
                        <li>Currently Reading <span>(0)</span></li>
                        <li>Completed <span>(0)</span></li>
                    </ul>
                </div>
                <div class="social-icons">
                    <i class="fab fa-google"></i>
                    <i class="fab fa-apple"></i>
                    <i class="fab fa-instagram"></i>
                    <i class="fab fa-facebook"></i>
                    <i class="fab fa-twitter"></i>
                </div>
            </aside>

            <section class="main-content">
                <h2 class="text-center">Trending Books</h2>
                <div class="book-grid">
                    <!-- Repeat this structure for each book -->
                    <div style="background-image: url(/assets/images/book1.png);" class="book-card large w-40">
                        <div class="w-16 flex items-center justify-center m-auto mt-8 "><img
                                src="./assets/images/profile.png" alt="avatar" class="rounded-full"></div>
                        <div class="book-info">
                            <h3>BOOK NAME</h3>
                            <p>Author Name</p>
                            <p>Lorem</p>
                            <div class="rating">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="far fa-star"></i>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="book-card w-96 h-32 relative"
                             style="background-image: url(./assets/images/book2.png);">
                            <div class="book-info">
                                <img src="./assets/images/profile.png" alt="Book Cover"
                                     class="absolute  left-5 w-16 rounded-full">
                                <h3 style="color: aliceblue;">BOOK NAME</h3>
                                <p>Author Name</p>
                                <p>Lorem</p>
                                <div class="rating">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="far fa-star"></i>
                                </div>
                            </div>
                        </div>
                        <div class="book-card relative" style="background-image: url(./assets/images/book3.png);">
                            <img class="w-16 absolute left-5 top-5 rounded-full" src="./assets/images/profile.png"
                                 alt="Book Cover">
                            <div class="book-info">
                                <h3>BOOK NAME</h3>
                                <p>Author Name</p>
                                <p>Lorem</p>
                                <div class="rating">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="far fa-star"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <h2>Suggestions</h2>
                <div class="suggestion-grid">
                    <!-- Repeat this structure for each suggestion -->
                    <div class="suggestion-card">
                        <img src="./assets/images/books5.png" alt="Suggestion Cover">
                    </div>
                    <div class="suggestion-card">
                        <img src="./assets/images/books6.png" alt="Suggestion Cover">
                    </div>
                    <div class="suggestion-card">
                        <img src="./assets/images/current.png" alt="Suggestion Cover">
                    </div>
                    <div class="suggestion-card">
                        <img src="./assets/images/books66.png" alt="Suggestion Cover">
                    </div>
                    <!-- More suggestion cards here -->
                </div>
            </section>

            <aside class="right-sidebar">
                <div class="welcome-message">
                    <h2>WELCOME TO Letsrate</h2>
                    <p>Meet your favorite book, find your reading community, and manage your reading life.</p>
                </div>
                <div class="">
                    <img class="rounded-2xl w-48 m-auto" src="./assets/images/chal.png" alt="Choice Award 2024">
                </div>
                <div class="work-with-us">
                    <h3>WORK WITH US</h3>
                    <ul class="text-center">
                        <li>Authors</li>
                        <li>Advertise</li>
                        <li>Authors & Ads Blog</li>
                    </ul>
                </div>
            </aside>
        </div>
@endsection

