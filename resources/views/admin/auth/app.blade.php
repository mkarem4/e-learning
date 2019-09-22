<!DOCTYPE html>
<html lang="en">

<!-- begin::Head -->
<head>
    <meta charset="utf-8" />
    <title>لوحة التحكم | تسجيل الدخول</title>
    <meta name="description" content="Latest updates and statistic charts">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">

    <!--begin::Web font -->
    <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>
    <script>
        WebFont.load({
            google: {"families":["Poppins:300,400,500,600,700","Roboto:300,400,500,600,700"]},
            active: function() {
                sessionStorage.fonts = true;
            }
        });
    </script>

    <!--end::Web font -->

    <!--begin::Global Theme Styles -->
{!! Html::style('admin/vendors/base/vendors.bundle.rtl.css') !!}
{!! Html::style('admin/demo/default/base/style.bundle.css') !!}

<!--end::Global Theme Styles -->
    <link rel="shortcut icon" href="{{Request::root()}}/admin/demo/default/media/img/logo/favicon.ico" />
</head>

<!-- end::Head -->

<!-- begin::Body -->
<body class="m--skin- m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--fixed m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default">

<!-- begin:: Page -->
@yield('content')
<!-- end:: Page -->

<!--begin::Global Theme Bundle -->
{!! Html::script('admin/vendors/base/vendors.bundle.js') !!}
{!! Html::script('admin/demo/default/base/scripts.bundle.js') !!}

<!--end::Global Theme Bundle -->

<!--begin::Page Scripts -->
{!! Html::script('admin/snippets/custom/pages/user/login.js') !!}


{!! Html::style('admin/custom/validationEngine/jquery.validationEngine.css') !!}
{!! Html::script('admin/custom/validationEngine/jquery.validationEngine.js') !!}

@if(App::getLocale()=="ar")
{!! Html::script('admin/custom/validationEngine/languages/jquery.validationEngine-ar.js') !!}
@else
{!! Html::script('admin/custom/validationEngine/languages/jquery.validationEngine-en.js') !!}

@endif
{!! Html::script('admin/custom/js/validateform.js') !!}

<!--end::Page Scripts -->
    @include('admin.auth.script');

<!--end::Page Scripts -->
</body>

<!-- end::Body -->
</html>