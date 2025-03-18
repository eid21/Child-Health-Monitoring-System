@extends('theme.master')
@section('content')
    <main>
        <!--? Slider Area Start-->
        <div class="slider-area" style="background: url('{{ asset('assets') }}/img/hero/h1_hero.png');background-position:cover; background-position: center;  background-repeat: no-repeat; height: 800px;">
           
            <div class="single-slider d-flex align-items-center slider-height">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-xl-7 col-lg-8 col-md-10">
                            <div class="hero-wrapper">
                                <!-- Video icon -->
                                <div class="video-icon">
                                    <a class="popup-video btn-icon" href="https://www.youtube.com/watch?v=up68UAfH0d0" data-animation="bounceIn" data-delay=".4s">
                                        <i class="fas fa-play"></i>
                                    </a>
                                </div>
                                <div class="hero__caption">
                                    <h1 data-animation="fadeInUp" data-delay=".3s">Health is wealth <br> keep it healthy</h1>
                                    <p data-animation="fadeInUp" data-delay=".6s">Enter your child's details to get personalized recommendations!</p>
                                </div>
                                <!-- Child Info Form -->
                                <div class="child-form mt-30" data-animation="fadeInUp" data-delay=".8s">
                                <form action="{{ route('recommend') }}" method="POST">
    @csrf
    <div class="form-title mb-20">
        <h4>Child Information</h4>
    </div>
    <div class="row">
        <!-- Height -->
        <div class="col-md-4">
            <div class="form-group">
                <input type="number" name="height" class="form-control"
                    placeholder="Height (cm)" value="{{ old('height') }}" required>
                @error('height')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
        </div>
        <!-- Weight -->
        <div class="col-md-4">
            <div class="form-group">
                <input type="number" name="weight" class="form-control"
                    placeholder="Weight (kg)" value="{{ old('weight') }}" required>
                @error('weight')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
        </div>
        <!-- Age -->
        <div class="col-md-4">
            <div class="form-group">
                <input type="number" name="age" class="form-control"
                    placeholder="Age (years)" value="{{ old('age') }}" required>
                @error('age')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
        </div>
    </div>
    <button type="submit" class="btn mt-20">Get Recommendations</button>
</form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>    
            <!-- تم حذف السلايدر الثاني لمنع تبديل المحتوى -->
        </div>
        <!-- Slider Area End -->
        <!--? About-2 Area Start -->
        <div class="about-area2 section-padding40">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-7 col-md-12">
                        <!-- about-img -->
                        <div class="about-img ">
                            <img src="{{asset('assets')}}/img/gallery/about.png" alt="">
                        </div>
                    </div>
                    <div class="col-lg-5 col-md-12">
                        <div class="about-caption">
                            <!-- Section Tittle -->
                            <div class="section-tittle mb-35">
                                <h2>Create a healthy life you love!</h2>
                            </div>
                            <p class="pera-top mb-40">Almost before we knew it, we had left the ground</p>
                            <p class="pera-bottom mb-30">Praesent porttitor, nulla vitae posuere iaculis, arcu nisl dignissim dolor, a pretium mi sem ut ipsum. Fusce fermentum. Pellentesque libero tortor, tincidunt et.</p>
                            <div class="icon-about">
                                <img src="{{asset('assets')}}/img/icon/about1.svg" alt="" class=" mr-20">
                                <img src="{{asset('assets')}}/img/icon/about2.svg" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- About-2 Area End -->
    </main>
@endsection
@section('css')
    <style>
        /* تحسينات عامة للصفحة */
        .slider-area {
            position: relative;
            overflow: hidden;
            background: linear-gradient(rgba(0,0,0,0.1), rgba(0,0,0,0.1)), url('../img/hero/hero-bg.jpg');
            background-size: cover;
            background-position: center;
        }

        .slider-height {
            min-height: 650px; /* ارتفاع كافي للسلايدر */
        }

        .single-slider {
            position: relative;
            padding: 50px 0;
        }

        /* تحسين أيقونة الفيديو */
        .video-icon {
            margin-bottom: 30px;
        }

        .video-icon .btn-icon {
            display: inline-block;
            width: 60px;
            height: 60px;
            line-height: 60px;
            border-radius: 50%;
            background-color: #ff5e13;
            color: #fff;
            text-align: center;
            font-size: 20px;
            transition: all 0.3s ease;
            box-shadow: 0 5px 15px rgba(255, 94, 19, 0.4);
        }

        .video-icon .btn-icon:hover {
            background-color: #e55311;
            transform: scale(1.05);
        }

        /* تحسينات للعنوان والوصف */
        .hero__caption h1 {
            font-weight: 700;
            margin-bottom: 20px;
            text-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }

        .hero__caption p {
            font-size: 18px;
            margin-bottom: 30px;
            color: #555;
        }

        /* Child Form Styling - تحسينات */
        .child-form {
            background: rgba(255, 255, 255, 0.95); /* زيادة العتامة للخلفية */
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15); /* ظل أكثر وضوحاً */
            max-width: 600px; /* زيادة العرض قليلاً */
            margin: 30px 0; /* هامش أعلى وأسفل */
        }

        .child-form .row {
            margin-left: -10px;
            margin-right: -10px;
        }

        .child-form .col-md-4 {
            padding-left: 10px;
            padding-right: 10px;
        }

        .form-title {
            text-align: center;
            margin-bottom: 20px;
        }

        .form-title h4 {
            font-size: 22px;
            color: #333;
            font-weight: 600;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-hint {
            display: block;
            font-size: 12px;
            color: #777;
            margin-top: -12px;
            margin-bottom: 15px;
        }

        .child-form input[type="number"] {
            width: 100%;
            padding: 15px;
            margin-bottom: 15px;
            border: 2px solid #eee; /* حدود أكثر وضوحاً */
            border-radius: 8px;
            font-size: 16px;
            font-weight: 500;
            transition: all 0.3s ease;
            background-color: #ffffff;
        }

        .child-form input[type="number"]:focus {
            border-color: #ff5e13;
            outline: none;
            box-shadow: 0 0 8px rgba(255, 94, 19, 0.4);
            transform: translateY(-2px); /* تأثير رفع خفيف عند التركيز */
        }

        .child-form input[type="number"]::placeholder {
            color: #999;
            font-size: 14px;
        }

        .child-form .btn {
            width: 100%;
            padding: 15px;
            background: #ff5e13;
            border: none;
            color: white;
            font-size: 18px;
            font-weight: 600;
            border-radius: 8px;
            transition: all 0.3s ease;
            cursor: pointer;
            letter-spacing: 0.5px;
            text-transform: uppercase;
            box-shadow: 0 4px 10px rgba(255, 94, 19, 0.3);
        }

        .child-form .btn:hover {
            background: #e55311;
            transform: translateY(-3px);
            box-shadow: 0 6px 15px rgba(255, 94, 19, 0.4);
        }

        .child-form .btn:active {
            transform: translateY(-1px);
        }

        .child-form .mt-20 {
            margin-top: 20px;
        }

        /* إصلاح العناصر المختلفة */
        .about-caption .section-tittle h2 {
            font-size: 36px;
            font-weight: 700;
            line-height: 1.3;
            margin-bottom: 20px;
        }

        .about-caption .pera-top {
            font-size: 18px;
            font-weight: 500;
            color: #555;
        }

        .about-caption .pera-bottom {
            color: #777;
            line-height: 1.7;
        }

        .icon-about img {
            transition: transform 0.3s ease;
        }

        .icon-about img:hover {
            transform: translateY(-5px);
        }

        /* تحسينات للتجاوب مع الشاشات الصغيرة */
        @media (max-width: 768px) {
            .child-form {
                padding: 20px;
                margin: 20px 0;
            }
            
            .child-form .row {
                margin-left: -5px;
                margin-right: -5px;
            }
            
            .child-form .col-md-4 {
                padding-left: 5px;
                padding-right: 5px;
            }
            
            .hero__caption h1 {
                font-size: 28px;
            }
            
            .hero__caption p {
                font-size: 16px;
            }
        }
        /* تحسينات للصفحة الرئيسية لإبراز نموذج معلومات الطفل */
.slider-area {
    position: relative;
    overflow: hidden;
    background: linear-gradient(rgba(0,0,0,0.25), rgba(0,0,0,0.25)), url('{{ asset('assets') }}/img/hero/h1_hero.png');
    background-size: cover;
    background-position: center;
    height: 800px; /* تحديد ارتفاع ثابت */
}

.slider-height {
    min-height: 750px; /* زيادة الارتفاع قليلاً */
    display: flex;
    align-items: center;
}

/* تعديل موضع محتوى السلايدر */
.hero-wrapper {
    position: relative;
    z-index: 10;
    padding: 40px 0;
}

/* تصغير أيقونة الفيديو وتحريكها */
.video-icon {
    position: absolute;
    top: -50px;
    right: 20px;
    margin-bottom: 0;
}

/* تحسين العناوين والنصوص */
.hero__caption h1 {
    font-size: 40px;
    font-weight: 800;
    margin-bottom: 15px;
    color: #fff;
    text-shadow: 0 2px 5px rgba(0,0,0,0.3);
}

.hero__caption p {
    font-size: 18px;
    margin-bottom: 20px;
    color: #fff;
    text-shadow: 0 1px 3px rgba(0,0,0,0.2);
    max-width: 500px;
}

/* تحسين نموذج معلومات الطفل - جعله أكثر بروزًا */
.child-form {
    background: rgba(255, 255, 255, 0.97);
    padding: 35px;
    border-radius: 15px;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
    max-width: 650px;
    margin: 30px 0;
    border-top: 5px solid #28a745; /* إضافة حدود خضراء متناسقة مع الشعار */
    transform: translateY(0);
    transition: all 0.4s ease;
}

.child-form:hover {
    transform: translateY(-5px);
    box-shadow: 0 15px 35px rgba(0, 0, 0, 0.25);
}

/* تحسين عنوان النموذج */
.form-title {
    text-align: center;
    margin-bottom: 25px;
}

.form-title h4 {
    font-size: 24px;
    color: #333;
    font-weight: 700;
    position: relative;
    padding-bottom: 10px;
}

.form-title h4:after {
    content: '';
    position: absolute;
    bottom: 0;
    left: 50%;
    transform: translateX(-50%);
    width: 80px;
    height: 3px;
    background: #28a745;
}

/* تحسين حقول الإدخال */
.child-form input[type="number"] {
    width: 100%;
    padding: 15px;
    margin-bottom: 20px;
    border: 2px solid #eee;
    border-radius: 10px;
    font-size: 16px;
    font-weight: 500;
    transition: all 0.3s ease;
    background-color: #ffffff;
}

.child-form input[type="number"]:focus {
    border-color: #28a745; /* تعديل لون الحدود عند التركيز لتكون خضراء */
    outline: none;
    box-shadow: 0 0 10px rgba(40, 167, 69, 0.3);
    transform: translateY(-2px);
}

/* تعديل زر الإرسال */
.child-form .btn {
    width: 100%;
    padding: 15px;
    background: #28a745; /* تعديل لون الزر ليكون أخضر متناسق مع الشعار */
    border: none;
    color: white;
    font-size: 18px;
    font-weight: 600;
    border-radius: 10px;
    transition: all 0.3s ease;
    cursor: pointer;
    letter-spacing: 0.5px;
    text-transform: uppercase;
    box-shadow: 0 4px 10px rgba(40, 167, 69, 0.3);
}

.child-form .btn:hover {
    background: #218838;
    transform: translateY(-3px);
    box-shadow: 0 6px 15px rgba(40, 167, 69, 0.4);
}

/* تحسين الخلفية لتكون أكثر إبرازًا للنموذج */
.single-slider {
    position: relative;
    padding: 50px 0;
    background: rgba(0, 0, 0, 0.1);
}

/* تحسين التجاوب مع الشاشات الصغيرة */
@media (max-width: 768px) {
    .slider-height {
        min-height: 650px;
    }
    
    .child-form {
        padding: 25px;
        margin: 20px 0;
    }
    
    .hero__caption h1 {
        font-size: 30px;
    }
    
    .hero__caption p {
        font-size: 16px;
    }
    
    .video-icon {
        top: -30px;
        right: 10px;
    }
    
    .video-icon .btn-icon {
        width: 50px;
        height: 50px;
        line-height: 50px;
    }
}
    </style>
@endsection