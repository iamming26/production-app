<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bootstrap Login Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body style="background-color: #dbeafe">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
            <div class="card">
                <div class="card-header bg-primary text-white text-center">System Daily Production</div>
                <div class="card-body">
                    <form action="{{ route('login') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="employee_id" class="form-label">ID Employee</label>
                            <input type="text" class="form-control @error('employee_id') is-invalid @enderror" id="employee_id" name="employee_id" value="{{ old('employee_id') }}">
                            @error('employee_id')
                            <div class="invalid-feedback">
                            {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control @error('employee_id') is-invalid @enderror" id="password" name="password">
                            @error('password')
                            <div class="invalid-feedback">
                            {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="d-flex justify-content-center">
                            <button type="submit" class="btn btn-primary">Login</button>
                        </div>
                    </form>
                </div>
            </div>
            </div>
        </div>  
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
    @include('alerts')
</body>
</html>