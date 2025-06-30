<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Auth Layout</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="d-flex justify-content-center align-items-center vh-100 bg-light">
        <div class="card p-4 shadow" style="min-width: 400px;">
            @yield('content')
        </div>
    </div>
</body>
</html>
