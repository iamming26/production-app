<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Login - PT Padma Soode</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" />
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <style>
    body {
      background-color: #dbeafe;
    }

    .login-wrapper {
      display: flex;
      flex-direction: column;
      align-items: center;
      margin-top: 5rem;
    }

    .logo-wrapper {
      background: #ffffff;
      padding: 1rem;
      border-radius: 50%;
      box-shadow: 0 0 15px rgba(0, 0, 0, 0.15);
      z-index: 2;
      margin-bottom: -40px;
    }

    .login-logo {
      height: 30px;
      width: auto;
      display: block;
    }

    .login-card {
      background-color: #1e3a8a;
      color: white;
      border: none;
      border-radius: 1rem;
      box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
      width: 100%;
      max-width: 450px;
      z-index: 1;
      position: relative;
      padding: 2rem 1.5rem;
    }

    .form-label,
    .form-control {
      color: #fff;
    }

    .form-control::placeholder {
      color: rgba(255, 255, 255, 0.7);
    }

    .form-control {
      background-color: rgba(255, 255, 255, 0.15);
      border: none;
    }

    .form-control:focus {
      background-color: rgba(255, 255, 255, 0.2);
      color: #fff;
    }

    .btn-primary {
      background-color: #2563eb;
      border: none;
    }

    .btn-primary:hover {
      background-color: #1d4ed8;
    }

    .invalid-feedback {
      color: #ffd1d1;
    }
  </style>
</head>
<body>
  <div class="container login-wrapper">
    <!-- Logo dengan card putih -->
    <div class="logo-wrapper">
      <img src="https://www.padmasoode.co.id/assets/img/logo-soode.png" alt="PT Padma Soode Logo" class="login-logo">
    </div>

    <!-- Card Login -->
    <div class="login-card mt-4">
      <h4 class="text-center mb-4">System Daily Production</h4>
      <form action="{{ route('login') }}" method="POST">
        @csrf
        <div class="mb-3">
          <label for="employee_id" class="form-label">ID Employee</label>
          <input type="text" class="form-control @error('employee_id') is-invalid @enderror" id="employee_id" name="employee_id" value="{{ old('employee_id') }}" placeholder="Enter your ID">
          @error('employee_id')
          <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>

        <div class="mb-3">
          <label for="password" class="form-label">Password</label>
          <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="Enter your password">
          @error('password')
          <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>

        <div class="d-grid mt-4">
          <button type="submit" class="btn btn-primary">Login</button>
        </div>
      </form>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
  @include('alerts')
</body>
</html>
