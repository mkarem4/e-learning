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
                            <h2>{{ $material->name }}</h2>
                            <div class="page_link">
                                <a href="/home">Home</a>
                                <a href="/courses">Courses</a>
                                <a href="/courses/{{$material->course->id}}">{{ $material->course->name }}</a>
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
                        <h4 class="title">Chapter</h4>
                        <div class="content">
                            {{ $material->chapter }}
                        </div>

                        <h4 class="title">Note</h4>
                        <div class="content">
                            {{ $material->note }}
                        </div>


                        <h4 class="title">Material</h4>
                        <div class="content">
                            <div class="main_image" style="text-align: center">
                                @if($material->type == 1)
                                    <video width="320" height="240" controls>
                                        <source src="{{ URL::asset("/uploads/materials/$material->file")}}"
                                                type="video/mp4">
                                        Your browser does not support the video tag.
                                    </video>
                                @elseif($material->type == 2)
                                    <a href="{{ URL::to( '/uploads/materials/' . $material->file)  }}" target="_blank"
                                       download="{{$material->file}}">{{ $material->chapter }}</a>
                                @else
                                    <iframe id="player" type="text/html" width="640" height="390"
                                            src="{{ $material->file }}" frameborder="0"></iframe>
                                @endif
                            </div>
                        </div>

                    </div>


                </div>


            </div>
        </div>
    </section>
    <!--================ End Course Details Area =================-->

@endsection
