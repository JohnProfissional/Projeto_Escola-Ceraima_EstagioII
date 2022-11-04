

<!DOCTYPE html>
<html>
<head>
    <title>GRUPO ESCOLAR COLONIA AGRICOLA DE CERAIMA</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <nav class="navbar navbar-light navbar-expand-lg mb-5" style="background-color: #e3f2fd;">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">{{ __('Dashboard') }}</div>
                            <a class="navbar-brand mr-auto" href="#">PositronX</a>
                            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                        </div>
                        <div class="collapse navbar-collapse" id="navbarNav">
                            <ul class="navbar-nav">
                                @guest
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">Logar</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register-user') }}">Registrar</a>
                                </li>
                                @else
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('signout') }}">Sair</a>
                                </li>
                                @endguest
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
                
    </nav>
    @yield('content')

</body>

</html>