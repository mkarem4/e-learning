@extends('admin.layouts.app')
@section('title')
    dashboard
@endsection

@section('topBar')
    <li class="m-menu__item">
        <a href="" class="m-menu__link">
            <span class="m-menu__link-text">Home</span>
            <i class="m-menu__hor-arrow la la-angle-left"></i>
        </a>
    </li>

@endsection

@section('content')
    <div class="m-portlet m-portlet--mobile">
        <div class="m-portlet__head">
            <div class="m-portlet__head-caption">
                <div class="m-portlet__head-title">
                    <h3 class="m-portlet__head-text">
                        Statistics
                    </h3>
                </div>
            </div>
        </div>
    </div>
@endsection

