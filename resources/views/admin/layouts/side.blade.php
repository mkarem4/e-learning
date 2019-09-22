<!-- <li class="m-menu__item" aria-haspopup="true">
    <a href="{{url('admincp')}}" class="m-menu__link ">
        <i class="m-menu__link-icon flaticon-line-graph"></i>
        <span class="m-menu__link-title">
            <span class="m-menu__link-wrap">
                <span class="m-menu__link-text">إحصائيات عامة</span>
            </span>
        </span>
    </a>
</li> -->



<li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover">
    <a href="javascript:;" class="m-menu__link m-menu__toggle">
        <i class="m-menu__link-icon flaticon-customer"></i>
        <span class="m-menu__link-text">Admin</span>
        <i class="m-menu__ver-arrow la la-angle-right"></i>
    </a>
    <div class="m-menu__submenu ">
        <span class="m-menu__arrow"></span>
        <ul class="m-menu__subnav">

        <li class="m-menu__item" aria-haspopup="true">
            <a href="{{url('admincp/admins')}}" class="m-menu__link ">
                <i class="m-menu__link-icon flaticon-file"></i>
                <span class="m-menu__link-title">
                    <span class="m-menu__link-wrap">
                        <span class="m-menu__link-text">Admins</span>
                    </span>
                </span>
            </a>
        </li>


        </ul>
    </div>
</li>



