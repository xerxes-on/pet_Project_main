<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome Back - Login</title>
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
    <script src="assets/script.js"></script>

</head>
<body>
    <header>
        <div class="logo">
            <img src="./assets/images/logo.png" alt="Logo Name">
            <span>Letsrate</span>
        </div>
    </header>

    <main>
        <div class="books-illustration w-1/4 left-bottom">
            <img src="./assets/images/books.png" alt="books1">
        </div>
        <div class="books-illustration w-1/3 right-top">
            <img src="./assets/images/books2.png" alt="books1">
        </div>
        <div class="books-illustration w-1/3 right-bottom">
            <img src="./assets/images/books3.png" alt="books1">
        </div>
        <div class="login-container">
            <h1 class="text-5xl mb-5">Welcome to Letsrate</h1>
            <p class="mb-5">Sign Up to Continue</p>

            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="input-group">
                    <i class="fas fa-envelope"></i>
                    <input  type="email" name="email" value="{{ old('email') }}"  required autocomplete="username"  placeholder="Enter Your Email">
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                     <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>
                <div class="input-group">
                    <i class="fas fa-lock"></i>
                    <input type="password"
                            name="password"
                            required autocomplete="new-password" placeholder="Create Password">
                    <i class="fas fa-eye-slash toggle-password"></i>
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>
                <div class="input-group">
                    <i class="fas fa-lock"></i>
                    <input  type="password"
                            name="password_confirmation" required autocomplete="new-password"  placeholder="Confirm Password">
                    <i class="fas fa-eye-slash toggle-password"></i>
                     <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                </div>
                <button type="submit" class="login-btn">Sign Up</button>
            </form>

            <div class="social-login">
                <p>Sign up with</p>
                <div class="social-icons">
                    <a href="#"><i class="fab fa-google"></i></a>
                    <a href="#"><i class="fab fa-apple"></i></a>
                    <a href="#"><i class="fab fa-facebook"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                </div>
            </div>
        </div>
    </main>
    <script src="script.js"></script>
</body>
</html>
