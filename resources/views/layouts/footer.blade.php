 <!--    footer -->
 <div class="footer-search">
     <div class="container">
         <div class="row">
            <form action="{{ route('search') }}">
                <div id="custom-search-input">
                    <div class="input-group col-md-12"> <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                        <input name="keyword" type="text" class="  search-query form-control user-control30"
                        placeholder="Search here...." /> <span class="input-group-btn">
                            <button class="btn btn-danger" type="button">
                                <span class=" glyphicon glyphicon-search"></span> </button>
                            </span>
                        </div>
                    </div>
                </div>
            </form>
     </div>
 </div>
 <section class="footer-part">
     <div class="container">
         <div class="row">
             <div class="col-md-3">
                 <div class="info-part-one320">
                     <!-- <h4>Where We Are ?</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi adipiscing gravida odio, sit amet suscipit risus ultrices eu.</p> -->
                     <h4>Địa chỉ :</h4>
                     <p>Trường Đại Học Tài Nguyên và Môi Trường Hà Nội</p>
                     <h4>Hỗ trợ :</h4>
                     <p>Số điện thoại liên hệ : (+84)12345678</p>
                     <p>Liên hệ với chúng tôi : </p>
                     <p>nckh@gmail.com</p>
                 </div>
             </div>
             <div class="col-md-3">
                 <div class="info-part-two320 text-center">
                     <h4>Đường dẫn nhanh</h4>
                     <a href="{{ route('home') }}">
                         <p>-Home</p>
                     </a>
                     <a href="#">
                         <p>-Yêu cầu</p>
                     </a>
                     <a href="#">
                         <p>-Câu hỏi</p>
                     </a>
                     <a href="#">
                         <p>-Người dùng</p>
                     </a>
                     <a href="#">
                         <p>-Chỉnh sửa hồ sơ</p>
                     </a>
                     <a href="#">
                         <p>-Trang</p>
                     </a>
                     <a href="#">
                         <p>-Liên hệ chúng tôi</p>
                     </a>
                     <a href="{{ route('privacy') }}" class="last-child12892">
                         <p>-Chính sách bảo mật</p>
                     </a>
                 </div>
             </div>
             <div class="col-md-3">
                 <div class="info-part-three320">
                     <!-- <h4>Popular Questions</h4>
                    <div class="news-info209">
                        <h5>Why are the British confused</h5>
                        <p>(Why I darest say, they darest not get offended when they so ...</p> <small>July 16, 2017</small> </div>
                    <div class="news-info209">
                        <h5>How to approach applying for</h5>
                        <p>(I am trying to find/change my career trajectory. Its a good cozy ...</p> <small>July 16, 2017</small> </div>
                    <div class="news-info209">
                        <h5>How to evaluate whether a</h5>
                        <p>A friend of mine is the CEO of his own small business. ...</p> <small>July 16, 2017</small> </div> -->
                     <h4>Thống kê trực tuyến</h4>
                     <div class="news-info209">
                         <h5>Số người truy cập: </h5>
                         <h5>{{ session('totalCountActiveUser') }}</h5>
                     </div>

                     <h4>Thống kê diễn đàn</h4>
                     <div class="news-info209 article statistics">
                         <div class="topic">
                             <h5>Tài liệu: </h5>
                             <h5>{{ session('totalCountDoc') }}</h5>
                         </div>
                         <div class="posts">
                             <h5>Bài viết: </h5>
                             <h5>{{ session('totalCountPost') }}</h5>
                         </div>
                         <div class="members">
                             <h5>Thành viên: </h5>
                             <h5>{{ session('totalCountUser') }}</h5>
                         </div>
                     </div>
                 </div>
             </div>
             <div class="col-md-3">
                 <div class="info-part-four320">
                     <!-- <h4>Latest Tweets</h4>
                    <div class="tweet-details29">
                        <p><i class="fa fa-twitter-square" aria-hidden="true"></i><a href="#"> codeThemesCheck a new update #AskMe #ThemeForest #WordPress #2code #Envato#2code
Themehttps://t.co/urb3LgsOCi</a></p> <small>about 2 weeks ago</small> </div>
                    <div class="tweet-details29">
                        <p><i class="fa fa-twitter-square" aria-hidden="true"></i><a href="#"> codeThemesCheck a new update #AskMe #ThemeForest #WordPress #2code #Envato#2code
Themehttps://t.co/urb3LgsOCi</a></p> <small>about 2 weeks ago</small> </div>
                    <div class="tweet-details29">
                        <p><i class="fa fa-twitter-square" aria-hidden="true"></i><a href="#"> codeThemesCheck a new update #AskMe #ThemeForest #WordPress #2code #Envato#2code
Themehttps://t.co/urb3LgsOCi</a></p> <small>about 2 weeks ago</small> </div> -->
                     <!-- <h4>CỘNG ĐÒNG DIỄN ĐÀN TRỰC TUYẾN</h4>
                        <ul class="social__icons">
       <li><a href="#" class="-facebook"><i class="fa fa-facebook"></i></a></li>
       <li><a href="https://twitter.com/#" class="fa fa-twitter"></a></li>
      </ul> -->
                     <h4>VỀ CHÚNG TÔI</h4>

                     <h5 class="white-color">Trang web được thành lập ngày <b>1-1-2023</b></h5>

                     <div class="white-color about-purpose ">
                         <h5 class="white-color">Mục đích:</h5>
                         <p>Trang web được tạo ra nhằm cung cấp một môi trường học tập và trao đổi kiến thức cho sinh
                             viên ngành công nghệ thông tin.</p>
                     </div>

                     <div class="white-color about-feature">
                         <h5 class="white-color">Các tính năng của trang web:</h5>
                         <ul>
                             <li>Kho tài liệu học tập phong phú và đa dạng, bao gồm các tài liệu chính thống, tài liệu
                                 tham khảo, tài liệu thực hành, v.v.</li>
                             <li>Cộng đồng sinh viên đông đảo và nhiệt tình, luôn sẵn sàng giúp đỡ nhau trong học tập.
                             </li>
                         </ul>
                     </div>

                 </div>
             </div>
         </div>
     </div>
 </section>
 <section class="footer-social">
     <div class="container">
         <div class="row">
             <div class="col-md-6">
                 <p>Bản quyền 2024 NCKH | <strong>HIHI</strong></p>
             </div>
             <div class="col-md-6">
                 <div class="social-right2389"> <a href="#"><i class="fa fa-twitter-square"
                             aria-hidden="true"></i></a> <a href="#"><i class="fa fa-facebook"
                             aria-hidden="true"></i></a> <a href="#"><i class="fa fa-google-plus"
                             aria-hidden="true"></i></a> <a href="#"><i class="fa fa-youtube"
                             aria-hidden="true"></i></a> <a href="#"><i class="fa fa-skype"
                             aria-hidden="true"></i></a> <a href="#"><i class="fa fa-linkedin"
                             aria-hidden="true"></i></a> <a href="#"><i class="fa fa-rss"
                             aria-hidden="true"></i></a> </div>
             </div>
         </div>
     </div>
 </section>
