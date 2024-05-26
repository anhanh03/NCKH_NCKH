@extends('layouts.app')
@section('content')
@php
    use Carbon\Carbon;
@endphp
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
    <section class="main-content920">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    {{-- <section id="content1"> --}}
                    <!--Recent Question Content Section -->
                    <div class="question-type2033">
                        @if ($posts)
                            @foreach ($posts as $post)
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
                                                <h3><a href="{{ route('displayPost', ['idpost' => $post->ID]) }}"
                                                        target="_blank">{{ $post->title }}</a></h3>
                                            </div>
                                            <div class="ques-details10018">
                                                <p>{{ $post->content }}</p>
                                            </div>
                                            <hr>
                                            <div class="ques-icon-info3293"> <a href="#"><i class="fa fa-star"
                                                        aria-hidden="true"> 5 </i> </a> <a href="#"><i
                                                        class="fa fa-folder" aria-hidden="true"> wordpress</i></a> <a
                                                    href="#"><i class="fa fa-clock-o" aria-hidden="true">  {{ Carbon::parse($post->create_date)->diffForHumans() }}</i></a> <a href="#"><i class="fa fa-question-circle-o"
                                                        aria-hidden="true"> Câu hỏi</i></a> 
                                                        <a id="reportLink" href="#">
                                                            <i class="fa fa-bug" aria-hidden="true"></i> Báo cáo
                                                        </a>

                                                        <form id="reportForm" action="{{ route('report') }}" method="POST"
                                                            style="display: none;">
                                                            @csrf
                                                            <input type="hidden" name="topic_id"
                                                                value="">
                                                            <label for="reason">Lý do báo cáo:</label>
                                                            <textarea name="reason" id="reason" cols="30" rows="5"></textarea>
                                                            <input type="submit" value="Gửi báo cáo">
                                                        </form>
                                                        <script>
                                                            document.addEventListener('DOMContentLoaded', function() {
                                                                const reportLink = document.querySelector('#reportLink');
                                                                const reportForm = document.querySelector('#reportForm');

                                                                reportLink.addEventListener('click', function(event) {
                                                                    event.preventDefault();
                                                                    reportForm.style.display = 'block'; // Hiển thị form khi nhấp vào liên kết
                                                                });
                                                            });
                                                        </script>
                                                    
                                                    </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="ques-type302">
                                            <a href="#">
                                                {{-- <button type="button" class="q-type238"><i class="fa fa-comment" aria-hidden="true">  333335 answer</i></button> --}}
                                            </a>
                                            <a href="#">
                                                <button type="button" class="q-type23 button-ques2973"> <i
                                                        class="fa fa-user-circle-o" aria-hidden="true">
                                                        {{ $post->count_view }}</i> </button>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <p>Không có bài viết.</p>
                        @endif

                    </div>


                    <nav aria-label="Page navigation">
                        <ul class="pagination">
                            <!-- Liên kết trang trước -->
                            <li>
                                <a href="{{ $posts->previousPageUrl() ? $posts->previousPageUrl().'&id='.request('id') : '' }}" aria-label="Previous">
                                    <span aria-hidden="true">&laquo;</span>
                                </a>
                            </li>
                    
                            <!-- Liên kết của từng trang -->
                            @for ($i = 1; $i <= $posts->lastPage(); $i++)
                                <li class="{{ $posts->currentPage() == $i ? 'active' : '' }}">
                                    <a href="{{ route('displayTitlePost', ['id' => request('id'), 'page' => $i]) }}">{{ $i }}</a>
                                </li>
                            @endfor
                    
                            <!-- Liên kết trang tiếp theo -->
                            <li>
                                <a href="{{ $posts->nextPageUrl() ? $posts->nextPageUrl().'&id='.request('id') : '' }}" aria-label="Next">
                                    <span aria-hidden="true">&raquo;</span>
                                </a>
                            </li>
                        </ul>
                    </nav>
                     
                    {{-- </section> --}}
                </div>
                @include('layouts.sidebar')
            </div>
        </div>
    </section>
@endsection
