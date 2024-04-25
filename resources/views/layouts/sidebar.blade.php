<!--strart col-md-3 (side bar)-->
<aside class="col-md-3 sidebar97239">
    <div class="categori-part329" style="margin-bottom: 35px">
        <h4>Lối tắt</h4>
        <ul>
            <li><a href="{{route('displayAddPost')}}">Tạo bài đăng</a></li>
            <li><a href="{{route('showCreateDocument')}}">Đăng tài liệu</a></li>
            
        </ul>
    </div>
    <div class="status-part3821">
        <h4>Thống kê</h4> 
        <a href="#"><i class="fa fa-question-circle" aria-hidden="true">
            Câu hỏi ({{ session('postCount', 0) }})</i></a> 
        <i class="fa fa-comment" aria-hidden="true"> Trả lời ({{ session('commentCount', 0) }})</i>
    </div>
    
    <div class="categori-part329">
        <h4>Danh mục</h4>
        <ul>
            @foreach(session('topics') as $topic)
                <li><a href="{{ route('displayTitlePost', ['id' => $topic->ID]) }}" target="_blank">{{ $topic->TopicName }}</a></li>
            @endforeach
        </ul>
    </div>
    <!--             social part -->
    <div class="social-part2189">
        <h4>Tìm tới chúng tôi</h4>
        <li class="rss-one">
            <a href="#" target="_blank"> <strong>
                    <span>Theo dõi</span>
                    <i class="fa fa-rss" aria-hidden="true"></i>

                    <br>
                    <small>tại RSS</small>

                </strong> </a>
        </li>
        <li class="facebook-two">
            <a href="https://www.facebook.com/profile.php?id=61556959966968" target="_blank"> <strong>
                    <span>Theo dõi</span>
                    <i class="fa fa-facebook" aria-hidden="true"></i>

                    <br>
                    <small>trang Facebook</small>

                </strong> </a>
        </li>
        <li class="twitter-three">
            <a href="#" target="_blank"> <strong>
                    <span>Liên hệ</span>
                    <i class="fa fa-twitter" aria-hidden="true"></i>

                    <br>
                    <small>tới twitter</small>

                </strong> </a>
        </li>
        <li class="youtube-four">
            <a href="https://www.youtube.com/channel/UCf_c4fVqg5M9NumY5qysV3g" target="_blank"> <strong>
                    <span>Subscribe</span>
                    <i class="fa fa-youtube" aria-hidden="true"></i>

                    <br>
                    <small>kênh youtube</small>

                </strong> </a>
        </li>
    </div>
    <!--              login part-->
    {{-- <div class="login-part2389">
        <h4>Login</h4>
        <div class="input-group300"> <span><i class="fa fa-user" aria-hidden="true"></i></span>
            <input type="text" class="namein309" placeholder="Username">
        </div>
        <div class="input-group300"> <span><i class="fa fa-lock" aria-hidden="true"></i></span>
            <input type="password" class="passin309" placeholder="Name">
        </div>
        <a href="#">
            <button type="button" class="userlogin320">Log In</button>
        </a>
        <div class="rememberme">
            <label>
                <input type="checkbox" checked="checked"> Remember Me</label> <a href="#"
                class="resbutton3892">Register</a>
        </div>
    </div> --}}
    <!--              highest part-->
    {{-- <div class="highest-part302">
        <h4>Highest Points</h4>
        <div class="pints-wrapper">
            <div class="left-user3898">
                <a href="#"><img src="image/images.png" alt="Image"></a>
                <div class="imag-overlay39"> <a href="#"><i class="fa fa-plus"
                            aria-hidden="true"></i></a> </div>
            </div> <span class="points-details938">
                <a href="#">
                    <h5>Ahmed Hasan</h5>
                </a>
                <a href="#" class="designetion439">Pundit</a>
                <p>206 points</p>
            </span>
        </div>
        <hr>
        <div class="pints-wrapper">
            <div class="left-user3898">
                <a href="#"><img src="image/images.png" alt="Image"></a>
                <div class="imag-overlay39"> <a href="#"><i class="fa fa-plus"
                            aria-hidden="true"></i></a> </div>
            </div> <span class="points-details938">
                <a href="#">
                    <h5>Ahmed Hasan</h5>
                </a>
                <a href="#" class="designetion439">Pundit</a>
                <p>206 points</p>
            </span>
        </div>
        <hr>
        <div class="pints-wrapper">
            <div class="left-user3898">
                <a href="#"><img src="image/images.png" alt="Image"></a>
                <div class="imag-overlay39"> <a href="#"><i class="fa fa-plus"
                            aria-hidden="true"></i></a> </div>
            </div> <span class="points-details938">
                <a href="#">
                    <h5>Ahmed Hasan</h5>
                </a>
                <a href="#" class="designetion439">Pundit</a>
                <p>206 points</p>
            </span>
        </div>
        <hr>
        <div class="pints-wrapper">
            <div class="left-user3898">
                <a href="#"><img src="image/images.png" alt="Image"></a>
                <div class="imag-overlay39"> <a href="#"><i class="fa fa-plus"
                            aria-hidden="true"></i></a> </div>
            </div> <span class="points-details938">
                <a href="#">
                    <h5>Ahmed Hasan</h5>
                </a>
                <a href="#" class="designetion439">Pundit</a>
                <p>206 points</p>
            </span>
        </div>
        <hr>
        <div class="pints-wrapper">
            <div class="left-user3898">
                <a href="#"><img src="image/images.png" alt="Image"></a>
                <div class="imag-overlay39"> <a href="#"><i class="fa fa-plus"
                            aria-hidden="true"></i></a> </div>
            </div> <span class="points-details938">
                <a href="#">
                    <h5>Ahmed Hasan</h5>
                </a>
                <a href="#" class="designetion439">Pundit</a>
                <p>206 points</p>
            </span>
        </div>
    </div> --}}
    <!--               end of Highest points -->
    <!--          start tags part-->
    {{-- <div class="tags-part2398">
        <h4>Tags</h4>
        <ul>
            <li><a href="#">analytics</a></li>
            <li><a href="#">Computer</a></li>
            <li><a href="#">Developer</a></li>
            <li><a href="#">Google</a></li>
            <li><a href="#">Interview</a></li>
            <li><a href="#">Programmer</a></li>
            <li><a href="#">Salary</a></li>
            <li><a href="#">University</a></li>
            <li><a href="#">Employee</a></li>
        </ul>
    </div> --}}
    <!--          End tags part-->
    <!--        start recent post  -->
    {{-- <div class="recent-post3290">
        <h4>Recent Post</h4>
        <div class="post-details021"> <a href="#">
                <h5>How much do web developers</h5>
            </a>
            <p>I am thinking of pursuing web developing as a career & was ...</p> <small
                style="color: #848991">July 16, 2017</small>
        </div>
        <hr>
        <div class="post-details021"> <a href="#">
                <h5>How much do web developers</h5>
            </a>
            <p>I am thinking of pursuing web developing as a career & was ...</p> <small
                style="color: #848991">July 16, 2017</small>
        </div>
        <hr>
        <div class="post-details021"> <a href="#">
                <h5>How much do web developers</h5>
            </a>
            <p>I am thinking of pursuing web developing as a career & was ...</p> <small
                style="color: #848991">July 16, 2017</small>
        </div>
    </div> --}}
    <!--       end recent post    -->
</aside>
</div>
</div>
