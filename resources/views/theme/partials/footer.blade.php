<footer>
    <div class="footer-wrappr section-bg3" data-background="{{asset('assets')}}/img/gallery/footer-bg.png">
        <div class="footer-area footer-padding ">
            <div class="container">
                <div class="row justify-content-between">
                    <div class="col-xl-8 col-lg-8 col-md-6 col-sm-12">
                        <div class="single-footer-caption mb-50">
                            <!-- logo -->
                            <div class="footer-logo mb-25">
                                <a href="{{ route('theme.index') }}"><img src="{{asset('assets')}}/img/logo/logo2_footer.png" alt=""></a>
                            </div>
                            <d iv class="header-area">
                                <div class="main-header main-header2">
                                    <div class="menu-main d-flex align-items-center justify-content-start">
                                        <!-- Main-menu -->
                                        <div class="main-menu main-menu2">
                                            <nav> 
                                                <ul>
                                                    <li><a href="{{ route('theme.index') }}">Home</a></li>
                                                    <li><a href="{{ route('theme.about') }}">About</a></li>
                                                    <li><a href="{{route('theme.services')}}">Services</a></li>
                                                    <li><a href="{{route('theme.blog')}}">Blog</a></li>
                                                    <li><a href="{{ route('theme.contact') }}">Contact</a></li>
                                                </ul>
                                            </nav>
                                        </div>
                                    </div>  
                                </div>
                            </d>
                            <!-- social -->
                            <div class="footer-social mt-50">
                                <a href="#"><i class="fab fa-twitter"></i></a>
                                <a href="https://bit.ly/sai4ull"><i class="fab fa-facebook-f"></i></a>
                                <a href="#"><i class="fab fa-pinterest-p"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
                        <div class="single-footer-caption">
                            <div class="footer-tittle mb-50">
                                <h4>Subscribe newsletter</h4>
                            </div>
                            <!-- Form -->
                            <div class="footer-form">
                                <div id="mc_embed_signup">
                                    @if(session('success'))
                                    <div style="background: #dff0d8; color: #3c763d; padding: 10px; margin-bottom: 15px; border-radius: 4px;">
                                        {{ session('success') }}
                                    </div>
                                @endif
                                
                                @error('email')
                                    <div style="background: #f2dede; color: #a94442; padding: 10px; margin-bottom: 15px; border-radius: 4px;">
                                        {{ $message }}
                                    </div>
                                @enderror
                                    <form action="{{route('subscriber.store')}}" method="POST" class="subscribe_form relative mail_part">
                                        @csrf
                                        <input type="email" name="email" id="newsletter-form-email" placeholder="Email Address"
                                               class="placeholder hide-on-focus @error('email') is-invalid @enderror"
                                               value="{{ old('email') }}"
                                               onfocus="this.placeholder = ''"
                                               onblur="this.placeholder = 'Enter your email'">
                                        
                                        <div class="form-icon">
                                            <button type="submit" name="submit" id="newsletter-submit" class="email_icon newsletter-submit button-contactForm">
                                                Subscribe
                                            </button>
                                        </div>
                                        
                                    </form>
                                </div>
                            </div>
                            <div class="footer-tittle">
                                <div class="footer-pera">
                                    <p>Praesent porttitor, nulla vitae posuere iaculis, arcu nisl dignissim dolor, a pretium misem ut ipsum.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- footer-bottom area -->
        <div class="footer-bottom-area">
            <div class="container">
                <div class="footer-border">
                    <div class="row">
                        <div class="col-xl-10 ">
                            <div class="footer-copy-right">
                             <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                              Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                              <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>

</footer>
<!-- Scroll Up -->

@section('css')
    <style>
    .text-danger {
    color: #ff4141;
    font-size: 14px;
    display: block;
    margin-top: 5px;
}

.text-success {
    color: #28a745;
    font-size: 14px;
    display: block;
    margin-top: 5px;
}

.is-invalid {
    border-color: #ff4141 !important;
}
    </style>
@endsection