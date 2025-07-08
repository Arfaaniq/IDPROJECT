<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login Page</title>
    <link rel="icon" href="/images/circle-user-round.svg" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap"
        rel="stylesheet">
</head>

<body>

    <section class="vh-100" style="background-color: #f8f9fa;">
        <div class="container h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-md-8 col-lg-7 col-xl-6">
                    <img src="/images/logologin.svg" class="img-fluid" alt="Sample image">
                </div>
                <div class="col-md-7 col-lg-5 col-xl-5 offset-xl-1">
                    <form action="{{ route('login') }}" method="POST">
                        @csrf
                        <h1 class="text-left fw-bold mb-4" style="color: red;">LOGIN</h1>

                        <!-- Pesan Kesalahan -->
                        @if ($errors->any())
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <h2 class="bi bi-exclamation-triangle"> Perhatian!</h2>

                            @foreach ($errors->all() as $error)
                            <p>{{ $error }}</p>
                            @endforeach
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        @endif
                        <!-- Username input -->
                        <div class="mb-4">
                                <label for="email" class="form-label">Email</label>
                                <input id="email" class="form-input" type="email" name="email" 
                                    value="{{ old('email') }}" required autofocus autocomplete="username">
                                @error('email')
                                    <div class="text-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>

                        <!-- Password input -->
                        <div class="form-outline mb-3">
                            <label class="form-label" for="inputPassword">Password</label>
                            <input type="password" id="inputPassword" name="password"
                                class="form-control form-control-lg" placeholder="Enter password" />
                        </div>

                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <!-- Checkbox -->
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="rememberMe">
                                <label class="form-check-label" for="rememberMe">
                                    Remember me
                                </label>
                            </div>
                        </div>
                        <!-- Login button -->
                        <div class="d-grid">
                            <button type="submit" class="btn btn-danger btn-lg">Login</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</body>
</html>


