<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin — Educate Portal</title>
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        :root {
            --c-primary: #059669;
            --grad-primary: linear-gradient(135deg, #059669 0%, #047857 100%);
        }
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background: linear-gradient(135deg, #f0fdf4 0%, #dcfce7 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .login-card {
            background: #ffffff;
            border-radius: 24px;
            box-shadow: 0 20px 40px rgba(5,150,105,0.1);
            overflow: hidden;
            width: 100%;
            max-width: 900px;
            display: flex;
            flex-direction: row;
        }
        .login-visual {
            background: var(--grad-primary);
            flex: 1;
            padding: 40px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            color: #fff;
            text-align: center;
            position: relative;
        }
        .login-visual::before {
            content: '';
            position: absolute;
            inset: 0;
            background: url("data:image/svg+xml,%3Csvg width='80' height='80' viewBox='0 0 80 80' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='%23ffffff' fill-opacity='0.05'%3E%3Cpath d='M40 0l40 40-40 40-40-40z'/%3E%3C/g%3E%3C/svg%3E");
            opacity: 0.5;
        }
        .login-form-container {
            flex: 1;
            padding: 50px 40px;
        }
        .form-control {
            border-radius: 12px;
            padding: 12px 16px;
            border: 1px solid #e2e8f0;
        }
        .form-control:focus {
            box-shadow: 0 0 0 3px rgba(5,150,105,0.2);
            border-color: var(--c-primary);
        }
        .btn-login {
            background: var(--grad-primary);
            color: #fff;
            border: none;
            border-radius: 12px;
            padding: 12px 20px;
            font-weight: 600;
            width: 100%;
            transition: all 0.3s;
        }
        .btn-login:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(5,150,105,0.3);
        }
        @media (max-width: 768px) {
            .login-card { flex-direction: column; max-width: 400px; margin: 20px; }
            .login-visual { padding: 30px; }
        }
    </style>
</head>
<body>

<div class="login-card">
    <div class="login-visual">
        <div style="font-size: 3rem; margin-bottom: 20px;"><i class="bi bi-shield-lock-fill"></i></div>
        <h3 class="fw-bold mb-3">Admin Portal</h3>
        <p style="opacity: 0.8; font-size: 0.9rem;">Masuk ke dashboard untuk mengelola konten website, pendaftaran, dan data master.</p>
    </div>
    <div class="login-form-container">
        <h4 class="fw-bold mb-1" style="color: #064e3b;">Selamat Datang!</h4>
        <p class="text-muted small mb-4">Silakan login menggunakan akun admin Anda.</p>

        @if ($errors->any())
            <div class="alert alert-danger small rounded-3">
                <ul class="mb-0 ps-3">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('login.post') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label class="form-label small fw-semibold text-secondary">Alamat Email</label>
                <div class="input-group">
                    <span class="input-group-text bg-white border-end-0 text-muted"><i class="bi bi-envelope"></i></span>
                    <input type="email" name="email" class="form-control border-start-0" placeholder="admin@example.com" value="{{ old('email') }}" required autofocus>
                </div>
            </div>
            <div class="mb-4">
                <label class="form-label small fw-semibold text-secondary">Password</label>
                <div class="input-group">
                    <span class="input-group-text bg-white border-end-0 text-muted"><i class="bi bi-lock"></i></span>
                    <input type="password" id="password" name="password" class="form-control border-start-0 border-end-0" placeholder="••••••••" required>
                    <button class="btn btn-outline-secondary bg-white border-start-0" type="button" id="togglePassword" style="border-color: #e2e8f0;">
                        <i class="bi bi-eye text-muted" id="toggleIcon"></i>
                    </button>
                </div>
            </div>
            
            <button type="submit" class="btn-login mb-3">Masuk Dashboard</button>
            
            <div class="text-center">
                <a href="{{ url('/') }}" class="text-decoration-none small" style="color: var(--c-primary);"><i class="bi bi-arrow-left me-1"></i> Kembali ke Website</a>
            </div>
        </form>
    </div>
</div>

<script>
    const togglePassword = document.querySelector('#togglePassword');
    const password = document.querySelector('#password');
    const toggleIcon = document.querySelector('#toggleIcon');

    togglePassword.addEventListener('click', function (e) {
        // Toggle the type attribute
        const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
        password.setAttribute('type', type);
        
        // Toggle the icon
        if(type === 'password'){
            toggleIcon.classList.remove('bi-eye-slash');
            toggleIcon.classList.add('bi-eye');
        } else {
            toggleIcon.classList.remove('bi-eye');
            toggleIcon.classList.add('bi-eye-slash');
        }
    });
</script>

</body>
</html>
