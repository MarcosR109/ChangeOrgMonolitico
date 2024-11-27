<!DOCTYPE html>
<html lang="en">
<head>
    <title>Change.org</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="estilos.css" rel="stylesheet">
    <script async src="{{ asset('js/11391265293.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="icon" href="{{ asset('images.png') }}">
</head>
<body>
<style>
    nav * a{
        text-decoration: none;
    }
</style>
<nav class="navbar navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand flex-row text-danger h1" href="{{route('home')}}">Change.org</a>
        <div>
            <a href="{{route('peticiones.create')}}"
               class="me-3 link-danger nav-item link-underline-opacity-0">Inicia
                una petición</a>
            <a href="{{route('peticiones.index')}}"
               class="me-3 link-danger nav-item link-underline-opacity-0">Peticiones</a>
            <a href="#"
               class="me-3 link-danger nav-item link-underline-opacity-0">Programa
                de socios/as</a>
        </div>
    </div>
</nav>

<!-- Contenido de la página -->

    @yield('content')


<!-- Footer -->
<footer class="bg-light text-dark pt-4">
    <div class="container">
        <div class="row">
            <!-- Acerca de -->
            <div class="col-md-3 mb-3">
                <h6 class="text-uppercase fw-bold">Acerca de</h6>
                <ul class="list-unstyled">
                    <li><a href="#" class="text-danger">Sobre
                            Change.org</a></li>
                    <li><a href="#" class="text-danger">Impacto</a></li>
                    <li><a href="#" class="text-danger">Empleo</a></li>
                    <li><a href="#" class="text-danger">Equipo</a></li>
                </ul>
            </div>
            <!-- Comunidad -->
            <div class="col-md-3 mb-3">
                <h6 class="text-uppercase fw-bold">Comunidad</h6>
                <ul class="list-unstyled">
                    <li><a href="#" class="text-danger">Blog</a></li>
                    <li><a href="#" class="text-danger">Prensa</a></li>
                    <li><a href="#" class="text-danger">Normas de la
                            Comunidad</a></li>
                </ul>
            </div>
            <!-- Ayuda -->
            <div class="col-md-3 mb-3">
                <h6 class="text-uppercase fw-bold">Ayuda</h6>
                <ul class="list-unstyled">
                    <li><a href="#" class="text-danger">Ayuda</a></li>
                    <li><a href="#"
                           class="text-danger">Privacidad</a></li>

                    <li><a href="#"
                           class="text-danger">Términos</a></li>

                    <li><a href="#" class="text-danger">Política de
                            cookies</a></li>

                    <li><a href="#" class="text-danger">Gestionar
                            cookies</a></li>
                    <li><a href="#"
                           class="text-danger">Términos</a></li>
                    <li> <a href="#"
                            class="text-danger">Cookies</a></li>
                </ul>
            </div>
            <!-- Redes sociales -->
            <div class="col-md-3 mb-3">
                <h6 class="text-uppercase fw-bold">Redes sociales</h6>
                <ul class="list-unstyled">
                    <li><a href="#" class="text-danger">Twitter</a></li>
                    <li><a href="#"
                           class="text-danger">Facebook</a></li>
                    <li><a href="#"
                           class="text-danger">Instagram</a></li>
                </ul>
            </div>
        </div>

        <!-- Copyright and Language Selector -->
        <div
            class="d-flex justify-content-between align-items-center border-top pt-3">
            <p class="mb-0">© 2024, Change.org, PBC</p>
            <p class="mb-0 small">Esta web está protegida por reCAPTCHA
                y por Google <a href="#" class="text-dark">Política de
                    privacidad</a> y <a href="#"
                                        class="text-dark">Normas de uso</a>.</p>
            <select class="form-select form-select-sm"
                    style="width: 150px;">
                <option selected>Español (España)</option>
                <option>Inglés (Estados Unidos)</option>
                <option>Francés (Francia)</option>
                <!-- Agrega más idiomas según sea necesario -->
            </select>
        </div>
    </div>
</footer>

<!-- Scripts adicionales -->
<script src="{{ asset('vendor/assets/vendors/js/vendor.bundle.base.js') }}"></script>
<script src="{{ asset('vendor/assets/vendors/js/vendor.bundle.addons.js') }}"></script>
<script src="{{ asset('vendor/assets/js/shared/off-canvas.js') }}"></script>
<script src="{{ asset('vendor/assets/js/shared/misc.js') }}"></script>
<script src="{{ asset('vendor/assets/js/demo_1/dashboard.js') }}"></script>
</body>
</html>
