<header>
    <div class="container">

        <div class="navigation-container">
            <div class="top-head">
                <div class="web-name">
                    <h1>Flower</h1>
                </div>
    
                <div class="ham-btn">
                    <span>
                        <i class="fas fa-bars"></i>
                    </span>
                </div>
    
                <div class="times-btn">
                    <span>
                        <i class="fas fa-times"></i>
                    </span>
                </div>
            </div>
    
            <!-- nav bar -->
    
            <div class="nav-bar" id="nav-bar">
                <nav>
                    <ul>
                        {{-- <li><a href = "#">home</a></li> --}}
                        {{-- <li><a href = "#">current affairs</a></li>
                        <li><a href = "#">archive</a></li>
                        <li><a href = "#">featured</a></li>
                        <li><a href = "#">broadcast</a></li> --}}
                        {{-- <li><a href = "#">category</a></li> --}}
                    </ul>
                </nav>
            </div>
    
            <!--social icons -->
            <div class="social-icons">
                <ul>
    
                    <li>
                        <a style="color:aliceblue; font-size:27px" href="{{ url("post/showPost") }}"><i class="fas fa-home"></i></a>
                    </li>
    
                    <li>
                        <a href="{{ url('https://www.facebook.com/PhamNangNghi/') }}"><i class="fab fa-facebook"></i></a>
                    </li>
                    <li>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                    </li>
                    <li>
                        <a href="{{ url('https://www.instagram.com/mathetesnghi/') }}"><i class="fab fa-instagram"></i></a>
                    </li>
                    <li>
                        <a href="{{url('https://youtu.be/eZAong97-P8') }}"><i class="fab fa-youtube"></i></a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</header>
