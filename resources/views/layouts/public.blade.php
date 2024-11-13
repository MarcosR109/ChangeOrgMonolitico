...
<script async src="{{asset('js/11391265293.js')}}"></script>
...
<div id="content">
    @yield('content')
</div>
...
@php
    use Illuminate\Support\Facades\Auth;
@endphp
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Change.org</title>
    <meta charset="utf‐8">
    <meta name="viewport" content="width=device‐width, initial‐scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
          rel="stylesheet">
    <link href="estilos.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js">
    </script>
</head>
<body>
<nav class="navbar navbar‐expand‐sm bg‐light navbar‐light">
    <div class="container‐fluid">
        <a class="navbar‐brand text‐danger fs‐2" href="{{route('home')}}">Change.org</a>
        <button class="navbar‐toggler" type="button" data‐bs‐toggle="collapse" data‐bs‐
                target="#collapsibleNavbar">
            <span class="navbar‐toggler‐icon"></span>
        </button>
        <div class="collapse navbar‐collapse" id="collapsibleNavbar">
            <ul class="navbar‐nav mx‐auto">
                <li class="nav‐item">
                    <a class="nav‐link fs‐4 m‐2" href="
{{route('peticiones.index')}}">Peticiones</a>
                </li>
                <li class="nav‐item">
                    <a class="nav‐link fs‐4 m‐2" href="{{route('peticiones.create')}}">Inicia
                        una petición</a>
                </li>
                <?php if (Auth::check()){ ?>
                <li class="nav‐item">
                    <a class="nav‐link fs‐4 m‐2" href="{{route('peticiones.mine')}}">Mis
                        No olvides añadir los correspodientes assets (js,css...) en tu public/ folder.
                        No olvides añadir en routes/web.php el código necesario para que reconozca las rutas: home,
                        peticiones.create, peticiones.mine, etc...
                        Dicho archivo routes/web.php , podrá quedar de momento:
                        peticiones</a>
                </li>
                ...
                ...
                //FALTA CÓDIGO A COMPLETAR


            </ul>
        </div>
        <?php }else{ ?>
        <a class="nav‐link fs‐5 m‐2 link‐danger" href="">Register</a>
        <a class="nav‐link fs‐5 m‐2 link‐danger" href="">Login</a>
        <?php } ?>
    </div>
</nav>
@yield('content')
<footer class="text‐center text‐lg‐start bg‐light text‐muted">
    ... //FALTA CÓDIGO A COMPLETAR
    ...
</footer>
<script src="{{asset('vendor/assets/vendors/js/vendor.bundle.base.js')}}"></script>
<script src="{{asset('vendor/assets/vendors/js/vendor.bundle.addons.js')}}"></script>
<!‐‐ endinject ‐‐>
<!‐‐ Plugin js for this page‐‐>
<!‐‐ End plugin js for this page‐‐>
<!‐‐ inject:js ‐‐>
<script src="{{asset("vendor/assets/js/shared/off‐canvas.js")}}"></script>
<script src="{{asset("vendor/assets/js/shared/misc.js")}}"></script>
<!‐‐ endinject ‐‐>
<!‐‐ Custom js for this page‐‐>
<script src="{{asset("vendor/assets/js/demo_1/dashboard.js")}}"></script>
</body>
</html>
