<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Control - @yield('title', 'Administrador')</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Estilos personalizados -->
    <link rel="icon" href="{{ asset('images.png') }}">
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .sidebar {
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            width: 250px;
            background-color: #343a40;
            color: #fff;
        }
        .sidebar a {
            color: #fff;
            text-decoration: none;
            display: block;
            padding: 15px;
            border-bottom: 1px solid #495057;
        }
        .sidebar a:hover {
            background-color: #495057;
        }
        .content {
            margin-left: 250px;
            padding: 20px;
        }
        .navbar-dark .navbar-brand {
            color: #fff;
        }
        .navbar-dark .navbar-brand:hover {
            color: #ddd;
        }
    </style>
</head>
<body>
<!-- Sidebar -->
<div class="sidebar">
    <h4 class="text-center py-3">Admin Panel</h4>
    <a href="">Dashboard</a>
    <a href="">Gestionar Peticiones</a>
    <a href="">Categorías</a>
    <a href="">Usuarios</a>
    <a href="">Configuración</a>
    <a href="" onclick="return confirm('¿Cerrar sesión?')">Cerrar Sesión</a>
</div>

<!-- Content Wrapper -->
<div class="content">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="">Panel de Control</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="">Volver al Sitio</a></li>
                    <li class="nav-item"><a class="nav-link" href="">Cerrar Sesión</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Contenido Principal -->
    <div class="container my-4">
        @yield('content')
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
