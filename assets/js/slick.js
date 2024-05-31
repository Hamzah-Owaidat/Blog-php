

$('.autoplay').slick({
  centerMode:true,
  centerPadding:'70px',
  slidesToShow: 3,
  slidesToScroll: 1,
  autoplay: true,
  arrows:false,
  autoplaySpeed: 2000,
  responsive: [
    {
      breakpoint: 768,
      settings: {
        arrows: false,
        centerMode: true,
        centerPadding: '10px',
        slidesToShow: 1
      }
    },
    {
      breakpoint: 480,
      settings: {
        arrows: false,
        centerMode: true,
        centerPadding: '55px',
        slidesToShow: 1
      }
    }
  ]

});