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
                            <h2>{{ $course->name }}</h2>
                            <div class="page_link">
                                <a href="/home">Home</a>
                                <a href="/courses">Courses</a>
                                <a href="#">{{ $course->name }}</a>
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
                    <div class="main_image" style="text-align: center">
                        <img class="img-fluid"
                             src="/uploads/courses/{{ $course->cover }}"
                             alt=""/>
                    </div>
                    <div class="content_wrapper">
                        <h4 class="title">Objectives</h4>
                        <div class="content">
                            {{ $course->description }}
                        </div>


                        <h4 class="title">Instructor</h4>
                        <div class="content">
                            {{ $course->instructor->name }}
                        </div>

                        <h4 class="title">Level</h4>
                        <div class="content">
                            {{ $course->level->name }}
                        </div>

                        <h4 class="title">Course Outline</h4>
                        <div class="content">
                            <ul class="course_list">

                                @if(count($course->materials) > 0)
                                    @foreach($course->materials as $material)
                                        <li class="justify-content-between d-flex">
                                            <p>{{ $material->chapter }} - {{ $material->name }}</p>
                                            <a class="primary-btn text-uppercase"
                                               href="/courses/materials/{{ $material->id }}">View Details</a>
                                        </li>
                                    @endforeach
                                @else
                                    <p>There isn't any materials for this course yet</p>
                                @endif
                            </ul>
                        </div>

                        @if($exam && !$answers)
                            <h4 class="title">Exam</h4>
                            <div class="content">
                                <a href="/courses/exam/{{ $exam->id }}"
                                   class="primary-btn2 text-uppercase enroll rounded-0 text-white">Enroll the
                                    Exam</a>
                            </div>

                        @elseif($answers)
                            <h4 class="title">Exam</h4>
                            <div class="content">
                               You already had this exam
                            </div>
                        @endif

                    </div>
                </div>


            </div>
        </div>
    </section>
    <!--================ End Course Details Area =================-->

@endsection
