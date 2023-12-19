<div class="main-wrap">
    <div class="footer-wrap">
        <div class="footer-wrap-1">
            <div class="footer-section">
                <h1>About</h1>
                <a href="{{ url('showIntroduce') }}">no78_flower</a>
                <a href="#">Dịch Vụ</a>
                <a href="#">Chính Sách</a>
                <a href="#">Định Hướng</a>
            </div>
            <div class="footer-section">
                <h1>News</h1>
                {{-- <li><a href="#latest-news" onclick="scrollToLatestNews()">Tin Tức</a></li> --}}
                <a href="{{ url('post/showPost') }}" >Tin Tức</a>
             
                
            </div>
            <div class="footer-section">
                <h1>Contract</h1>
                <a href="#">Liên hệ</a>
                <a href="#">Hỏi đáp</a>
                <a href="#">Trung tâm hỗ trợ</a>
            </div>
            <div class="footer-section">
                <h1>Đừng Quên Chúng Tôi Nhé</h1>
                <p>Hãy Đăng Ký Để Chúng Ta Được Gắn Kết Với Nhau Hơn</p>
                @if (Session::has('error2'))
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong>{{ Session::get('error2') }}</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <form action="{{ url('user/userSubcribe') }}" method="POST">
                    @csrf
                    <input class="subscribe  @error('user_name') is-invalid @enderror" required type="email"
                        name="email" id="email" placeholder="Enter Email Address">
                    @error('content')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                    <button type="submit" class="btn">Đăng Ký</button>
                </form>
            </div>
        </div>
        <div class="footer-wrap-2">
            <div class="line"></div>
            <div class="social-link">
                <a href="#">
                    <img src="{{ asset('frontend/img/footer/fb.png') }}" alt="Facebook">
                </a>
                <a href="#">
                    <img src="{{ asset('frontend/img/footer/google.png') }}" alt="Google">
                </a>
                <a href="#">
                    <img src="{{ asset('frontend/img/footer/twitter.png') }}" alt="twitter">
                </a>
            </div>
        </div>
    </div>
</div>
