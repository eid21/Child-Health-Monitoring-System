<x-guest-layout>
    <div class="login-container">
        <div class="login-card">
            <div class="login-header">
                <!-- استبدال شعار Laravel بأيقونة نصية -->
                <div class="custom-logo">
                    <i class="fas fa-child"></i>
                    <span class="logo-text">weightless children</span>
                </div>
                <h2 class="login-title">Welcome Back</h2>
                <p class="login-subtitle">Sign in to your account</p>
            </div>
            
            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />
            
            <form method="POST" action="{{ route('login') }}">
                @csrf
                
                <!-- Email Address -->
                <div class="form-group">
                    <x-input-label for="email" :value="__('Email')" class="form-label" />
                    <div class="input-with-icon">
                        <i class="fas fa-envelope"></i>
                        <x-text-input id="email" class="form-input" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                    </div>
                    <x-input-error :messages="$errors->get('email')" class="error-message" />
                </div>
                
                <!-- Password -->
                <div class="form-group">
                    <x-input-label for="password" :value="__('Password')" class="form-label" />
                    <div class="input-with-icon">
                        <i class="fas fa-lock"></i>
                        <x-text-input id="password" class="form-input" type="password" name="password" required autocomplete="current-password" />
                    </div>
                    <x-input-error :messages="$errors->get('password')" class="error-message" />
                </div>
                
                <!-- Remember Me -->
                <div class="form-checkbox">
                    <label for="remember_me" class="checkbox-label">
                        <input id="remember_me" type="checkbox" class="checkbox-input" name="remember">
                        <span class="checkbox-text">{{ __('Remember me') }}</span>
                    </label>
                </div>
                
                <div class="form-actions">
                    <button type="submit" class="login-button">
                        <i class="fas fa-sign-in-alt"></i> {{ __('Log in') }}
                    </button>
                </div>
                
            </form>
        </div>
    </div>
</x-guest-layout>

<!-- Font Awesome for icons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

<style>
    /* Import modern font */
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');

    /* Ensure box-sizing for all elements */
    *, *:before, *:after {
        box-sizing: border-box;
    }
    
    /* Override any Laravel logo styles that might exist in the default template */
    .shrink-0 svg,
    .application-logo,
    .application-mark,
    .auth-card svg,
    .auth-logo svg,
    .logo-svg,
    svg[width="50"] {
        display: none !important;
    }
    
    /* Login Container */
    .login-container {
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 80vh;
        padding: 2rem;
        background-color: #f8f9fa;
    }
    
    .login-card {
        width: 100%;
        max-width: 450px;
        padding: 2.5rem;
        background-color: white;
        border-radius: 15px;
        box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
    }
    
    /* Custom Logo */
    .custom-logo {
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 1.5rem;
        font-size: 1.5rem;
        color: #4f46e5;
    }
    
    .custom-logo i {
        font-size: 2rem;
        margin-right: 0.5rem;
    }
    
    .logo-text {
        font-weight: 700;
        letter-spacing: 0.5px;
    }
    
    /* Login Header */
    .login-header {
        text-align: center;
        margin-bottom: 2rem;
    }
    
    .login-title {
        font-size: 1.75rem;
        font-weight: 700;
        color: #333;
        margin-bottom: 0.5rem;
    }
    
    .login-subtitle {
        color: #6c757d;
        font-size: 0.95rem;
    }
    
    /* Form Elements */
    .form-group {
        margin-bottom: 1.5rem;
        width: 100%;
    }
    
    .form-label {
        display: block;
        margin-bottom: 0.5rem;
        font-weight: 500;
        color: #555;
    }
    
    .input-with-icon {
        position: relative;
        width: 100%;
    }
    
    .input-with-icon i {
        position: absolute;
        left: 1rem;
        top: 50%;
        transform: translateY(-50%);
        color: #adb5bd;
        font-size: 1rem;
    }
    
    .form-input {
        width: 100%;
        padding: 0.75rem 1rem 0.75rem 2.75rem;
        border: 1px solid #e1e5eb;
        border-radius: 8px;
        font-size: 1rem;
        transition: all 0.3s ease;
        height: 3.25rem;
    }
    
    .form-input:focus {
        border-color: #4f46e5;
        box-shadow: 0 0 0 4px rgba(79, 70, 229, 0.1);
        outline: none;
    }
    
    .error-message {
        color: #dc3545;
        font-size: 0.85rem;
        margin-top: 0.5rem;
    }
    
    /* Checkbox */
    .form-checkbox {
        margin-bottom: 1.5rem;
    }
    
    .checkbox-label {
        display: flex;
        align-items: center;
        cursor: pointer;
    }
    
    .checkbox-input {
        width: 16px;
        height: 16px;
        margin-right: 0.5rem;
        accent-color: #4f46e5;
    }
    
    .checkbox-text {
        font-size: 0.9rem;
        color: #6c757d;
    }
    
    /* Form Actions */
    .form-actions {
        display: flex;
        justify-content: center;
        align-items: center;
        margin-bottom: 1.5rem;
    }
    
    .login-button {
        background-color: #4f46e5;
        color: white;
        border: none;
        border-radius: 8px;
        padding: 0.75rem 1.5rem;
        font-size: 0.95rem;
        font-weight: 500;
        cursor: pointer;
        transition: all 0.3s ease;
        display: flex;
        align-items: center;
        gap: 0.5rem;
        width: 100%;
        justify-content: center;
    }
    
    .login-button:hover {
        background-color: #4338ca;
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(79, 70, 229, 0.4);
    }
    
    /* Register Link */
    .register-link {
        text-align: center;
        font-size: 0.9rem;
        color: #6c757d;
    }
    
    .register-link a {
        color: #4f46e5;
        text-decoration: none;
        font-weight: 500;
    }
    
    .register-link a:hover {
        text-decoration: underline;
    }
    
    /* Responsive */
    @media (max-width: 576px) {
        .login-card {
            padding: 1.5rem;
        }
        
        .form-actions {
            flex-direction: column;
            gap: 1rem;
        }
        
        .login-button {
            width: 100%;
            justify-content: center;
        }
    }
</style>