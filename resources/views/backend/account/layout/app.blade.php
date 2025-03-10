<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Book Review App</title>
    <link rel="stylesheet" href="https://unpkg.com/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
        integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body class="bg-light">
    <div class="container-fluid shadow-lg header">
        <div class="container">
            <div class="d-flex justify-content-between">
                <h1 class="text-center"><a href="index.html" class="h3 text-white text-decoration-none">Book Review
                        App</a></h1>
                @if (Auth::check())
                    <div class="d-flex align-items-center navigation">
                        <a href="register.html" class="text-white ps-2">{{ Auth::user()->name }}</a>
                    </div>
                @else
                    <div class="d-flex align-items-center navigation">
                        <a href="{{ route('login.index') }}" class="text-white">Login</a>
                        <a href="{{ route('register.index') }}" class="text-white ps-2">Register</a>
                    </div>
                @endif
            </div>
        </div>
    </div>
    <section class=" p-3 p-md-4 p-xl-5">
        <div class="container">
            <div class="row justify-content-center">
                {{-- <div class="row my-5">
                       
                        
                    </div> --}}
                @yield('content')
            </div>
        </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="{{ asset('js/main.js') }}"></script>
</body>

</html>
