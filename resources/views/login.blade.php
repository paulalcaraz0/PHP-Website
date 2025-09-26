<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Login | UISOCIAL</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

<style>
    body {
        background: #f7f7f9;
        min-height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
        font-family: 'Segoe UI', sans-serif;
    }

    /* Card with hover lift */
    .login-card {
        width: 900px;
        max-width: 95%;
        background: #fff;
        border-radius: 20px;
        box-shadow: 0 15px 40px rgba(0,0,0,0.1);
        display: flex;
        overflow: hidden;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    .login-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 25px 60px rgba(0,0,0,0.2);
    }

    /* Left image panel */
    .login-left {
        width: 45%;
        background: url('/3ff7505f-1300-4e91-a01c-1e4bb41060c0.jpg') center/cover no-repeat;
    }

    /* Right form panel */
    .login-right {
        width: 55%;
        padding: 60px 50px;
        display: flex;
        flex-direction: column;
        justify-content: center;
    }
    .login-right h1 {
        font-size: 1.1rem;
        font-weight: 700;
        text-transform: uppercase;
        margin-bottom: 0.25rem;
    }
    .login-right h2 {
        font-size: 1.9rem;
        font-weight: 700;
        margin-bottom: .25rem;
    }
    .login-right p {
        color: #555;
        margin-bottom: 2rem;
    }

    /* Inputs with focus glow */
    .form-control {
        border-radius: 12px;
        padding: 0.75rem 1rem;
        margin-bottom: 1rem;
        border: 2px solid #ddd;
        transition: border 0.3s ease, box-shadow 0.3s ease;
    }
    .form-control:focus {
        border-color: #ff4b2b;
        box-shadow: 0 0 10px rgba(255, 75, 43, 0.6);
        outline: none;
    }

    /* Login button with hover animation */
    .btn-login {
        width: 100%;
        background: #ff4b2b;
        border: none;
        color: #fff;
        font-weight: 600;
        border-radius: 12px;
        padding: 0.75rem;
        margin-bottom: 1.5rem;
        transition: box-shadow 0.3s ease, transform 0.3s ease, background 0.3s ease;
    }
    .btn-login:hover {
        background: #e04326;
        box-shadow: 0 0 15px rgba(255, 75, 43, 0.7);
        transform: translateY(-2px);
    }

    /* Google button with hover shadow */
    .btn-google {
        width: 100%;
        border: 1px solid #ddd;
        border-radius: 12px;
        padding: 0.75rem;
        background: #fff;
        color: #555;
        font-weight: 500;
        transition: box-shadow 0.3s ease, transform 0.3s ease;
    }
    .btn-google:hover {
        box-shadow: 0 0 15px rgba(66, 133, 244, 0.5);
        transform: translateY(-2px);
    }

    .or-divider {
        text-align: center;
        margin-bottom: 1.5rem;
        color: #888;
    }

    /* Responsive */
    @media (max-width: 900px) {
        .login-card { flex-direction: column; }
        .login-left, .login-right { width: 100%; height: 220px; }
        .login-right { padding: 40px 30px; }
    }
</style>
</head>
<script>
/**
 * If the page was restored from bfcache (event.persisted)
 * or the navigation type is back/forward, reload so we fetch a fresh CSRF token.
 */
window.addEventListener('pageshow', function (event) {
  var navEntries = (performance && performance.getEntriesByType)
    ? performance.getEntriesByType('navigation')
    : [];
  var navType = (navEntries && navEntries.length) ? navEntries[0].type : null;

  if (event.persisted || navType === 'back_forward') {
    // Use replace so we do not add another history entry
    window.location.replace(window.location.href);
  }
});
</script>
<body>

<div class="login-card">
    <div class="login-left"></div>

    <div class="login-right">
        <h1>WELCOME!</h1>
        <h2>Log-In Page</h2>
        <p>Welcome to JAPAN</p>

        <form method="POST" action="{{ route('login') }}">
            @csrf
            <input type="email" name="email" class="form-control" placeholder="Email" required>
            <input type="password" name="password" class="form-control" placeholder="Password" required>
            <button type="submit" class="btn btn-login">Login</button>
        </form>

        <div class="or-divider">or</div>

        <a href="{{ route('google.redirect') }}" class="btn btn-google">
            <i class="fab fa-google me-2"></i>Login with Google
        </a>
    </div>
</div>

</body>
</html>
