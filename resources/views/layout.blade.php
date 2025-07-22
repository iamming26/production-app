<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>System Daily Production</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" />
<<<<<<< HEAD
<!-- SweetAlert2 CDN -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
=======
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

>>>>>>> dev-romi
  <style>
    body {
      background-color: #f8f9fa;
    }

<<<<<<< HEAD
=======
    #sidebar {
      z-index: 1030; /* appear above backdrop */
      transition: transform 0.3s ease-in-out;
  }


>>>>>>> dev-romi
    .sidebar {
      min-height: 100vh;
      background-color: #212529;
      display: flex;
      flex-direction: column;
      padding-top: 1rem;
    }

    .sidebar .nav-link {
      color: #adb5bd;
      padding: 0.75rem 1.25rem;
    }

    .sidebar .nav-link.active,
    .sidebar .nav-link:hover {
      background-color: #343a40;
      color: #fff;
    }

    .sidebar .logout {
      margin-top: auto;
      border-top: 1px solid #495057;
      padding-top: 1rem;
    }

    .card {
      border-radius: 0.75rem;
    }

    .navbar-custom {
      background-color: #ffffff;
      border-bottom: 1px solid #dee2e6;
    }

    .table thead {
      background-color: #e9ecef;
    }
  </style>
</head>
<body>

<div class="container-fluid">
  <div class="row">
    <!-- Sidebar -->
    
    @include('sidebar')

    <!-- Main Content -->
    <main class="col-md-10 ms-sm-auto px-0">
      
      <!-- Top Navbar -->
<<<<<<< HEAD
      <nav class="navbar navbar-expand navbar-light navbar-custom px-4">
        <div class="container-fluid">
          <span class="ms-auto text-muted">{{ Auth::user()->role }} - <strong>{{ Auth::user()->name }}</strong></span>
        </div>
      </nav>
=======
      @include('topbar')
>>>>>>> dev-romi

      <!-- Content Wrapper -->
      <div class="p-4">
        <!-- Cards -->

        @yield('content')

      </div>
    </main>
  </div>
</div>
<<<<<<< HEAD
=======
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const toggleBtn = document.getElementById("sidebarToggle");
        const sidebar = document.getElementById("sidebar");

        toggleBtn.addEventListener("click", function () {
            sidebar.classList.toggle("d-none");
        });
    });
</script>
>>>>>>> dev-romi
@yield('footer')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>