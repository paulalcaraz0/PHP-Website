<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Login | PAGE</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

<style>
    body {
        background: url('/3ff7505f-1300-4e91-a01c-1e4bb41060c0.jpg') center/cover no-repeat fixed;
        min-height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
        font-family: 'Segoe UI', sans-serif;
        padding: 20px;
    }
    /* Card with hover lift */
    .login-card {
        border: white 15px solid;
        width: 900px;
        max-width: 95%;
        background: #fff;
        border-radius: 20px;
        box-shadow: 0 15px 40px rgba(0,0,0,0.1);
        display: flex;
        overflow: hidden;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        min-height: 500px;
    }
    .login-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 25px 60px 30px rgba(0,0,0,0.3);
    }

    /* Left image panel */
    .login-left {
        width: 45%;
        background: url('/3ff7505f-1300-4e91-a01c-1e4bb41060c0.jpg') center/cover no-repeat;
        min-height: 400px;
    }

    /* Right form panel */
    .login-right {
        width: 55%;
        padding: 60px 50px;
        display: flex;
        flex-direction: column;
        justify-content: center;
        min-height: 400px;
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
    
    /* Error state for inputs */
    .form-control.is-invalid {
        border-color: #dc3545;
        box-shadow: 0 0 10px rgba(220, 53, 69, 0.3);
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
        transition: box-shadow 0.3s ease, transform 0.3s ease, background 0.3s ease;
        text-decoration: none;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .btn-google:hover {
        box-shadow: 0 0 15px rgba(66, 133, 244, 0.5);
        background: rgba(66, 133, 244, 0.1);
        color: #4285f4;
        transform: translateY(-2px);
        text-decoration: none;
    }

    .or-divider {
        text-align: center;
        margin-bottom: 1.5rem;
        color: #888;
    }

    /* Error message styling */
    .alert {
        border-radius: 12px;
        margin-bottom: 1.5rem;
        padding: 0.75rem 1rem;
        font-size: 0.9rem;
    }
    
    .alert-danger {
        background-color: #f8d7da;
        border: 1px solid #f5c6cb;
        color: #721c24;
    }

    /* Mobile First Responsive Design */
    @media (max-width: 1024px) {
        .login-card {
            width: 100%;
            max-width: 800px;
        }
        
        .login-left {
            width: 40%;
        }
        
        .login-right {
            width: 60%;
            padding: 40px 30px;
        }
    }

    @media (max-width: 768px) {
        body {
            padding: 10px;
            align-items: flex-start;
            padding-top: 50px;
        }
        
        .login-card {
            flex-direction: column;
            width: 100%;
            max-width: 500px;
            min-height: auto;
        }
        
        .login-left {
            width: 100%;
            height: 200px;
            min-height: 200px;
        }
        
        .login-right {
            width: 100%;
            padding: 30px 25px;
            min-height: auto;
        }
        
        .login-right h1 {
            font-size: 1rem;
        }
        
        .login-right h2 {
            font-size: 1.5rem;
        }
    }

    @media (max-width: 480px) {
        body {
            padding: 5px;
            padding-top: 30px;
        }
        
        .login-card {
            max-width: 100%;
            border-radius: 15px;
        }
        
        .login-left {
            height: 150px;
            min-height: 150px;
        }
        
        .login-right {
            padding: 25px 20px;
        }
        
        .login-right h1 {
            font-size: 0.9rem;
        }
        
        .login-right h2 {
            font-size: 1.3rem;
        }
        
        .form-control {
            padding: 0.65rem 0.8rem;
            font-size: 0.9rem;
        }
        
        .btn-login, .btn-google {
            padding: 0.65rem;
            font-size: 0.9rem;
        }
        
        .alert {
            font-size: 0.8rem;
            padding: 0.6rem 0.8rem;
        }
    }

    @media (max-width: 320px) {
        .login-right {
            padding: 20px 15px;
        }
        
        .login-right h2 {
            font-size: 1.2rem;
        }
        
        .form-control {
            padding: 0.6rem 0.7rem;
            font-size: 0.85rem;
        }
        
        .btn-login, .btn-google {
            padding: 0.6rem;
            font-size: 0.85rem;
        }
    }

    /* Ensure buttons are always visible */
    .btn-google {
        min-height: 45px;
        box-sizing: border-box;
    }
    
    .btn-login {
        min-height: 45px;
        box-sizing: border-box;
    }
</style>
</head>
<script>
// If the page was restored from bfcache (event.persisted) or the navigation type is back/forward, reload so we fetch a fresh CSRF token.
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
        <p>Welcome to Log-In Page</p>

        {{-- Display validation errors --}}
        @if ($errors->any())
            <div class="alert alert-danger">
                <i class="fas fa-exclamation-triangle me-2"></i>
                @foreach ($errors->all() as $error)
                    {{ $error }}
                @endforeach
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf
            <input type="email" 
                   name="email" 
                   class="form-control @error('email') is-invalid @enderror" 
                   placeholder="Email" 
                   value="{{ old('email') }}" 
                   required>
            
            <input type="password" 
                   name="password" 
                   class="form-control @error('password') is-invalid @enderror" 
                   placeholder="Password" 
                   required>
            
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