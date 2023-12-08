
<footer>
    <div class="container">
        <div class="row">
            <div class="col-lg-6 text-grey center">
                Copyright © 2021 TutunjiRealty. All Rights Reserved.
            </div>
            <div class="col-lg-6 text-grey text-right center mt-21">
                Designed & Managed By
                <span><a href="" class="text-green">OmnisGO</a></span>
            </div>
        </div>
    </div>
</footer>

<!--    pop up-->
<!-- Modal -->
<div
    class="modal fade"
    id="exampleModal"
    tabindex="-1"
    aria-labelledby="exampleModalLabel"
    aria-hidden="true"
>
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <div class="input-group">
                    <input
                        type=" text"
                        class="form-control br-3"
                        placeholder="Search Properties, Location, Projects..."
                        aria-label="Recipient's username"
                        aria-describedby="button-addon2"
                    />
                    <button
                        class="btn btn-outline-secondary"
                        type="button"
                        id="button-addon2"
                    >
                        <i class="fas fa-search"></i>
                    </button>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">
                    Close
                </button>
            </div>
        </div>
    </div>
</div>
<!--end of pop up-->

<script src="{{asset('')}}frontend/assets/js/jquery.js"></script>
<script src="{{asset('')}}frontend/assets/js/bootstrap.js"></script>
<script src="{{asset('')}}frontend/assets/js/bootstrap.bundle.js"></script>
<script src="{{asset('')}}frontend/assets/js/owl.carousel.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.4/gsap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.4/ScrollTrigger.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.4/ScrollToPlugin.min.js"></script>

<script>
    const scrollToSectionTop = function () {
        var element = document.getElementById("container-gsap");
        var topPos = element.getBoundingClientRect().top + window.scrollY;
        var leftPos = element.getBoundingClientRect().left + window.scrollX;

        window.scrollTo(leftPos, topPos);
    };
</script>

<script>
    var activeBtn1 = document.getElementById("pills-buyer-home-tab");
    var checkBtn1 = activeBtn1.classList.contains("active");

    var activeBtn2 = document.getElementById("pills-seller-profile-tab");
    var checkBtn2 = activeBtn1.classList.contains("active");

    var activeBtn3 = document.getElementById("pills-investing-profile-tab");
    var checkBtn3 = activeBtn1.classList.contains("active");

    if (checkBtn1) {
        (function ($) {
            $(function () {
                console.log("buyer-timeline1");

                $(".buyer-timeline_item").removeClass("js-buyer-active");
                $(".seller-timeline_item").removeClass("js-seller-active");
                $(".investor-timeline_item").removeClass("js-investor-active");

                if (checkBtn1) {
                    $(window).on("scroll", function () {
                        fnOnScroll1();
                    });
                }

                if (checkBtn1) {
                    $(window).on("resize", function () {
                        fnOnResize1();
                    });
                }

                var agTimeline1 = $(".buyer-timeline"),
                    agTimelineLine1 = $(".buyer-timeline_line"),
                    agTimelineLineProgress1 = $(".buyer-timeline_line-progress"),
                    agTimelinePoint1 = $(".buyer-timeline-card_point-box"),
                    agTimelineItem1 = $(".buyer-timeline_item"),
                    agOuterHeight1 = $(window).outerHeight(),
                    agHeight1 = $(window).height(),
                    f1 = -1,
                    agFlag1 = false;

                function fnOnScroll1() {
                    agPosY1 = $(window).scrollTop();

                    fnUpdateFrame1();
                }

                function fnOnResize1() {
                    agPosY1 = $(window).scrollTop();
                    agHeight1 = $(window).height();

                    fnUpdateFrame1();
                }

                function fnUpdateWindow1() {
                    agFlag1 = false;

                    agTimelineLine1.css({
                        top:
                            agTimelineItem1.first().find(agTimelinePoint1).offset().top -
                            agTimelineItem1.first().offset().top,
                        bottom:
                            agTimeline1.offset().top +
                            agTimeline1.outerHeight() -
                            agTimelineItem1.last().find(agTimelinePoint1).offset().top,
                    });

                    f1 !== agPosY1 &&
                    ((f1 = agPosY1), agHeight1, fnUpdateProgress1());
                }

                function fnUpdateProgress1() {
                    var agTop1;
                    if (!checkBtn1) {
                        console.log("hello");
                    } else {
                        agTop1 = agTimelineItem1
                            .last()
                            .find(agTimelinePoint1)
                            .offset().top;
                        i1 = agTop1 + agPosY1 - $(window).scrollTop();
                        a1 =
                            agTimelineLineProgress1.offset().top +
                            agPosY1 -
                            $(window).scrollTop();
                        n1 = agPosY1 - a1 + agOuterHeight1 / 2;
                        i1 <= agPosY1 + agOuterHeight1 / 2 && (n1 = i1 - a1);
                        agTimelineLineProgress1.css({ height: n1 + "px" });

                        agTimelineItem1.each(function () {
                            $(this).removeClass("js-buyer-active");
                            var agTop1 = $(this).find(agTimelinePoint1).offset().top;

                            agTop1 + agPosY1 - $(window).scrollTop() <
                            agPosY1 + 0.5 * agOuterHeight1
                                ? $(this).addClass("js-buyer-active")
                                : $(this).removeClass("js-buyer-active");
                        });
                    }
                }

                function fnUpdateFrame1() {
                    agFlag1 || requestAnimationFrame(fnUpdateWindow1);
                    agFlag1 = true;
                }
            });
        })(jQuery);
    }

    if (checkBtn2) {
        (function ($) {
            $(function () {
                console.log("seller-timeline");

                $(".buyer-timeline_item").removeClass("js-buyer-active");
                $(".seller-timeline_item").removeClass("js-seller-active");
                $(".investor-timeline_item").removeClass("js-investor-active");

                if (checkBtn2) {
                    $(window).on("scroll", function () {
                        fnOnScroll2();
                    });
                }

                if (checkBtn2) {
                    $(window).on("resize", function () {
                        fnOnResize2();
                    });
                }

                var agTimeline2 = $(".seller-timeline"),
                    agTimelineLine2 = $(".seller-timeline_line"),
                    agTimelineLineProgress2 = $(".seller-timeline_line-progress"),
                    agTimelinePoint2 = $(".seller-timeline-card_point-box"),
                    agTimelineItem2 = $(".seller-timeline_item"),
                    agOuterHeight2 = $(window).outerHeight(),
                    agHeight2 = $(window).height(),
                    f2 = -1,
                    agFlag2 = false;

                function fnOnScroll2() {
                    agPosY2 = $(window).scrollTop();

                    fnUpdateFrame2();
                }

                function fnOnResize2() {
                    agPosY2 = $(window).scrollTop();
                    agHeight2 = $(window).height();

                    fnUpdateFrame2();
                }

                function fnUpdateWindow2() {
                    agFlag2 = false;

                    agTimelineLine2.css({
                        top:
                            agTimelineItem2.first().find(agTimelinePoint2).offset().top -
                            agTimelineItem2.first().offset().top,
                        bottom:
                            agTimeline2.offset().top +
                            agTimeline2.outerHeight() -
                            agTimelineItem2.last().find(agTimelinePoint2).offset().top,
                    });

                    f2 !== agPosY2 &&
                    ((f2 = agPosY2), agHeight2, fnUpdateProgress2());
                }

                function fnUpdateProgress2() {
                    var agTop2;
                    if (!checkBtn2) {
                        return;
                    } else {
                        agTop2 = agTimelineItem2
                            .last()
                            .find(agTimelinePoint2)
                            .offset().top;

                        i2 = agTop2 + agPosY2 - $(window).scrollTop();
                        a2 =
                            agTimelineLineProgress2.offset().top +
                            agPosY2 -
                            $(window).scrollTop();
                        n2 = agPosY2 - a2 + agOuterHeight2 / 2;
                        i2 <= agPosY2 + agOuterHeight2 / 2 && (n2 = i2 - a2);
                        agTimelineLineProgress2.css({ height: n2 + "px" });

                        agTimelineItem2.each(function () {
                            $(this).addClass("js-seller-active");
                            var agTop2 = $(this).find(agTimelinePoint2).offset().top;

                            agTop2 + agPosY2 - $(window).scrollTop() <
                            agPosY2 + 0.5 * agOuterHeight2
                                ? $(this).addClass("js-seller-active")
                                : $(this).removeClass("js-seller-active");
                        });
                    }
                }

                function fnUpdateFrame2() {
                    agFlag2 || requestAnimationFrame(fnUpdateWindow2);
                    agFlag2 = true;
                }
            });
        })(jQuery);
    }

    if (checkBtn3) {
        (function ($) {
            $(function () {
                console.log("investor-timeline");

                $(".buyer-timeline_item").removeClass("js-buyer-active");
                $(".seller-timeline_item").removeClass("js-seller-active");
                $(".investor-timeline_item").removeClass("js-investor-active");

                if (checkBtn3) {
                    $(window).on("scroll", function () {
                        fnOnScroll3();
                    });
                }

                if (checkBtn3) {
                    $(window).on("resize", function () {
                        fnOnResize3();
                    });
                }

                var agTimeline3 = $(".investor-timeline"),
                    agTimelineLine3 = $(".investor-timeline_line"),
                    agTimelineLineProgress3 = $(".investor-timeline_line-progress"),
                    agTimelinePoint3 = $(".investor-timeline-card_point-box"),
                    agTimelineItem3 = $(".investor-timeline_item"),
                    agOuterHeight3 = $(window).outerHeight(),
                    agHeight3 = $(window).height(),
                    f3 = -1,
                    agFlag3 = false;

                function fnOnScroll3() {
                    agPosY3 = $(window).scrollTop();

                    fnUpdateFrame3();
                }

                function fnOnResize3() {
                    agPosY3 = $(window).scrollTop();
                    agHeight3 = $(window).height();

                    fnUpdateFrame3();
                }

                function fnUpdateWindow3() {
                    agFlag3 = false;

                    agTimelineLine3.css({
                        top:
                            agTimelineItem3.first().find(agTimelinePoint3).offset().top -
                            agTimelineItem3.first().offset().top,
                        bottom:
                            agTimeline3.offset().top +
                            agTimeline3.outerHeight() -
                            agTimelineItem3.last().find(agTimelinePoint3).offset().top,
                    });

                    f3 !== agPosY3 &&
                    ((f3 = agPosY3), agHeight3, fnUpdateProgress3());
                }

                function fnUpdateProgress3() {
                    var agTop3;
                    if (!checkBtn3) {
                        return;
                    } else {
                        agTop3 = agTimelineItem3
                            .last()
                            .find(agTimelinePoint3)
                            .offset().top;

                        i3 = agTop3 + agPosY3 - $(window).scrollTop();
                        a3 =
                            agTimelineLineProgress3.offset().top +
                            agPosY3 -
                            $(window).scrollTop();
                        n3 = agPosY3 - a3 + agOuterHeight3 / 2;
                        i3 <= agPosY3 + agOuterHeight3 / 2 && (n3 = i3 - a3);
                        agTimelineLineProgress3.css({ height: n3 + "px" });

                        agTimelineItem3.each(function () {
                            $(this).removeClass("js-investor-active");
                            var agTop3 = $(this).find(agTimelinePoint3).offset().top;

                            agTop3 + agPosY3 - $(window).scrollTop() <
                            agPosY3 + 0.5 * agOuterHeight3
                                ? $(this).addClass("js-investor-active")
                                : $(this).removeClass("js-investor-active");
                        });
                    }
                }

                function fnUpdateFrame3() {
                    agFlag3 || requestAnimationFrame(fnUpdateWindow3);
                    agFlag3 = true;
                }
            });
        })(jQuery);
    }

    const sellerTimelineStart = function () {
        (function ($) {
            $(function () {
                console.log("seller-timeline");

                $(".buyer-timeline_item").removeClass("js-buyer-active");
                $(".seller-timeline_item").removeClass("js-seller-active");
                $(".investor-timeline_item").removeClass("js-investor-active");

                if (checkBtn2) {
                    $(window).on("scroll", function () {
                        fnOnScroll2();
                    });
                }

                if (checkBtn2) {
                    $(window).on("resize", function () {
                        fnOnResize2();
                    });
                }

                var agTimeline2 = $(".seller-timeline"),
                    agTimelineLine2 = $(".seller-timeline_line"),
                    agTimelineLineProgress2 = $(".seller-timeline_line-progress"),
                    agTimelinePoint2 = $(".seller-timeline-card_point-box"),
                    agTimelineItem2 = $(".seller-timeline_item"),
                    agOuterHeight2 = $(window).outerHeight(),
                    agHeight2 = $(window).height(),
                    f2 = -1,
                    agFlag2 = false;

                function fnOnScroll2() {
                    agPosY2 = $(window).scrollTop();

                    fnUpdateFrame2();
                }

                function fnOnResize2() {
                    agPosY2 = $(window).scrollTop();
                    agHeight2 = $(window).height();

                    fnUpdateFrame2();
                }

                function fnUpdateWindow2() {
                    agFlag2 = false;

                    agTimelineLine2.css({
                        top:
                            agTimelineItem2.first().find(agTimelinePoint2).offset().top -
                            agTimelineItem2.first().offset().top,
                        bottom:
                            agTimeline2.offset().top +
                            agTimeline2.outerHeight() -
                            agTimelineItem2.last().find(agTimelinePoint2).offset().top,
                    });

                    f2 !== agPosY2 &&
                    ((f2 = agPosY2), agHeight2, fnUpdateProgress2());
                }

                function fnUpdateProgress2() {
                    var agTop2;
                    if (!checkBtn2) {
                        return;
                    } else {
                        agTop2 = agTimelineItem2
                            .last()
                            .find(agTimelinePoint2)
                            .offset().top;

                        i2 = agTop2 + agPosY2 - $(window).scrollTop();
                        a2 =
                            agTimelineLineProgress2.offset().top +
                            agPosY2 -
                            $(window).scrollTop();
                        n2 = agPosY2 - a2 + agOuterHeight2 / 2;
                        i2 <= agPosY2 + agOuterHeight2 / 2 && (n2 = i2 - a2);
                        agTimelineLineProgress2.css({ height: n2 + "px" });

                        agTimelineItem2.each(function () {
                            $(this).addClass("js-seller-active");
                            var agTop2 = $(this).find(agTimelinePoint2).offset().top;

                            agTop2 + agPosY2 - $(window).scrollTop() <
                            agPosY2 + 0.5 * agOuterHeight2
                                ? $(this).addClass("js-seller-active")
                                : $(this).removeClass("js-seller-active");
                        });
                    }
                }

                function fnUpdateFrame2() {
                    agFlag2 || requestAnimationFrame(fnUpdateWindow2);
                    agFlag2 = true;
                }
            });
        })(jQuery);
    };

    const investorTimelineStart = function () {
        (function ($) {
            $(function () {
                console.log("investor-timeline");

                $(".buyer-timeline_item").removeClass("js-buyer-active");
                $(".seller-timeline_item").removeClass("js-seller-active");
                $(".investor-timeline_item").removeClass("js-investor-active");

                if (checkBtn3) {
                    $(window).on("scroll", function () {
                        fnOnScroll3();
                    });
                }

                if (checkBtn3) {
                    $(window).on("resize", function () {
                        fnOnResize3();
                    });
                }

                var agTimeline3 = $(".investor-timeline"),
                    agTimelineLine3 = $(".investor-timeline_line"),
                    agTimelineLineProgress3 = $(".investor-timeline_line-progress"),
                    agTimelinePoint3 = $(".investor-timeline-card_point-box"),
                    agTimelineItem3 = $(".investor-timeline_item"),
                    agOuterHeight3 = $(window).outerHeight(),
                    agHeight3 = $(window).height(),
                    f3 = -1,
                    agFlag3 = false;

                function fnOnScroll3() {
                    agPosY3 = $(window).scrollTop();

                    fnUpdateFrame3();
                }

                function fnOnResize3() {
                    agPosY3 = $(window).scrollTop();
                    agHeight3 = $(window).height();

                    fnUpdateFrame3();
                }

                function fnUpdateWindow3() {
                    agFlag3 = false;

                    agTimelineLine3.css({
                        top:
                            agTimelineItem3.first().find(agTimelinePoint3).offset().top -
                            agTimelineItem3.first().offset().top,
                        bottom:
                            agTimeline3.offset().top +
                            agTimeline3.outerHeight() -
                            agTimelineItem3.last().find(agTimelinePoint3).offset().top,
                    });

                    f3 !== agPosY3 &&
                    ((f3 = agPosY3), agHeight3, fnUpdateProgress3());
                }

                function fnUpdateProgress3() {
                    var agTop3;
                    if (!checkBtn3) {
                        return;
                    } else {
                        agTop3 = agTimelineItem3
                            .last()
                            .find(agTimelinePoint3)
                            .offset().top;
                        i3 = agTop3 + agPosY3 - $(window).scrollTop();
                        a3 =
                            agTimelineLineProgress3.offset().top +
                            agPosY3 -
                            $(window).scrollTop();
                        n3 = agPosY3 - a3 + agOuterHeight3 / 2;
                        i3 <= agPosY3 + agOuterHeight3 / 2 && (n3 = i3 - a3);
                        agTimelineLineProgress3.css({ height: n3 + "px" });

                        agTimelineItem3.each(function () {
                            $(this).removeClass("js-investor-active");
                            var agTop3 = $(this).find(agTimelinePoint3).offset().top;

                            agTop3 + agPosY3 - $(window).scrollTop() <
                            agPosY3 + 0.5 * agOuterHeight3
                                ? $(this).addClass("js-investor-active")
                                : $(this).removeClass("js-investor-active");
                        });
                    }
                }

                function fnUpdateFrame3() {
                    agFlag3 || requestAnimationFrame(fnUpdateWindow3);
                    agFlag3 = true;
                }
            });
        })(jQuery);
    };
</script>

<script>
    $(".testimonial-carousel").owlCarousel({
        loop: true,
        margin: 10,
        nav: true,
        autoplay: true,
        responsive: {
            0: {
                items: 1,
            },
            600: {
                items: 1,
            },
            1000: {
                items: 1,
            },
        },
    });
</script>

<script>
    $(".feature-carousel").owlCarousel({
        loop: true,
        margin: 10,
        nav: false,
        autoplay: true,
        autoplayTimeout: 2000,
        dots: false,
        responsive: {
            0: {
                items: 1,
                dots: true,
            },
            600: {
                items: 3,
                dots: true,
            },
            1000: {
                items: 5,
            },
        },
    });
</script>

<script>
    $(".blog-carousel1").owlCarousel({
        loop: true,
        nav: true,
        stagePadding: 150,
        margin: 20,
        dots: false,
        responsive: {
            0: {
                items: 1,
                stagePadding: 40,
            },
            600: {
                items: 1,
            },
            1000: {
                items: 3,
            },
        },
    });
</script>

<script>
    $(".blog-carousel").owlCarousel({
        loop: true,
        nav: true,
        stagePadding: 150,
        margin: 20,
        dots: false,
        responsive: {
            0: {
                items: 1,
                stagePadding: 40,
            },
            600: {
                items: 1,
            },
            1000: {
                items: 3,
            },
        },
    });
</script>

<script src="{{asset('')}}frontend/assets/js/index.js"></script>

<script>
    $(document).ready(function () {
        var contentSection = $(".content-section");
        var navigation = $(".timeline");

        //when a nav link is clicked, smooth scroll to the section
        navigation.on("click", "a", function (event) {
            event.preventDefault(); //prevents previous event
            smoothScroll($(this.hash));
        });

        //update navigation on scroll...
        $(window).on("scroll", function () {
            updateNavigation();
        });
        //...and when the page starts
        updateNavigation();

        /////FUNCTIONS
        function updateNavigation() {
            contentSection.each(function () {
                var sectionName = $(this).attr("id");
                var navigationMatch = $('nav a[href="#' + sectionName + '"]');
                if (
                    $(this).offset().top - $(window).height() / 2 <
                    $(window).scrollTop() &&
                    $(this).offset().top + $(this).height() - $(window).height() / 2 >
                    $(window).scrollTop()
                ) {
                    navigationMatch.addClass("active-section");
                } else {
                    navigationMatch.removeClass("active-section");
                }
            });
        }

        function smoothScroll(target) {
            $("body,html").animate(
                {
                    scrollTop: target.offset().top,
                },
                800
            );
        }
    });
</script>
<script>
    function getVals() {
        // Get slider values
        let parent = this.parentNode;
        let slides = parent.getElementsByTagName("input");
        let slide1 = parseFloat(slides[0].value);
        let slide2 = parseFloat(slides[1].value);
        // Neither slider will clip the other, so make sure we determine which is larger
        if (slide1 > slide2) {
            let tmp = slide2;
            slide2 = slide1;
            slide1 = tmp;
        }

        let displayElement = parent.getElementsByClassName("rangeValues")[0];
        displayElement.innerHTML = "$" + slide1 + " - $" + slide2;
    }

    window.onload = function () {
        // Initialize Sliders
        let sliderSections = document.getElementsByClassName("range-slider");
        for (let x = 0; x < sliderSections.length; x++) {
            let sliders = sliderSections[x].getElementsByTagName("input");
            for (let y = 0; y < sliders.length; y++) {
                if (sliders[y].type === "range") {
                    sliders[y].oninput = getVals;
                    // Manually trigger event first time to display values
                    sliders[y].oninput();
                }
            }
        }
    };
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.4.2/gsap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.4.2/ScrollTrigger.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.6.0/ScrollToPlugin.min.js"></script>
<script src="{{asset('')}}frontend/assets/js/scriptgsap.js"></script>
</body>
</html>
