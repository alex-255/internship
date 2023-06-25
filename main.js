( function( $ ) {
    
    $(document).ready(function(){

        $('#slider-carousel').slick({
            infinite: true,
            slidesToShow: 1,
            slidesToScroll: 1,
            dots: true,
            arrows: true,
            adaptiveHeight: true,
            responsive: [
                {
                  breakpoint: 900,
                  settings: {
                    dots: false,
                    arrows: false
                  }
                }
            ]
        });

        Fancybox.bind("[data-fancybox]", {

          });
    });



} )( jQuery );