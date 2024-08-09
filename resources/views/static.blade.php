<x-header-main>Profile</x-header-main>
    @if( session('message'))
        <div class=" absolute top-24 left-16 alert bg-green-700 text-white rounded-3xl p-4 w-96" id="message">
          <span>{{ session('message')}}</span>
      </div>
    @endif
    @yield('content')
<x-footer></x-footer>
