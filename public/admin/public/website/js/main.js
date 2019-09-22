$(document).ready(function () {
    // Cache selectors
    topMenu = $("#top-menu"),
        cevron = $('.scroll').find("a"),
        topMenuHeight = topMenu.outerHeight() + 15,
        // All list items
        menuItems = topMenu.find("a"),
        // Anchors corresponding to menu items
        scrollItems = menuItems.map(function () {
            var item = $($(this).attr("href"));
            if (item.length) {
                return item;
            }
        });

    // Bind click handler to menu items
    // so we can get a fancy scroll animation
    menuItems.click(function (e) {
        var href = $(this).attr("href"),
            offsetTop = href === "#" ? 0 : $(href).offset().top - topMenuHeight + 1;
        $('html, body').stop().animate({
            scrollTop: offsetTop
        }, 800);
        e.preventDefault();
    });

    cevron.click(function (e) {
        var href = $(this).attr("href"),
            offsetTop = href === "#" ? 0 : $(href).offset().top - topMenuHeight + 1;
        $('html, body').stop().animate({
            scrollTop: offsetTop
        }, 800);
        e.preventDefault();
    });

    //   $(window).scroll(function() {

    //     var position = $(window).scrollTop();

    //     $('section').each(function() {
    //         var target = $(this).offset().top;
    //         var id = $(this).attr('id');

    //         if (position >= target) {
    //           $('a.nav-link').removeClass('active');
    //           $('a.nav-link').attr('href', id).addClass('active');
    //       }
    //     });
    // });

    $('.close').on("click", function () {
        $("img.removed").hide(500);
        $(this).hide(500);
    });

    // tabs
    $('.editting img').on("mouseover", function () {
        $(this).attr('src', "/website/imgs/edit-hover.png");
    });
    $('.editting img').on("mouseout", function () {
        $(this).attr('src', "/website/imgs/edit.png");
    });

    // Arabic lang
    function changLangAr() {
        $('html').find('.about').addClass("dir right");
        $('html').find('.info').addClass("right");
        $('html').find('.contactUs').addClass("dir right");
        $('html').find('.reSign-as').addClass("bordrRight");
        $('html').find('.editting a').addClass("floatLeft");
        $('html').find('.left').css('text-align', 'right');
        $('html').find('h1').addClass("center arFontTitle");
        $('html').find('h2').addClass("arFontTitle");
        $('html').find('h3').addClass("arFontTitle");
        $('html').find('.solutions h3').addClass("center");
        $('html').find('.about h3').removeClass("left");
        $('html').find('.about h3').addClass("right");
        $('html').find('h4').addClass("arFontTitle");
        $('html').find('.btn').addClass("center arFontTitle");
        $('html').find('.nav-link').addClass("arFontTitle");
        $('html').find('p').addClass("arFontText");
        $('html').find('label').addClass("arFontText");
        $('html').find('.dropdown-item').addClass("righty arFontTitle");
        $('html').find('nav btn').addClass("right");
        $('html').find('.navbar-collapse').addClass("right");
        $('html').find('header .signUp-menu').addClass("right");
        $('html').find('.arFontTitle').addClass("right");
        $('html').find('.checkmark').addClass('pRight');
        $('html').find('.options').addClass('dir');
        $('html').find('.navbar').addClass('dir');
        $('html').find('.navbar').addClass('dir');
        $('html').find('header .signUp-menu').css("float", 'left');
        $('html').find('.navbar-nav').addClass('navAr');
        $('html').find('.dropdown-menu').addClass('ar');
        $('html').find('.solutions ul').addClass('dir');
        $('html').find('.tab-pane > div').css('float', 'right');
        $('html').find('.tab-pane > div').addClass('right');
        $('html').find('.solutions h2').removeClass("left");
        $('html').find('.solutions h2').addClass("right");
        $('html').find('.nav-justified .nav-item:first-of-type').css({
            marginLeft: 0,
            marginRight: 15
        });
        $('html').find('.nav-justified .nav-item:last-of-type').css({
            marginLeft: 15,
            marginRight: 0
        });
    }

    function changLangEn() {
        $('html').find('.about').removeClass("dir right");
        $('html').find('.info').removeClass("right");
        $('html').find('.contactUs').removeClass("dir right");
        $('html').find('.reSign-as').removeClass("bordrRight");
        $('html').find('.editting a').removeClass("floatLeft");
        $('html').find('.left').css('text-align', 'left');
        $('html').find('h1').removeClass("arFontTitle");
        $('html').find('h2').removeClass("arFontTitle");
        $('html').find('h3').removeClass("arFontTitle");
        $('html').find('.solutions h3').addClass("center");
        $('html').find('.about h3').removeClass("right");
        $('html').find('.about h3').addClass("left");
        $('html').find('h4').removeClass("arFontTitle");
        $('html').find('.btn').removeClass("center arFontTitle");
        $('html').find('.nav-link').removeClass("arFontTitle");
        $('html').find('p').removeClass("arFontText");
        $('html').find('label').removeClass("arFontText");
        $('html').find('.dropdown-item').removeClass("righty arFontTitle");
        $('html').find('nav btn').removeClass("right");
        $('html').find('.navbar-collapse').removeClass("right");
        $('html').find('header .signUp-menu').removeClass("right");
        $('html').find('.arFontTitle').removeClass("right");
        $('html').find('.checkmark').removeClass('pRight');
        $('html').find('.options').removeClass('dir');
        $('html').find('.options').css('ddirectionir', 'ltr');
        $('html').find('.navbar').removeClass('dir');
        $('html').find('.navbar').removeClass('dir');
        $('html').find('header .signUp-menu').css("float", 'right');
        $('html').find('.navbar-nav').removeClass('navAr');
        $('html').find('.dropdown-menu').removeClass('ar');
        $('html').find('.solutions ul').removeClass('dir');
        $('html').find('.tab-pane > div').css('float', 'left');
        $('html').find('.tab-pane > div').removeClass('right');
        $('html').find('.solutions h2').removeClass("right");
        $('html').find('.solutions h2').addClass("left");
        $('html').find('.nav-justified .nav-item:first-of-type').css({
            marginLeft: 15,
            marginRight: 0
        });
        $('html').find('.nav-justified .nav-item:last-of-type').css({
            marginLeft: 0,
            marginRight: 15
        });
    }

    // end Arabic lang

    // switching lang
    $('.dropdown-menu a:first-of-type').on('click', function () {
        $('html').attr('lang', 'ar');
        changLangAr();
        if ($(window).width() <= 991) {
            if ($('html').attr('lang', 'ar')) {
                $('html').find('.dropdown-menu').addClass("righty");
                $('html').find('.dropdown-menu').removeClass("lefty");
                $('html').find('.registration .btn.signUp-menu').css('float', 'right');
                $('html').find('.registration .btn:first-of-type').removeClass('left center');
                $('html').find('.registration .btn:first-of-type').addClass('right');
                $('html').find('.nav-link').removeClass("left");
                $('html').find('.nav-link').addClass("right");
            }
        }
    });

    $('.dropdown-menu a:last-of-type').on('click', function () {
        $('html').attr('lang', 'en');
        changLangEn();
        if ($(window).width() <= 991) {
            if ($('html').attr('lang', 'en')) {
                $('html').find('.dropdown-menu').removeClass("righty");
                $('html').find('.dropdown-menu').addClass("lefty");
                $('html').find('.registration .btn.signUp-menu').css('float', 'left');
                $('html').find('.registration .btn:first-of-type').removeClass('right center');
                $('html').find('.registration .btn:first-of-type').css("text-align", 'left');
                $('html').find('.registration .btn:first-of-type').addClass('left');
                $('html').find('.nav-link').removeClass("arFontTitle");
                $('html').find('.nav-link').css("text-align", 'left');
                $('html').find('.nav-link').removeClass("right");
                $('html').find('.nav-link').addClass("left");
            }
        }
    });
    // end switching lang

    function readFile() {

        if (this.files && this.files[0]) {

            var FR = new FileReader();

            FR.addEventListener("load", function (e) {
                document.getElementById("blah").src = e.target.result;
                document.getElementById("blah").parentElement.classList.remove('d-none');
                // document.getElementById("b64").innerHTML = e.target.result;
            });

            FR.readAsDataURL(this.files[0]);
        }
    }
    document.getElementById("inputGroupFile01").addEventListener("change", readFile);

});

$('.delete-btn').on('click', function () {
    $(this).parent().addClass('d-none');
    $(this).closest('#blah').remove();
})

/** Ahmed Hafez **/
/** CLOSE MAIN NAVIGATION WHEN CLICKING OUTSIDE THE MAIN NAVIGATION AREA**/
$(document).on('click', function (e) {
    /* bootstrap 4 collapse js adds "show" class to your collapsible element*/
    var menu_opened = $('#main-navigation').hasClass('show');

    if (!$(e.target).closest('#main-navigation').length &&
        !$(e.target).is('#main-navigation') &&
        menu_opened === true) {
        $('#main-navigation').collapse('toggle');
    }

});


/* home blog carousal */
$(document).ready(function () {
    $('.owl-carousel').owlCarousel({
        loop: true,
        margin: 30,
        nav: true,
        dots: false,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 3
            },
            1000: {
                items: 3
            }
        }
    })
});
