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
                                                    href="#"><i class="fa fa-clock-o" aria-hidden="true"> 4 min
                                                        ago</i></a> <a href="#"><i class="fa fa-question-circle-o"
                                                        aria-hidden="true"> Question</i></a> <a href="#"><i
                                                        class="fa fa-bug" aria-hidden="true"> Report</i></a> </div>
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
                            <li>
                                <a href="#" aria-label="Previous">
                                    <span aria-hidden="true">&laquo;</span>
                                </a>
                            </li>
                            <li><a href="#">1</a></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#">4</a></li>
                            <li><a href="#">5</a></li>
                            <li>
                                <a href="#" aria-label="Next">
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
