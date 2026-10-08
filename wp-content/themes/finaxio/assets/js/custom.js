(function ($) {
  "use strict";
  // /*========== Responsive Menu  ==========*/
  $(".header-meanmenu").meanmenu({
    meanMenuContainer: ".responsive-menu",
    meanScreenWidth: "991",
    meanMenuOpen: "<span></span><span></span><span></span>",
    meanMenuClose: '<i class="fal fa-times"></i>',
  });
  /*========== menu-bar sticky  ==========*/
  $(window).on("scroll", function () {
    var scrollDown = $(window).scrollTop();
    if (scrollDown < 135) {
      $(".header__sticky").removeClass("header__sticky-sticky-menu");
    } else {
      $(".header__sticky").addClass("header__sticky-sticky-menu");
    }
  });
  /*========== menu-bar sticky  ==========*/
  $(window).on("scroll", function () {
    var scrollDown = $(window).scrollTop();
    if (scrollDown < 135) {
      $(".header__sticky-three").removeClass(
        "header__sticky-three-sticky-menu"
      );
    } else {
      $(".header__sticky-three").addClass("header__sticky-three-sticky-menu");
    }
  });
  ///=============  Sidebar Popup  =============\\\
  $(".header__area-menu-bar-right-sidebar-popup-icon").on("click", function () {
    $(".header__area-menu-bar-right-sidebar-popup").addClass("active");
  });
  $(".header__area-menu-bar-right-sidebar-popup .sidebar-close-btn").on(
    "click",
    function () {
      $(".header__area-menu-bar-right-sidebar-popup").removeClass("active");
    }
  );
  $(".header__area-menu-bar-right-sidebar-popup-icon").on("click", function () {
    $(".sidebar-overlay").addClass("show");
  });
  $(".header__area-menu-bar-right-sidebar-popup .sidebar-close-btn").on(
    "click",
    function () {
      $(".sidebar-overlay").removeClass("show");
    }
  );
  /*==========  Search  ==========*/
  $(".header__area-menu-bar-right-item-search-icon.open").on(
    "click",
    function () {
      $(".header__area-menu-bar-right-item-search-box")
        .fadeIn()
        .addClass("active");
    }
  );
  $(".header__area-menu-bar-right-item-search-box-icon").on(
    "click",
    function () {
      $(this).fadeIn().removeClass("active");
    }
  );
  $(".header__area-menu-bar-right-item-search-box-icon i").on(
    "click",
    function () {
      $(".header__area-menu-bar-right-item-search-box")
        .fadeOut()
        .removeClass("active");
    }
  );
  $(".header__area-menu-bar-right-item-search-box form").on(
    "click",
    function (e) {
      e.stopPropagation();
    }
  );

  /*==========  background  ==========*/
  $("[data-background]").each(function () {
    $(this).css(
      "background-image",
      "url(" + $(this).attr("data-background") + ")"
    );
  });
  /*==========  counterUp  ==========*/
  var counter = $(".counter");
  counter.counterUp({
    time: 2500,
    delay: 100,
  });

  ///============= * Theme Loader  =============\\\
  $(window).on("load", function () {
    $(".theme-loader").fadeOut(0.0009);
  });

  /*==========  Team Skill Bar  ==========*/
  if ($(".team__details-right-skill-item-bar").length) {
    $(".team__details-right-skill-item-bar").appear(
      function () {
        var el = $(this);
        var percent = el.data("width");
        $(el).css("width", percent + "%");
      },
      {
        accY: 0,
      }
    );
  }
  /*========== scroll to top  ==========*/
  var scrollPath = document.querySelector(
    ".scroll-up path, .scroll-two path, .scroll-three path"
  );
  var pathLength = scrollPath.getTotalLength();
  scrollPath.style.transition = scrollPath.style.WebkitTransition = "none";
  scrollPath.style.strokeDasharray = pathLength + " " + pathLength;
  scrollPath.style.strokeDashoffset = pathLength;
  scrollPath.getBoundingClientRect();
  scrollPath.style.transition = scrollPath.style.WebkitTransition =
    "stroke-dashoffset 10ms linear";
  var updatescroll = function () {
    var scroll = $(window).scrollTop();
    var height = $(document).height() - $(window).height();
    var scroll = pathLength - (scroll * pathLength) / height;
    scrollPath.style.strokeDashoffset = scroll;
  };
  updatescroll();
  $(window).scroll(updatescroll);
  var offset = 50;
  var duration = 950;
  jQuery(window).on("scroll", function () {
    if (jQuery(this).scrollTop() > offset) {
      jQuery(".scroll-up, .scroll-two, .scroll-three").addClass(
        "active-scroll"
      );
    } else {
      jQuery(".scroll-up, .scroll-two, .scroll-three").removeClass(
        "active-scroll"
      );
    }
  });
  jQuery(".scroll-up, .scroll-two, .scroll-three").on(
    "click",
    function (event) {
      event.preventDefault();
      jQuery("html, body").animate(
        {
          scrollTop: 0,
        },
        duration
      );
      return false;
    }
  );
  var swiper = new Swiper(".mySwiper", {
    loop: true,
    spaceBetween: 10,
    slidesPerView: 4,
    freeMode: true,
    watchSlidesProgress: true,
  });
  var swiper2 = new Swiper(".mySwiper2", {
    loop: true,
    spaceBetween: 10,
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
    thumbs: {
      swiper: swiper,
    },
  });
  /*==========  menu scroll  ==========*/
  $(".header-meanmenu li a").on("click", function (event) {
    $(".header-meanmenu li a").parent().removeClass("active");
    var $anchor = $($(this).attr("href")).offset().top - 70;
    $(this).parent().addClass("active");
    $("body, html").animate(
      {
        scrollTop: $anchor,
      },
      800
    );
    event.preventDefault();
    return false;
  });
})(jQuery);
