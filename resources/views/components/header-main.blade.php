<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}" />

        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title> {{ $slot}}</title>
        <link rel="icon" type="image/png" href="assets/images/logo.png">

        <link rel="stylesheet" href="assets/style.css">
        <script src="https://kit.fontawesome.com/your-fontawesome-kit.js" crossorigin="anonymous"></script>
        <!-- google fonts -->
        <style>
            @import url('https://fonts.googleapis.com/css2?family=Abril+Fatface&display=swap');
        </style>
        <!-- font-awesome icons -->
        <script src="https://kit.fontawesome.com/9c18f8edbf.js" crossorigin="anonymous"></script>
        <!-- tailwind css -->
        <script src="https://cdn.tailwindcss.com"></script>
        <style>
            header {
                display: flex;
                justify-content: space-between;
                align-items: center;
                padding: 40px;
            }
        </style>
        <script src="script.js"></script>
</head>
<body>
    <header>
        <div class="logo">
            <a href="/">
                <img src="./assets/images/logo.png" alt="Logo Name"> </a>
                 <a href="/"><span class="block">Letsrate</span></a>

        </div>
            <div id="container" class="ml-44">
                <nav>
                    <ul>
                        <li><a href="/">Home</a></li>
                        <li><a href="#">My books</a></li>
                        <li><a href="#">Community</a>
                        <ul>
                            <li><a href="#">Quotes</a></li>
                            <li><a href="#">Groups</a></li>
                            <li><a href="#">Ask The Authors</a></li>
                            <li><a href="/books-intro">Books</a></li>
                        </ul>
                        </li>
                        <li><a href="#">Contact Us</a></li>
                    </ul>
                </nav>
            </div>
            @if (Route::has('login'))
                            <nav class="flex flex-1 justify-end">
                                @auth
                                    <a
                                        href="{{ url('/profile') }}"
                                        class="rounded-md px-3 py-2 text-black  ring-1 ring-transparent transition  focus:outline-none focus-visible:ring-[#FF2D20]  dark:focus-visible:ring-white"
                                    >
                                        <img  src="assets/images/user_pics/{{auth()->user()->profile_picture}}"
                                        class="w-12 rounded-full "
                                        >
                                    </a>
                                @else
                                    <a
                                        href="{{ route('login') }}"
                                        class="rounded-md px-3 py-2 text-black  ring-1 ring-transparent transition  focus:outline-none focus-visible:ring-[#FF2D20]   dark:focus-visible:ring-white"
                                    >
                                        Log in
                                    </a>

                                    @if (Route::has('register'))
                                        <a
                                            href="{{ route('register') }}"
                                            class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20]   dark:focus-visible:ring-white"
                                        >
                                            Register
                                        </a>
                                    @endif
                                @endauth
                            </nav>
                        @endif

    </header>

