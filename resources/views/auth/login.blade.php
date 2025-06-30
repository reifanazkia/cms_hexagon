<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login - CMS Hexagon</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> <!-- Tambahkan ini -->
</head>
<body>
    <div class="d-flex justify-content-center align-items-center vh-100">
        <div class="card p-4" style="min-width: 400px;">
            <h3 class="text-center mb-3">LOGIN</h3>

            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="mb-3">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control" required autofocus>
                </div>
                <div class="mb-3">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control" required>
                </div>
                <div class="d-grid">
                    <button class="btn btn-primary">Login</button>
                </div>
            </form>

            <div class="mt-3 text-center">
                <span>Don't have an account?</span>
                <a href="{{ route('register') }}">Register here</a>
            </div>
            <div class="text-center mt-3">
                <a href="{{ route('password.request') }}">Forget password?</a>
            </div>
        </div>
    </div>

    <!-- Notifikasi SweetAlert -->
    @if (session('status'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Success',
                text: "{{ session('status') }}",
                confirmButtonText: 'OK'
            });
        </script>
    @endif

    @if ($errors->any())
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Login Failed',
                html: `{!! implode('<br>', $errors->all()) !!}`,
                confirmButtonText: 'Try Again'
            });
        </script>
    @endif
</body>
</html>
