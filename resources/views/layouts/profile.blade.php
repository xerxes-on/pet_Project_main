@extends('static')
@section('content')
    <main>
        <div class="flex w-auto
        justify-between mb-5">
            <h1 class="text-4xl flex">Profile </h1>
            <a href="./edit_profile" class="edit-profile ml=Z">
                Edit Profile
                <i class="fas fa-pencil-alt"></i>
            </a>
        </div>
        <section class="profile-card">
            <div class="profile-header">
                <div class="flex w-2/3">
                    <img src="./assets/images/user_pics/{{$user_info->profile_picture}}" alt="User Name" class="profile-avatar max-w-48">
                    <div class="profile-info">
                        <h2>{{ $user_info->name}}</h2>
                        <div class="profile-stats">
                            <div class="stat"><span>{{ count($user_info->books) }}</span> Books</div>
                            <div class="stat"><span>1,245</span> Friend's</div>
                            <div class="stat"><span>8</span> Following</div>
                        </div>
                        <p class="text-xl">Details</p>
                        <p>Joined in Month {{ $user_info->created_at->format('d-m-Y')}}</p>
                        <p><span class="text-blue block">Favorite  GENRES:</span>
{{--                            @foreach($user_info->) @endforeach   --}}
                            Fav ganres here
                        </p>
                    </div>
                </div>
                <div class="favorite-book p-5">
                    <h3>MY FAVORITE BOOK</h3>
                    <img src="./assets/images/fav-book.png" alt="Favorite Book">
                    <button class="add-book"><i class="fas fa-plus text-2xl text-white"></i></button>
                </div>
            </div>
            <div class="profile-details flex">
                <div>
                    <p class="m-5">
                        @if($user_info->gender == 1)
                            Male
                        @elseif($user_info->gender == 2)
                            Female
                        @else
                            Not Specified
                        @endif
                        , City, Country</p>
                    <p class="m-5"><i class="fas fa-birthday-cake"></i> Birth Day : {{ $user_info->date_of_birth}}</p>
                </div>

                <div class=" flex flex-col justify-around">
                    <h3 class="mb-5">My BookShelves</h3>
                    <div class="shelf-buttons ">
                        <a href="" class="">Read <span class="block ml-4">(11)</span></a>
                        <a href="">Currently Reading <span class="block ml-10">(01)</span></a>
                        <a href="">To Read <span class="block ml-5">(00)</span></a>
                    </div>
                </div>
            </div>

        </section>

        <section class="reading-section">
            <h2>Reading</h2>
            <div class="book-progress relative">
                <img src="./assets/images/current.png" alt="Current Book">
                <div class="book-info w-full flex justify-between items-center">
                    <div class="w-1/5 h-40 flex justify-evenly flex-col items-center">
                        <h1 class="text-2xl">Book Name</h1>
                        <p class="block">Author Name</p>
                        <div class="rating">
                            <i class="fa-solid fa-star" style="color: #FFD43B;"></i>
                            <i class="fa-solid fa-star" style="color: #FFD43B;"></i>
                            <i class="fa-solid fa-star" style="color: #FFD43B;"></i>
                            <i class="fa-solid fa-star" style="color: #FFD43B;"></i>
                            <i class="fa-solid fa-star"></i>
                        </div>
                    </div>
                    <div class="progress-bar flex">
                        <div class="progress" style="width: 83%; border-radius: 20px;"></div>
                    </div>
                    <button class="continue-reading mr-16">Continue</button>
                </div>
            </div>
        </section>

        <section class="statistics-section">
            <h2>This Week Statistics</h2>
            <div class="statistics-container">
                <div class="chart">
                    <!-- We'll use CSS to create the bar chart -->
                </div>
                <div class="premium-ad">
                    <img src="logo.png" alt="Logo Name" class="small-logo">
                    <h3>Go Premium</h3>
                    <p>Explore 25k+ Books with lifetime membership</p>
                    <button class="premium-button">Go Premium</button>
                </div>
            </div>
        </section>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
                <button class="logout-button">Logout</button>
        </form>
@endsection

