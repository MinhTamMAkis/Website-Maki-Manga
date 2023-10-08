$('.owl-carousel').owlCarousel({
    loop:true,
    dots: false,
    nav: false,
    margin:50,
    stagePadding: 20,
    autoplay:true,
    autoplayTimeout:3000,
    autoplayHoverPause:true,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:2
        },
        1000:{
            items:3
        },
        1240:{
            items:4
        }
    }
})