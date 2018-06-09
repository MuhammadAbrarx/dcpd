
$(document).ready(function(){

  // var owl = $(".owl-carousel");
  // var owl = $("#owl-slider");
  var oc = $('#owl-post-gallery');
  oc.each(function () {
    var el = $(this);
    el.owlCarousel($.extend({
        autoplay: 2000,
        loop: true,
        items: 4,
        autowidth: true,
        nav: false,
        dots: false,
        margin: 30
    }, el.data('carousel-options')));
});
});

