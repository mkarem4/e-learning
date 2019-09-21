@extends('layouts.app')
@section('content')

    <!--================ Start Home Banner Area =================-->
    <section class="home_banner_area">
        <div class="banner_inner">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="banner_content text-center">
                            <h1>Adaptive E-Learning System</h1>
                            <hr>
                            <p class="text-uppercase">
                                Best online education service In the world
                            </p>
                            <h3 class="text-uppercase mt-4 mb-5">
                                based on student test outcome in collaborative environment
                            </h3>
                            <div>
                                <a href="/courses" class="primary-btn ml-sm-3 ml-0">see course</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================ End Home Banner Area =================-->

    <!--================ Start Feature Area =================-->
    <section class="feature_area section_gap_top">

    </section>
    <!--================ End Feature Area =================-->

    <!--================ Start Popular Courses Area =================-->
    <div class="popular_courses">
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
                        <div class="single_course">
                            <div class="course_head">
                                <img class="img-fluid" src="website/img/courses/c1.jpg" alt=""/>
                            </div>
                            <div class="course_content">
                                <span class="price">$25</span>
                                <span class="tag mb-4 d-inline-block">design</span>
                                <h4 class="mb-3">
                                    <a href="course-details.html">Digital Images </a>
                                </h4>
                                <p>
                                    It's one from interesting and useful courses that helps you to develop yourself to
                                    be very good and have experience
                                </p>
                                <div
                                    class="course_meta d-flex justify-content-lg-between align-items-lg-center flex-lg-row flex-column mt-4"
                                >
                                    <div class="authr_meta">
                                        <img src="website/img/courses/author1.png" alt=""/>
                                        <span class="d-inline-block ml-2">Mohamed</span>
                                    </div>
                                    <div class="mt-lg-0 mt-3">
                      <span class="meta_info mr-4">
                        <a href="#"> <i class="ti-user mr-2"></i>25 </a>
                      </span>
                                        <span class="meta_info"
                                        ><a href="#"> <i class="ti-heart mr-2"></i>35 </a></span
                                        >
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="single_course">
                            <div class="course_head">
                                <img class="img-fluid" src="website/img/courses/c2.jpg" alt=""/>
                            </div>
                            <div class="course_content">
                                <span class="price">$25</span>
                                <span class="tag mb-4 d-inline-block">design</span>
                                <h4 class="mb-3">
                                    <a href="course-details.html">Computer Security</a>
                                </h4>
                                <p>
                                    It's one from interesting and useful courses that helps you to develop yourself to
                                    be very good and have experience

                                </p>
                                <div
                                    class="course_meta d-flex justify-content-lg-between align-items-lg-center flex-lg-row flex-column mt-4"
                                >
                                    <div class="authr_meta">
                                        <img src="website/img/courses/author2.png" alt=""/>
                                        <span class="d-inline-block ml-2">Ahmed</span>
                                    </div>
                                    <div class="mt-lg-0 mt-3">
                      <span class="meta_info mr-4">
                        <a href="#"> <i class="ti-user mr-2"></i>25 </a>
                      </span>
                                        <span class="meta_info"
                                        ><a href="#"> <i class="ti-heart mr-2"></i>35 </a></span
                                        >
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="single_course">
                            <div class="course_head">
                                <img class="img-fluid" src="website/img/courses/c3.jpg" alt=""/>
                            </div>
                            <div class="course_content">
                                <span class="price">$25</span>
                                <span class="tag mb-4 d-inline-block">design</span>
                                <h4 class="mb-3">
                                    <a href="course-details.html">Computer Engineering</a>
                                </h4>
                                <p>
                                    It's one from interesting and useful courses that helps you to develop yourself to
                                    be very good and have experience
                                </p>
                                <div
                                    class="course_meta d-flex justify-content-lg-between align-items-lg-center flex-lg-row flex-column mt-4"
                                >
                                    <div class="authr_meta">
                                        <img src="website/img/courses/author3.png" alt=""/>
                                        <span class="d-inline-block ml-2">Aya</span>
                                    </div>
                                    <div class="mt-lg-0 mt-3">
                      <span class="meta_info mr-4">
                        <a href="#"> <i class="ti-user mr-2"></i>25 </a>
                      </span>
                                        <span class="meta_info"
                                        ><a href="#"> <i class="ti-heart mr-2"></i>35 </a></span
                                        >
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--================ End Popular Courses Area =================-->

@endsection
