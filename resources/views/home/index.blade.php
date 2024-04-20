{{-- Import Carbon --}}
@php
    use Carbon\Carbon;
@endphp

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


    <!--======= welcome section on top background=====-->


    <section class="main-content920">
        <div class="container">
            <div class="row">

                {{-- aloalo --}}
                <div class="col-md-9">
                    <div id="main">
                        <input id="tab1" type="radio" name="tabs" checked>
                        <label for="tab1">Bài viết</label>
                        <input id="tab2" type="radio" name="tabs">
                        <label for="tab2"><a style="color: #bbb" href="{{ route('homeD') }}">Tài liệu</a></label>
                        <input id="tab3" type="radio" name="tabs">
                        <label for="tab3"><a style="color: #bbb" href="{{ route('homeTopic') }}">Chủ đề</a></label>
                        {{-- <input id="tab4" type="radio" name="tabs">
                        <label for="tab4">No Answer</label>
                        <input id="tab5" type="radio" name="tabs">
                        <label for="tab5">Recent Post</label> --}}


                        <section style="display: block;" id="content1">
                            <!--Recent Question Content Section -->
                            @foreach ($posts as $post)
                                <div class="question-type2033">
                                    <div class="row">
                                        <div class="col-md-1">
                                            <div class="left-user12923 left-user12923-repeat">
                                                <a href="#"><img src="img/images.png" alt="image"> </a> <a
                                                    href="#"><i class="fa fa-check" aria-hidden="true"></i></a>
                                            </div>
                                        </div>
                                        <div class="col-md-9">
                                            <div class="right-description893">
                                                <div id="que-hedder2983">
                                                    {{-- Title --}}
                                                    <h3><a href="{{ route('displayPost', ['idpost' => $post->ID]) }}"
                                                            target="_blank">{{ $post->title }}</a></h3>
                                                </div>
                                                <div class="ques-details10018">
                                                    {{-- Description --}}
                                                    <p>{{ $post->content }}</p>
                                                </div>
                                                <hr>
                                                <div class="ques-icon-info3293">
                                                    <a href="#"><i class="fa fa-star" aria-hidden="true"> 5 </i> </a>
                                                    <a href="#"><i class="fa fa-folder" aria-hidden="true">
                                                            DiendanIT</i></a>
                                                    <a href="#"><i class="fa fa-clock-o" aria-hidden="true">
                                                        {{ Carbon::parse($post->create_date)->diffForHumans() }}
                                                    </i></a>
                                                    <a href="#"><i class="fa fa-question-circle-o" aria-hidden="true">
                                                            Câu hỏi</i></a>
                                                    <a id="reportLink-{{ $post->ID }}" class="reportLink"
                                                        href="#">
                                                        <i class="fa fa-bug" aria-hidden="true">Báo cáo</i>
                                                    </a>
                                                    <form id="reportForm-{{ $post->ID }}" class="reportForm"
                                                        action="{{ route('postReport') }}" method="GET"
                                                        style="display: none;">
                                                        @csrf
                                                        <input type="hidden" name="post_id"
                                                            value="{{ $post->ID }}">
                                                        <label for="reason">Lý do báo cáo:</label>
                                                        <textarea name="reason" id="reason" cols="30" rows="5"></textarea>
                                                        <input type="submit" value="Gửi báo cáo">
                                                    </form>
                                                    {{-- <a id="reportLink" href="#">
                                                        <i class="fa fa-bug" aria-hidden="true"></i> Report
                                                    </a> --}}





                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="ques-type302">
                                                {{-- <a href="#">
                                                    <button type="button" class="q-type238"><i class="fa fa-comment"
                                                            aria-hidden="true">  Bài viết</i></button>
                                                </a> --}}
                                                {{-- <a href="#">
                                                    <button type="button" class="q-type23 button-ques2973"> <i
                                                            class="fa fa-user-circle-o" aria-hidden="true"> {{ $posts->count_view }}
                                                            lượt xem</i></button>
                                                </a> --}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                            <nav aria-label="Page navigation">
                                <ul class="pagination">
                                    <!-- Liên kết trang trước -->
                                    <li>
                                        <a href="{{ $posts->previousPageUrl() }}" aria-label="Previous">
                                            <span aria-hidden="true">&laquo;</span>
                                        </a>
                                    </li>

                                    <!-- Liên kết của từng trang -->
                                    @for ($i = 1; $i <= $posts->lastPage(); $i++)
                                        <li class="{{ $posts->currentPage() == $i ? 'active' : '' }}">
                                            <a href="{{ $posts->url($i) }}">{{ $i }}</a>
                                        </li>
                                    @endfor

                                    <!-- Liên kết trang tiếp theo -->
                                    <li>
                                        <a href="{{ $posts->nextPageUrl() }}" aria-label="Next">
                                            <span aria-hidden="true">&raquo;</span>
                                        </a>
                                    </li>
                                </ul>
                            </nav>

                        </section>

                        {{-- Document --}}



                    </div>
                </div>
                <!--end of col-md-9 -->
                @include('layouts.sidebar')

    </section>
@endsection
<script>
    document.addEventListener('DOMContentLoaded', function() {
     const reportLinks = document.querySelectorAll('.reportLink');
 
     reportLinks.forEach(function(reportLink) {
         reportLink.addEventListener('click', function(event) {
             event.preventDefault();
             const document_id = this.id.split('-')[1];
             const reportForm = document.getElementById(`reportForm-${document_id}`);
             if (reportForm) {
                 reportForm.style.display = 'block';
             }
         });
     });
 });
 
 
 </script>