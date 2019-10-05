@extends('layouts.app')
@section('content')

    <!--================Home Banner Area =================-->
    <section class="banner_area">
        <div class="banner_inner d-flex align-items-center">
            <div class="overlay"></div>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-6">
                        <div class="banner_content text-center">
                            <h2>{{ $exam->name }}</h2>
                            <div class="page_link">
                                <a href="/home">Home</a>
                                <a href="/courses">Courses</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================End Home Banner Area =================-->

    <!--================ Start Course Details Area =================-->
    <section class="course_details_area section_gap">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 course_details_left">
                    <div class="content_wrapper">
                        <h4 class="title">Exam</h4>
                        <div class="content">
                            {{ $exam->name }}
                        </div>

                        <h4 class="title">Result</h4>
                        <div class="content">
                            {{ $degree }} - ({{ $result->score }}/{{ $exam->degree }})
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================ End Course Details Area =================-->

@endsection
