<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,
  initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Aplikasi Pantau Siswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
    </script>
</head>

<body>
    <nav class="navbar navbar-expand-lg p-5 bg-body-tertiary">
        <div class="container-fluid">
            <div class="me-5">
                <a class="navbar-brand" href="{{route('dashboard')}}">
                    <img src="data:image/jpeg;base64,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" alt="Logo" width="60" height="54" class="d-inline-block align-text-top">
                    <b class="fs-3">Toko Printer</b>
                </a>
            </div>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-5 me-auto mb-2 mb-lg-0">
                    @if(Auth::user()->role=='masteradmin')
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/user/tampil">User</a>
                    </li>
                    @endif

                    @if(Auth::user()->role=='masteradmin' or Auth::user()->role=='admin')
                    <li class="nav-item">
                        <a class="nav-link" href="/produk/tampil">Produk</a>
                    </li>
                    @endif

                    <li class="nav-item">
                        <a class="nav-link" href="/pembelian/tampil">Pembelian</a>
                    </li>
                </ul>
                <ul class="navbar-nav">
                    <li>
                        <form class="d-flex" role="search">
                            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                            <button class="btn btn-outline-success" type="submit">Search</button>
                        </form>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <b class="text-primary">{{ Auth::user()->email}}</b>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="p-2 bg-info text-bold">Level: {{ Auth::user()->role}}</li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li class="p-2"><a href="{{route('actionlogout')}}"><button class="btn btn-outline-success" type="submit">Log Out</button></a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <p class="p-2">@yield('konten')</p>
</body>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

</html>