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
                            <h2>Courses</h2>
                            <div class="page_link">
                                <a href="/">Home</a>
                                <a href="/courses">Courses</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================End Home Banner Area =================-->

    <!--================ Start Popular Courses Area =================-->
    <div class="popular_courses section_gap_top">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-5">
                    <div class="main_title">
                        <h2 class="mb-3">Our Popular Courses</h2>
                        <p>
                            Replenish man have thing gathering lights yielding shall you
                        </p>
                    </div>
                </div>
            </div>
            <div class="row">
                <!-- single course -->
                <div class="col-lg-12">
                    <div class="owl-carousel active_course">
                        @foreach($courses as $course)
                            <div class="single_course">
                                <div class="course_head">
                                    <a href="/courses/{{$course->id}}"><img class="img-fluid"
                                                                            src="/uploads/courses/{{ $course->cover }}"
                                                                            alt=""/></a>
                                </div>
                                <div class="course_content">
                                    <h4 class="mb-3">
                                        <a href="/courses/{{$course->id}}">{{ $course->name }}</a>
                                    </h4>
                                    <h6 class="mb-3">
                                        {{ $course->level->name }}
                                    </h6>
                                    <p>
                                        {{ $course->description }}
                                    </p>

                                    <h3>
                                        Dr: {{ $course->instructor->name }}
                                    </h3>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--================ End Popular Courses Area =================-->

@endsection
