$( document ).ready(function() {
    function setCookie(name, value, expires, path, domain, secure) {
        document.cookie = name + "=" + escape(value) +
            ((expires) ? "; expires=" + expires : "") +
            ((path) ? "; path=" + path : "") +
            ((domain) ? "; domain=" + domain : "") +
            ((secure) ? "; secure" : "");
    }
    function getCookie(name) {
        var cookie = " " + document.cookie;
        var search = " " + name + "=";
        var setStr = null;
        var offset = 0;
        var end = 0;
        if (cookie.length > 0) {
            offset = cookie.indexOf(search);
            if (offset != -1) {
                offset += search.length;
                end = cookie.indexOf(";", offset)
                if (end == -1) {
                    end = cookie.length;
                }
                setStr = unescape(cookie.substring(offset, end));
            }
        }
        return(setStr);
    }
    AOS.init({
        // Global settings:
        disable: false, // accepts following values: 'phone', 'tablet', 'mobile', boolean, expression or function
        startEvent: 'DOMContentLoaded', // name of the event dispatched on the document, that AOS should initialize on
        initClassName: 'aos-init', // class applied after initialization
        animatedClassName: 'aos-animate', // class applied on animation
        useClassNames: false, // if true, will add content of `data-aos` as classes on scroll
        disableMutationObserver: false, // disables automatic mutations' detections (advanced)
        debounceDelay: 50, // the delay on debounce used while resizing window (advanced)
        throttleDelay: 99, // the delay on throttle used while scrolling the page (advanced)
        // Settings that can be overridden on per-element basis, by `data-aos-*` attributes:
        offset: 200, // offset (in px) from the original trigger point
        delay: 0, // values from 0 to 3000, with step 50ms
        duration: 1200, // values from 0 to 3000, with step 50ms
        easing: 'ease', // default easing for AOS animations
        once: true, // whether animation should happen only once - while scrolling down
        mirror: false, // whether elements should animate out while scrolling past them
        anchorPlacement: 'top-bottom', // defines which position of the element regarding to window should trigger the animation

    });
    if ($(".banner").length){
        var swiper = new Swiper(".banner__container", {
            effect: 'fade',
            navigation: {
                nextEl: '.banner .swiper-next',
                prevEl: '.banner .swiper-prev',
            },
            fadeEffect: {
                crossFade: true
            },
        });
    };

    if ($(".header").length){
        $(".mobile-burger").click( function(e) {
            $('.mobile-menu').fadeToggle().css('display', 'flex');
            $('body').toggleClass('locked');
        });
        $(".mobile-menu li a").click( function(e) {
            $('.mobile-menu').fadeOut(300);
            $('body').toggleClass('locked');
        });
    };


    function submitFromAuthForm(e) {
        e.preventDefault();

        var formData = new FormData(this);

        for (var key of formData.keys()) {

            if (validation_title = $(`label[for=${key}] .validate`)[0]) {
                validation_title.innerHTML = '';
            }
        }

        $.ajax({
            method: this.method,
            url: this.action,
            data: formData,
            dataType: 'JSON',
            contentType: false,
            cache: false,
            processData: false,
            success: function (data, textStatus, jqXHR) {
                console.log(data, textStatus, jqXHR)
                if(jqXHR.status == 204) {
                    console.log(data)
                    return ;
                }
                document.location.href = data.redirectTo;
            }
        })
            .catch(function (data) {

                $.each(data.responseJSON.errors, function (key, value) {
                    $(`label[for=${key}] .validate`)[0].innerHTML = value[0];
                })
            })

        return false;
    }

    if($('.tabs-elements').length){
        $(".tabs-elements .tabs-nav-item").click(function() {
            $(".tabs-elements .tabs-nav-item").removeClass("active").eq($(this).index()).addClass("active");
            $(".tabs-elements .tabs-content-item").hide().eq($(this).index()) .css("display", "flex")
                .hide()
                .fadeIn();
        }).eq(0).addClass("active");
        $(".tabs-elements .tabs-content-item").eq(0).addClass("active");
    }

    if ($('#map').length){
        if (  jQuery(window).width() >= 1024 ) {

            var FirstCoord = 55.797795;
            var SecondCoord = 37.497162;

            var CenterFirstCoord = 55.797795;
            var CenterSecondCoord = 37.497162;
        } else {
            var FirstCoord = 55.797795;
            var SecondCoord = 37.497162;

            var CenterFirstCoord = FirstCoord;
            var CenterSecondCoord = SecondCoord;
        }
        ymaps.ready(function () {

            var IconUrl = $('#map').data('icon');
            var myMap = new ymaps.Map('map', {
                    center: [CenterFirstCoord, CenterSecondCoord],
                    controls: [],
                    zoom: 16
                }, {
                    searchControlProvider: true
                }),


                // Создаём макет содержимого.
                MyIconContentLayout = ymaps.templateLayoutFactory.createClass(
                    '<div style="color: #FFFFFF; font-weight: bold;">$[properties.iconContent]</div>'
                ),

                myPlacemark = new ymaps.Placemark(myMap.getCenter(), {
                }, {
                    // Опции.
                    // Необходимо указать данный тип макета.
                    // Своё изображение иконки метки.
                    iconImageHref: "",
                    // Размеры метки.
                    iconImageSize: [0, 0],
                    // Смещение левого верхнего угла иконки относительно
                    // её "ножки" (точки привязки).
                }),
                myPlacemarkWithContent = new ymaps.Placemark([FirstCoord, SecondCoord], {
                }, {
                    // Опции.
                    // Необходимо указать данный тип макета.
                    iconLayout: 'default#imageWithContent',
                    // Своё изображение иконки метки.
                    iconImageHref: IconUrl,
                    // Размеры метки.
                    iconImageSize: [54, 67],
                    // Смещение левого верхнего угла иконки относительно
                    // её "ножки" (точки привязки).
                    iconImageOffset: [-27, -22],
                    // Смещение слоя с содержимым относительно слоя с картинкой.
                    iconContentOffset: [-27, -22],
                    // Макет содержимого.
                    iconContentLayout: MyIconContentLayout
                });
            myMap.behaviors.disable('scrollZoom');
            myMap.geoObjects
                // .add(myPlacemark)
                .add(myPlacemarkWithContent);
        });
    }
});




