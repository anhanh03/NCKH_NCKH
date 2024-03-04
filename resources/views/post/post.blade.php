@extends('layouts.app')
@section('content')
@if (session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

@if ($errors->any())
<div class="alert alert-danger">
    @foreach ($errors->all() as $error)
        {{ $error }}<br>
    @endforeach
</div>
@endif
    <section class="header-descriptin329">
        <div class="container">
            <h3>Post Details</h3>
            <ol class="breadcrumb breadcrumb839">
                <li><a href="#">Home</a></li>
                <li><a href="#">Post Details</a></li>
                <li class="active">{{ $post->title }}</li>
            </ol>
        </div>
    </section>

    <section class="main-content920">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <div class="post-details">
                        <div class="details-header923">
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="post-title-left129">
                                        <h3>{{ $post->title }}</h3>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="post-que-rep-rihght320"> <a href="#"><i class="fa fa-question-circle"
                                                aria-hidden="true"></i> Question</a> <a href="#"
                                            class="r-clor10">Report</a> </div>
                                </div>
                            </div>
                        </div>
                        <div class="post-details-info1982">
                            <p>{{ $post->content }}</p>

                            <hr>
                            <div class="post-footer29032">
                                <div class="l-side2023"> <i class="fa fa-check check2" aria-hidden="true"> kiểm tra đã trả
                                        lời chưa(kiểm duyệt)</i> <a href="#"><i class="fa fa-star star2"
                                            aria-hidden="true"> 5</i></a> <i class="fa fa-folder folder2"
                                        aria-hidden="true"> wordpress</i> <i class="fa fa-clock-o clock2"
                                        aria-hidden="true"> Thời gian đăng</i> <a href="#"><i
                                            class="fa fa-commenting commenting2" aria-hidden="true"> 5 answer</i></a> <i
                                        class="fa fa-user user2" aria-hidden="true"> {{ $post->count_view }}</i> </div>
                                <div class="l-rightside39">
                                    <button type="button" class="tolltip-button thumbs-up2" data-toggle="tooltip"
                                        data-placement="bottom" title="Like"><i class="fa fa-thumbs-o-up "
                                            aria-hidden="true"></i></button>
                                    <button type="button" class="tolltip-button  thumbs-down2" data-toggle="tooltip"
                                        data-placement="bottom" title="Dislike"><i class="fa fa-thumbs-o-down"
                                            aria-hidden="true"></i></button> <span class="single-question-vote-result">luot
                                        like</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="share-tags-page-content12092">
                        <div class="l-share2093"> <i class="fa fa-share" aria-hidden="true"> Share</i> </div>
                        <div class="R-tags309"> <i class="fa fa-tags" aria-hidden="true"> Wordpress, Question, Developer</i> </div>
                    </div> -->
                    {{-- <div class="author-details8392">
                    <div class="author-img202l" style="max-height: 70px"> <img src="img/images.png" alt="image">
                        <div class="au-image-overlay text-center"> <a href="#"><i class="fa fa-plus-square-o" aria-hidden="true"></i></a> </div>
                    </div> <span class="author-deatila04re">
                   <h5>About the Author</h5>
                    <p>Mô tảgfccccccccccccccccccccccccccccccccccccccccccccccccccccccc</p>

                </span> </div> --}}
                    {{-- <div class="related3948-question-part">
                    <h3>Related questions</h3>
                    <hr>
                    <p><a href="#"><i class="fa fa-angle-double-right" aria-hidden="true"></i>This Is My Second Poll Question</a></p>
                    <p><a href="#"><i class="fa fa-angle-double-right" aria-hidden="true"></i>This is my third Question</a></p>
                    <p><a href="#"><i class="fa fa-angle-double-right" aria-hidden="true"></i>This is my fourth Question</a></p>
                    <p><a href="#"><i class="fa fa-angle-double-right" aria-hidden="true"></i>This is my fifth Question</a></p>
                </div> --}}
                    <div class="comment-list12993">
                        <div class="container">
                            <div class="row">

                                <div class="comments-container">
                                    <ul id="comments-list" class="comments-list">
                                        <li>
                                            @foreach ($comments as $comment)
                                                <div class="comment-main-level">
                                                    <!-- Avatar -->

                                                    <div class="comment-avatar"><img src="img/images.png" alt="">
                                                    </div>
                                                    <!-- Contenedor del Comentario -->

                                                    <div class="comment-box">
                                                        <div class="comment-head">
                                                            <h6 class="comment-name"><a
                                                                    href="#">{{ $comment->username }}</a></h6>
                                                            <span><i class="fa fa-clock-o" aria-hidden="true">
                                                                    {{ $comment->create_date }}</i></span>
                                                            <i class="fa fa-reply"></i>
                                                            <i class="fa fa-heart"></i>
                                                        </div>
                                                        <div class="comment-content">{{ $comment->Content }}</div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </li>

                                    </ul>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="comment289-box">
                        <h3>Leave A Reply</h3>
                        <hr>
                        <div class="row">

                            <div class="col-md-12">
                                <div class="post9320-box">
                                    <form action="{{ route('upcomment') }}" method="GET">
                                        <input type="hidden" name="user_id" value="{{ $post->ID_user }}">
                                        <input type="hidden" name="post_id" value="{{ $post->ID }}">
                                        <input type="hidden" name="document_id" value="">
                                        <input type="text" class="comment-input219882" placeholder="Enter Your Post"
                                            name="comment">
                                </div>
                                <input type="submit" class="pos393-submit" value="Post Your Comment">
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
                @include('layouts.sidebar')
            </div>
        </div>
    </section>
@endsection
