<!doctype html>
<html class="no-js" lang="zxx">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Health</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="manifest" href="site.webmanifest">
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('assets')}}/img/favicon.ico">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <!-- CSS here -->
    <link rel="stylesheet" href="{{asset('assets')}}/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{asset('assets')}}/css/owl.carousel.min.css">
    <link rel="stylesheet" href="{{asset('assets')}}/css/slicknav.css">
    <link rel="stylesheet" href="{{asset('assets')}}/css/flaticon.css">
    <link rel="stylesheet" href="{{asset('assets')}}/css/gijgo.css">
    <link rel="stylesheet" href="{{asset('assets')}}/css/animate.min.css">
    <link rel="stylesheet" href="{{asset('assets')}}/css/animated-headline.css">
    <link rel="stylesheet" href="{{asset('assets')}}/css/magnific-popup.css">
    <link rel="stylesheet" href="{{asset('assets')}}/css/fontawesome-all.min.css">
    <link rel="stylesheet" href="{{asset('assets')}}/css/themify-icons.css">
    <link rel="stylesheet" href="{{asset('assets')}}/css/slick.css">
    <link rel="stylesheet" href="{{asset('assets')}}/css/nice-select.css">
    <link rel="stylesheet" href="{{asset('assets')}}/css/style.css">
    @yield('css')
    <style>
    /* تحسين التنسيق العام والخلفية */
    body {
        background: linear-gradient(135deg, #f5f7fa 0%, #e4e9f2 100%) !important;
        font-family: 'Poppins', sans-serif !important;
    }
    
    /* تحسين تنسيق الهيدر */
    .header-area {
        background-color: rgba(255, 255, 255, 0.95) !important;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08) !important;
        border-bottom: 3px solid #28a745 !important;
    }
    
    /* تحسين تنسيق القائمة */
    .main-menu ul li a {
        font-weight: 600 !important;
        color: #333 !important;
        transition: all 0.3s ease !important;
        padding: 35px 18px !important;
    }
    
    .main-menu ul li a:hover {
        color: #28a745 !important;
    }
    
    .main-menu ul li.active a {
        color: #28a745 !important;
    }
    
    /* تحسين تنسيق الشعار */
    .text-logo {
        display: flex !important;
        align-items: center !important;
        font-size: 2.2rem !important;
        font-weight: 800 !important;
        color: #28a745 !important;
        text-decoration: none !important;
        visibility: visible !important;
        opacity: 1 !important;
        text-transform: uppercase !important;
        background: linear-gradient(90deg, #28a745, #75d69c) !important;
        -webkit-background-clip: text !important;
        -webkit-text-fill-color: transparent !important;
        padding: 10px 0 !important;
    }
    
    .text-logo i {
        font-size: 2.8rem !important;
        margin-right: 0.8rem !important;
        color: #28a745 !important;
        -webkit-text-fill-color: #28a745 !important;
        visibility: visible !important;
        opacity: 1 !important;
        filter: drop-shadow(0 2px 4px rgba(0, 0, 0, 0.2)) !important;
    }
    
    .text-logo span {
        letter-spacing: 1px !important;
        visibility: visible !important;
        opacity: 1 !important;
    }
    /* تحسين تنسيق الـ preloader - تحديث كامل */
#preloader-active {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    z-index: 9999;
}

.preloader {
    background: linear-gradient(135deg, #f5f7fa 0%, #e4e9f2 100%) !important;
    height: 100%;
    width: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
}

.preloader-inner {
    position: relative;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
}

.preloader-circle {
    width: 60px !important; /* زيادة حجم الدائرة لتكون متناسقة */
    height: 60px !important;
    border: 3px solid #e4e9f2 !important;
    border-top: 3px solid #28a745 !important;
    border-radius: 50%;
    animation: spin 1s linear infinite;
    margin-bottom: 20px !important;
}

@keyframes spin {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
}

.preloader-img.pere-text {
    display: flex;
    justify-content: center;
    align-items: center;
}

.preloader-logo {
    display: flex !important;
    align-items: center !important;
    justify-content: center !important;
    font-size: 1.8rem !important; /* زيادة حجم الخط ليتناسب مع الدائرة */
    background: linear-gradient(90deg, #28a745, #75d69c) !important;
    -webkit-background-clip: text !important;
    -webkit-text-fill-color: transparent !important;
    font-weight: 700 !important;
}

.preloader-logo i {
    font-size: 2.2rem !important; /* زيادة حجم الأيقونة لتتناسب مع الدائرة */
    color: #28a745 !important;
    -webkit-text-fill-color: #28a745 !important;
    filter: drop-shadow(0 2px 4px rgba(0, 0, 0, 0.2)) !important;
    margin-right: 0.5rem !important;
}

.preloader-logo span {
    letter-spacing: 1px !important;
}
    /* إضافة تأثيرات متحركة للعناصر */
    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
    
    .main-menu ul li {
        animation: fadeInUp 0.5s ease forwards !important;
        animation-delay: calc(0.1s * var(--i)) !important;
    }
    
    .main-menu ul li:nth-child(1) { --i: 1; }
    .main-menu ul li:nth-child(2) { --i: 2; }
    .main-menu ul li:nth-child(3) { --i: 3; }
    .main-menu ul li:nth-child(4) { --i: 4; }
    .main-menu ul li:nth-child(5) { --i: 5; }
    
    /* تحسين تنسيق المحتوى */
    .container-fluid {
        padding: 0 30px !important;
    }
    
    /* تحسين تنسيق القائمة الفرعية */
    .submenu {
        background-color: white !important;
        box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1) !important;
        border-radius: 8px !important;
        padding: 10px 0 !important;
        border-top: 3px solid #28a745 !important;
    }
    
    .submenu li a {
        padding: 10px 20px !important;
        color: #333 !important;
    }
    
    .submenu li a:hover {
        background-color: rgba(40, 167, 69, 0.1) !important;
    }
    
    /* Hide any existing logo images */
    .logo a img {
        display: none !important;
    }
    
</style>
</head>
