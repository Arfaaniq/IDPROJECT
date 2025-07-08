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
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&display=swap" rel="stylesheet">
        <style>
            body {
                font-family: 'Inter', sans-serif;
            }
            .login-container {
                background-color: #f8f9fa;
            }
            .login-title {
                color: red;
                font-weight: bold;
                margin-bottom: 1.5rem;
            }
            .form-input {
                width: 100%;
                margin-top: 0.5rem;
                padding: 0.5rem;
                border-radius: 0.25rem;
                border: 1px solid #ced4da;
            }
            .btn-login {
                background-color: red;
                color: white;
                padding: 0.5rem 1rem;
                border-radius: 0.25rem;
                border: none;
            }
        </style>
    </head>
    <body>
        <section class="vh-100 login-container">
            <div class="container h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-md-8 col-lg-7 col-xl-6">
                        <img src="/images/logologin.svg" class="img-fluid" alt="Login image">
                    </div>
                    <div class="col-md-7 col-lg-5 col-xl-5 offset-xl-1">
                        <form action="{{ route('admin.login') }}" method="POST">
                            @csrf
                            <h1 class="text-left login-title">ADMIN LOGIN</h1>

                            <!-- Error Messages -->
                            @if ($errors->any())
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <h2 class="bi bi-exclamation-triangle"> Perhatian!</h2>
                                @foreach ($errors->all() as $error)
                                <p>{{ $error }}</p>
                                @endforeach
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                            @endif

                            <!-- Email -->
                            <div class="mb-4">
                                <label for="email" class="form-label">Email</label>
                                <input id="email" class="form-input" type="email" name="email" 
                                    value="{{ old('email') }}" required autofocus autocomplete="username">
                                @error('email')
                                    <div class="text-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Password -->
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input id="password" class="form-input" type="password" name="password" 
                                    required autocomplete="current-password">
                                @error('password')
                                    <div class="text-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Remember Me -->
                            <div class="mb-3 form-check">
                                <input id="remember_me" type="checkbox" class="form-check-input" name="remember">
                                <label for="remember_me" class="form-check-label">Remember me</label>
                            </div>

                            <!-- Login Button and Forgot Password -->
                            <div class="d-flex justify-content-between align-items-center">
                                @if (Route::has('password.request'))
                                <a class="text-decoration-none" href="{{ route('password.request') }}">
                                    Forgot your password?
                                </a>
                                @endif
                                <button type="submit" class="btn btn-login">
                                    Log in
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </body>
    </html>