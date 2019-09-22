<!DOCTYPE html>
<html lang="en">

<!-- begin::Head -->
<head>
    <meta charset="utf-8"/>
    <title>admin panel | @yield('title') </title>
    <meta name="description" content="Latest updates and statistic charts">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">

    <!--begin::Web font -->
    <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>
    <script>
        WebFont.load({
            google: {"families": ["Poppins:300,400,500,600,700", "Roboto:300,400,500,600,700"]},
            active: function () {
                sessionStorage.fonts = true;
            }
        });
    </script>



    <!--end::Web font -->

    <!--begin::Global Theme Styles -->
{!! Html::style('admin/vendors/base/vendors.bundle.css') !!}
{!! Html::style('admin/demo/default/base/style.bundle.css') !!}
{!! Html::style('admin/vendors/custom/datatables/datatables.bundle.css') !!}

{!! Html::style('admin/custom/toastr/toastr.min.css') !!}
<!-- {!! Html::style('admin/custom/css/custom-rtl.css') !!} -->
{{--{!! Html::style('admin/custom/css/components.css') !!}--}}

{!! Html::style('admin/plugins/sweetalert/sweet-alert.css') !!}
{!! Html::style('admin/plugins/fileuploads/css/dropify.min.css') !!}
{!! Html::style('admin/plugins/parsleyjs/src/parsley.css') !!}


{!! Html::style('admin/custom/css/main.css') !!}

<style type="text/css">
       /* .modal {
    overflow-y: hidden !important;
}*/

/*$(".modal").on("hidden.bs.modal", function(){
    $(".modal-body").html("");
});*/
    </style>

<!--end::Global Theme Styles -->
    <link rel="shortcut icon" href="{{Request::root()}}/admin/demo/default/media/img/logo/favicon.ico"/>
    <!--begin::Page Vendors Styles -->
@yield('header')
<!--end::Page Vendors Styles -->
</head>

<!-- end::Head -->

<!-- begin::Body -->
<body class="m-page--fluid m--skin- m-content--skin-light2 m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--fixed m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default {{Request::url() == Request::root().'/admincp' ?: 'm-brand--minimize m-aside-left--minimize'}}">

<!-- begin:: Page -->
<div class="m-grid m-grid--hor m-grid--root m-page">

    <!-- BEGIN: Header -->
    <header id="m_header" class="m-grid__item    m-header " m-minimize-offset="200" m-minimize-mobile-offset="200">
        <div class="m-container m-container--fluid m-container--full-height">
            <div class="m-stack m-stack--ver m-stack--desktop">

                <!-- BEGIN: Brand -->
                <div class="m-stack__item m-brand  m-brand--skin-dark ">
                    <div class="m-stack m-stack--ver m-stack--general">
                        <div class="m-stack__item m-stack__item--middle m-brand__logo">
                            <a href="/admincp/dashboard" class="m-brand__logo-wrapper">
                                <img alt=""
                                     src="{{Request::root()}}/admin/demo/default/media/img/logo/logo_default_dark.png"/>
                            </a>
                        </div>
                        <div class="m-stack__item m-stack__item--middle m-brand__tools">

                            <!-- BEGIN: Left Aside Minimize Toggle -->
                            <a href="javascript:;" id="m_aside_left_minimize_toggle"
                               class="m-brand__icon m-brand__toggler m-brand__toggler--left m--visible-desktop-inline-block  ">
                                <span></span>
                            </a>

                            <!-- END -->

                            <!-- BEGIN: Responsive Aside Left Menu Toggler -->
                            <a href="javascript:;" id="m_aside_left_offcanvas_toggle"
                               class="m-brand__icon m-brand__toggler m-brand__toggler--left m--visible-tablet-and-mobile-inline-block">
                                <span></span>
                            </a>

                            <!-- END -->

                            <!-- BEGIN: Responsive Header Menu Toggler -->
                            <a id="m_aside_header_menu_mobile_toggle" href="javascript:;"
                               class="m-brand__icon m-brand__toggler m--visible-tablet-and-mobile-inline-block">
                                <span></span>
                            </a>

                            <!-- END -->

                            <!-- BEGIN: Topbar Toggler -->
                            <a id="m_aside_header_topbar_mobile_toggle" href="javascript:;"
                               class="m-brand__icon m--visible-tablet-and-mobile-inline-block">
                                <i class="flaticon-more"></i>
                            </a>

                            <!-- BEGIN: Topbar Toggler -->
                        </div>
                    </div>
                </div>

                <!-- END: Brand -->
                <div class="m-stack__item m-stack__item--fluid m-header-head" id="m_header_nav">

                    <!-- BEGIN: Horizontal Menu -->
                    <button class="m-aside-header-menu-mobile-close  m-aside-header-menu-mobile-close--skin-dark "
                            id="m_aside_header_menu_mobile_close_btn"><i class="la la-close"></i></button>
                    <div id="m_header_menu"
                         class="m-header-menu m-aside-header-menu-mobile m-aside-header-menu-mobile--offcanvas  m-header-menu--skin-light m-header-menu--submenu-skin-light m-aside-header-menu-mobile--skin-dark m-aside-header-menu-mobile--submenu-skin-dark ">
                        <ul class="m-menu__nav  m-menu__nav--submenu-arrow ">
                            @yield('topBar')
                        </ul>
                    </div>

                    <!-- END: Horizontal Menu -->

                    <!-- BEGIN: Topbar -->
                    <div id="m_header_topbar" class="m-topbar  m-stack m-stack--ver m-stack--general m-stack--fluid">
                        <div class="m-stack__item m-topbar__nav-wrapper">
                            <ul class="m-topbar__nav m-nav m-nav--inline">

                                <li class="m-nav__item m-topbar__user-profile m-topbar__user-profile--img  m-dropdown m-dropdown--medium m-dropdown--arrow m-dropdown--header-bg-fill m-dropdown--align-right m-dropdown--mobile-full-width m-dropdown--skin-light"
                                    m-dropdown-toggle="click">
                                    <a href="#" class="m-nav__link m-dropdown__toggle">
												<span class="m-topbar__userpic">
													<img src="{{isset($admin) && $admin->photo != null ? $admin->photo : URL::to('/uploads/admin/default.png')}}"
                                                         class="m--img-rounded m--marginless" alt=""/>
												</span>
                                        <span class="m-topbar__username m--hide">{{isset($admin) ? $admin->name : ''}}</span>
                                    </a>
                                    <div class="m-dropdown__wrapper">
                                        <span class="m-dropdown__arrow m-dropdown__arrow--left m-dropdown__arrow--adjust"></span>
                                        <div class="m-dropdown__inner">
                                            <div class="m-dropdown__header m--align-center"
                                                 style="background: url({{Request::root()}}/admin/app/media/img/misc/user_profile_bg.jpg); background-size: cover;">
                                                <div class="m-card-user m-card-user--skin-dark">
                                                    <div class="m-card-user__pic">
                                                        <img src="{{isset($admin) && $admin->photo != null ? $admin->photo : URL::to('/uploads/admin/default.png')}}"
                                                             class="m--img-rounded m--marginless" alt=""/>

->
                                                    </div>
                                                    <div class="m-card-user__details">
                                                        <span class="m-card-user__name m--font-weight-500">{{isset($admin) ? $admin->name : ''}}</span>
                                                        <a href="" class="m-card-user__email m--font-weight-300 m-link">{{isset($admin) ? $admin->email : ''}}</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="m-dropdown__body">
                                                <div class="m-dropdown__content">
                                                    <ul class="m-nav m-nav--skin-light">
                                                        <li class="m-nav__section m--hide">
                                                            <span class="m-nav__section-text">Section</span>
                                                        </li>
                                                        <li class="m-nav__separator m-nav__separator--fit">
                                                        </li>
                                                        <li class="m-nav__item">
                                                            <form method="post" action="" id="form_logout">
                                                            <button type="submit"
                                                               class="btn m-btn--pill    btn-secondary m-btn m-btn--custom m-btn--label-brand m-btn--bolder">Logout</button>

                                                            </form>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <!-- END: Topbar -->
                </div>
            </div>
        </div>
    </header>

    <!-- END: Header -->

    <!-- begin::Body -->
    <div class="m-grid__item m-grid__item--fluid m-grid m-grid--ver-desktop m-grid--desktop m-body">

        <!-- BEGIN: Left Aside -->
        <button class="m-aside-left-close  m-aside-left-close--skin-dark " id="m_aside_left_close_btn"><i class="la la-close"></i></button>
        <div id="m_aside_left" class="m-grid__item	m-aside-left  m-aside-left--skin-dark ">

            <!-- BEGIN: Aside Menu -->
            <div id="m_ver_menu" class="m-aside-menu  m-aside-menu--skin-dark m-aside-menu--submenu-skin-dark "
                 m-menu-vertical="1" m-menu-scrollable="1" m-menu-dropdown-timeout="500" style="position: relative;">
                <ul class="m-menu__nav  m-menu__nav--dropdown-submenu-arrow ">
                    @include('admin.layouts.side')
                </ul>
            </div>

            <!-- END: Aside Menu -->
        </div>

        <!-- END: Left Aside -->
        <div class="m-grid__item m-grid__item--fluid m-wrapper">
            <div class="m-content">
                @yield('content')
            </div>
        </div>
    </div>

    <!-- end:: Body -->

    <!-- begin::Footer -->
    <footer class="m-grid__item		m-footer ">
        <div class="m-container m-container--fluid m-container--full-height m-page__container">
            <div class="m-stack m-stack--flex-tablet-and-mobile m-stack--ver m-stack--desktop">
                <div class="m-stack__item m-stack__item--left m-stack__item--middle m-stack__item--last">
                    <span class="m-footer__copyright">
                        <?php echo date('Y'); ?> &copy; تم التطوير بواسطه
                    </span>
                </div>
            </div>
        </div>
    </footer>
    <!-- end::Footer -->
</div>

<!-- end:: Page -->

<!-- begin::Scroll Top -->
<div id="m_scroll_top" class="m-scroll-top">
    <i class="la la-arrow-up"></i>
</div>

<!-- end::Scroll Top -->


<!--begin::Global Theme Bundle -->
{!! Html::script('admin/plugins/jquery.min.js') !!}
{!! Html::script('admin/vendors/base/vendors.bundle.js') !!}
{!! Html::script('admin/demo/default/base/scripts.bundle.js') !!}
{!! Html::script('admin/vendors/custom/datatables/datatables.bundle.js') !!}
{!! Html::script('admin/plugins/datatables/basic/paginations.js') !!}

{!! Html::script('admin/custom/toastr/toastr.min.js') !!}
{!! Html::script('admin/plugins/sweetalert/sweet-alert.min.js') !!}
{!! Html::script('admin/plugins/fileuploads/js/dropify.min.js') !!}
{!! Html::script('admin/plugins/parsleyjs/dist/parsley.min.js') !!}

{!! Html::script('admin/demo/default/custom/crud/forms/widgets/select2.js') !!}


<script>

    @if(session()->has('success'))
        setTimeout(function () {
                showMessage('{{ session()->get('success') }}' , 'success');
            }, 3000);
        @endif

    @if(session()->has('error'))
        setTimeout(function () {
                showMessage('{{ session()->get('error') }}' , 'error');
            }, 3000);
    @endif

    function showMessage(message , type) {
            var shortCutFunction = type ;
            var msg = message;
            var title = '';
            toastr.options = {
                positionClass: 'toast-top-center',
                onclick: null,
                showMethod: 'slideDown',
                hideMethod: "slideUp",
            };
            var $toast = toastr[shortCutFunction](msg, title);
            $toastlast = $toast;
        }

    function redirectPage(route) {

        window.history.pushState("", "", route);
    }

    $('.dropify').dropify({
        messages: {
            'default': 'drag and drop the photo',
            'replace': 'replace photo',
            'remove': 'x',
            'error': 'try again'
        },
        error: {
            'fileSize': 'The file size is too big (5M max).',
            'imageFormat': 'The image format is not allowed).'
        }
    });

    $(document).ready(function () {
        $('form').parsley();

    });


</script>

<!--end::Page Scripts -->
<!-- jquery validation -->
<!-- <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.17.0/dist/jquery.validate.min.js"></script> -->
<!-- <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.17.0/dist/additional-methods.min.js"></script> -->
<!-- {!! Html::script('admin/custom/js/validation.js') !!} -->
{!! Html::script('admin/custom/js/del-row.js') !!}

<!--begin::Page Vendors -->
@yield('footer')
<!--end::Page Vendors -->
<div class="d-none">
    <span id="d-root" data-root="{{Request::url()}}"></span>
    <span id="d-fmsg">{!! Session::get("flash_message") !!}</span>
</div>
</body>

<!-- end::Body -->
</html>
