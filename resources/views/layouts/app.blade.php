<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<style>
  .error {
    color: red;
  }
</style>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Ticket Support System') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">
                    
                    @if(auth()->check())

                    <li class="nav-item">

                        <a class="nav-link" href="{{ route('tickets') }}">
    

                            <!-- Currently we have two roles only -->
                            @if(auth()->user()->role == config('constants.user_role') )

                            {{ __('My Tickets') }}

                            @else

                            {{ __('Ticket List') }}

                            @endif

                        </a>

                    </li>
                    
                    @endif

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>


<!-- jquery form validation rules plugin -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
<script>
  $(document).ready(function () {
    $('#support-ticket').validate({
      rules: {
        title: {
          required: true
        },
        // description: {
        //   required: false,
        // },
        // contact: {
        //   required: true,
        //   rangelength: [10, 12],
        //   number: true
        // },
        // password: {
        //   required: true,
        //   minlength: 8
        // },
        // confirmPassword: {
        //   required: true,
        //   equalTo: "#password"
        // }
      },
      messages: {
        title: 'Please enter title.',
        
        // contact: {
        //   required: 'Please enter Contact.',
        //   rangelength: 'Contact should be 10 digit number.'
        // },
        // password: {
        //   required: 'Please enter Password.',
        //   minlength: 'Password must be at least 8 characters long.',
        // },
        // confirmPassword: {
        //   required: 'Please enter Confirm Password.',
        //   equalTo: 'Confirm Password do not match with Password.',
        // }
      },
      submitHandler: function (form) {
        form.submit();
      }
    });
  });
</script>
</html>
