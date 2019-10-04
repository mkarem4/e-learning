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
                       
                            <div class="page_link">
                                <a href="/home">Home</a>
                               
                            </div>
                             <div class="content_wrapper">
                        <h4 class="title">Objectives</h4>
                        <div class="content">
                            {{ $course->description }}
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
  

@endsection
