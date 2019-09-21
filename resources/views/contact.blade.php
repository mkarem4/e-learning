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
                            <h2>Contact Us</h2>
                            <div class="page_link">
                                <a href="/">Home</a>
                                <a href="/contact">Contact</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================End Home Banner Area =================-->

    <!--================Contact Area =================-->
    <section class="contact_area section_gap">
        <div class="container">
            <div
                id="mapBox"
                class="mapBox"
                data-lat="19.9934716"
                data-lon="41.48095"
                data-zoom="16"
                data-info="Prince Mohammad Bin Saud, Al Bahah 65527, Saudi Arabia"
                data-mlat="19.9934716"
                data-mlon="41.48095"
            ></div>
            <div class="align-content-center">
                <div class="contact_info">
                    <div class="info_item">
                        <h6>Undertaken by : </h6>
                        <p>Aysha Alghamdi</p>
                        <p>Seham Al – Zahrani  </p>
                        <p>Wejdan Alghamdi </p>
                    </div>
                    <div class="info_item">
                        <h6>Supervised by : </h6>
                        <p>Dr. Nouf</p>

                    </div>
                </div>
            </div>
        </div>

    </section>
    <!--================Contact Area =================-->
@endsection
