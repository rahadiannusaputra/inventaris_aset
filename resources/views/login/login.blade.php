<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.88.1">
    <title>Sistem Informasi Inventaris</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/sign-in/">

    <link href={{ asset('vendor/fontawesome-free/css/all.min.css') }} rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Bootstrap core CSS -->
    <link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;

        }

        * {
            font-family: 'Nunito', sans-serif;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }

    </style>


    <!-- Custom styles for this template -->
    <link href="css/signin.css" rel="stylesheet">
</head>

<main class="form-signin">

    <body class="text-center">

        <form action="/login" method="POST">
            @csrf
            <h1 class="h3 mb-3 fw-normal">Sistem Informasi Inventaris</h1>
            {{-- Alert Logout --}}
            @if (session()->has('loginError'))
                <div class="alert alert-danger alert dismissible fade show" role="alert">
                    {{ session('loginError') }}

                </div>
            @endif

            <div class="form-floating mb-3">
                <input type="text" value="{{ old('nip') }}" name="nip"
                    class="form-control @error('nip') is-invalid @enderror" id="nip" placeholder="text">
                <label for="nip">NIP</label>
                @error('nip')
                    <div class="invalid-feedback text-left" style="text-align: left !important;">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-floating">
                <input type="password" name="password" class="form-control @error('password') is-invalid @enderror"
                    id="password" placeholder="password">
                <label for="password">Password</label>
                @error('password')
                    <div class="invalid-feedback" style="text-align: left !important;">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>
            <p class="mt-5 mb-3 text-muted">&copy; Dinas Komunikasi dan Informatika 2022</p>
        </form>
</main>



</body>

</html>
