<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Institute Manager App (ima) Login</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <style>
        :root {
            --glass-background: rgba(255, 255, 255, 0.2);
            --glass-border: rgba(255, 255, 255, 0.3);
            --glow-color: rgba(255, 255, 255, 0.7);
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f0f2f5;
            background-image: url('{{ asset("assets/admin/img/login-bg.jpg") }}');
            background-size: cover;
            background-position: center;
            overflow: hidden;
        }

        /* Blur Overlay */
        body::before {
        content: "";
        position: absolute;
        inset: 0;
        background: rgba(0, 0, 0, 0.5);
        backdrop-filter: blur(6px);
        -webkit-backdrop-filter: blur(6px);
        z-index: 1;
        }

        /* Bubble Animation */
        .bubbles {
        position: absolute;
        bottom: 0;
        width: 100%;
        height: 100%;
        z-index: 2;
        overflow: hidden;
        }

        .bubble {
        position: absolute;
        bottom: -100px;
        width: 40px;
        height: 40px;
        background: rgba(255, 255, 255, 0.2);
        border-radius: 50%;
        animation: rise 15s infinite ease-in;
        }

        .bubble:nth-child(1) { left: 20%; width: 60px; height: 60px; animation-duration: 18s; }
        .bubble:nth-child(2) { left: 40%; animation-duration: 12s; }
        .bubble:nth-child(3) { left: 60%; width: 70px; height: 70px; animation-duration: 20s; }
        .bubble:nth-child(4) { left: 80%; animation-duration: 16s; }
        .bubble:nth-child(5) { left: 50%; width: 90px; height: 90px; animation-duration: 25s; }

        @keyframes rise {
        0% { transform: translateY(0) scale(0.8); opacity: 0.5; }
        50% { opacity: 1; }
        100% { transform: translateY(-120vh) scale(1.2); opacity: 0; }
        }

        .login-card {
            background: var(--glass-background);
            border: 1px solid var(--glass-border);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            border-radius: 15px !important;
            max-width: 400px;
            box-shadow: 0 8px 32px 0 rgba(0, 0, 0, 0.37);
            animation: fadeIn 1.5s ease-in-out, glow 2s ease-in-out infinite alternate;
            z-index: 10;
            position: relative;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes glow {
            from {
                box-shadow: 0 0 10px var(--glow-color);
            }
            to {
                box-shadow: 0 0 20px var(--glow-color);
            }
        }

        .login-card h2, .login-card a {
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
        }

        .form-control {
            background: rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.3);
            color: #fff;
            transition: all 0.3s ease;
        }

        .form-control:focus {
            background: rgba(255, 255, 255, 0.2);
            border-color: rgba(255, 255, 255, 0.5);
            box-shadow: none;
            color: #fff;
        }

        .form-control::placeholder {
            color: rgba(255, 255, 255, 0.7);
        }

        .input-group-text {
            background: rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.3);
            color: #fff;
        }

        .btn-primary {
            background-color: rgba(255, 255, 255, 0.3);
            border: 1px solid rgba(255, 255, 255, 0.5);
            color: #fff;
            font-weight: bold;
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            background-color: rgba(255, 255, 255, 0.5);
            border-color: rgba(255, 255, 255, 0.7);
            color: #fff;
        }

        .password-toggle {
            cursor: pointer;
            transition: color 0.3s ease;
        }

        .password-toggle i {
            color: rgba(255, 255, 255, 0.7);
        }

        .password-toggle:hover i {
            color: #fff;
        }

        /* Glass Bubbles Animation */
        .bubbles {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 100%;
            overflow: hidden;
            z-index: 1;
        }

        .bubble {
            position: absolute;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            box-shadow: inset 0 0 10px rgba(255, 255, 255, 0.5);
            animation: bubbleUp 25s linear infinite;
        }

        @keyframes bubbleUp {
            0% {
                transform: translateY(0);
                opacity: 0;
            }
            10% {
                opacity: 1;
            }
            90% {
                opacity: 1;
            }
            100% {
                transform: translateY(-100vh);
                opacity: 0;
            }
        }
    </style>
</head>
<body>

    <!-- Bubble Background -->
    <div class="bubbles">
        <div class="bubble"></div>
        <div class="bubble"></div>
        <div class="bubble"></div>
        <div class="bubble"></div>
        <div class="bubble"></div>
        <div class="bubble"></div>
        <div class="bubble"></div>
        <div class="bubble"></div>
        <div class="bubble"></div>
        <div class="bubble"></div>
        <div class="bubble"></div>
        <div class="bubble"></div>
        <div class="bubble"></div>
        <div class="bubble"></div>
        <div class="bubble"></div>
        <div class="bubble"></div>
        <div class="bubble"></div>
        <div class="bubble"></div>
    </div>

    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <div class="login-card p-4 rounded-3 shadow">
            <h2 class="text-center mb-4 text-white">Institute Manager App (ima)</h2>
            <form name="loginForm" action="{{ route('loginAction') }}" method="post">
                @csrf
                <div class="mb-3">
                    <div class="input-group">
                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                        <input type="text"
                            name="user_name"
                            class="form-control @error('user_name') is-invalid @enderror"
                            placeholder="Username"
                            value="{{ old('user_name') }}">
                    </div>
                    <span class="text-danger text-center"> @error('user_name') {{$message}} @enderror </span>
                </div>
                <div class="mb-3">
                    <div class="input-group">
                        <span class="input-group-text"><i class="fas fa-lock"></i></span>
                        <input  class="form-control @error('password') is-invalid @enderror"
                                type="password"
                                name="password"
                                placeholder="Password"
                                id="password"
                                value="{{ old('password') }}">
                        <span class="input-group-text password-toggle" id="password-toggle">
                            <i class="fas fa-eye"></i>
                        </span>
                    </div>
                    <span class="text-danger text-center"> @error('password') {{$message}} @enderror </span>
                </div>
                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-primary mt-3">Sign In</button>
                </div>
                <div class="text-center mt-3">
                    <a href="#" class="text-white text-decoration-none">Forgot Password?</a>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            console.log('Login page loaded successfully!');

            const bubblesContainer = document.querySelector('.bubbles');

            for (let i = 0; i < 15; i++) {
                const bubble = document.createElement('div');
                bubble.classList.add('bubble');

                const size = Math.random() * 60 + 20;
                bubble.style.width = `${size}px`;
                bubble.style.height = `${size}px`;

                bubble.style.left = `${Math.random() * 100}vw`;

                bubble.style.animationDuration = `${Math.random() * 15 + 10}s`;
                bubble.style.animationDelay = `${Math.random() * 5}s`;

                bubblesContainer.appendChild(bubble);
            }

            const passwordInput = document.getElementById('password');
            const passwordToggle = document.getElementById('password-toggle');
            const passwordToggleIcon = passwordToggle.querySelector('i');

            passwordToggle.addEventListener('click', () => {
                const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
                passwordInput.setAttribute('type', type);

                passwordToggleIcon.classList.toggle('fa-eye');
                passwordToggleIcon.classList.toggle('fa-eye-slash');
            });
        });
    </script>

</body>
</html>
