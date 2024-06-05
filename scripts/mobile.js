$(document).ready(() => {
  $("#menu_mobile_open").on("click", function () {
    $(".ui.sidebar").sidebar("toggle");
  });
  $("#menu_tablet_open").on("click", function () {
    $(".ui.sidebar").sidebar("toggle");
  });

  const carouselMobile = $(".carousel-mobile");
  const slidesMobile = $(".carousel-slide-mobile");
  let currentIndexMobile = 0;

  function showSlide(index) {
    if (index < 0) {
      currentIndexMobile = slidesMobile.length - 1;
    } else if (index >= slidesMobile.length) {
      currentIndexMobile = 0;
    }

    carouselMobile.style.transform = `translateX(-${
      currentIndexMobile * 100
    }%)`;
  }

  // Auto-advance the carousel (optional)
  const autoAdvanceIntervalMobile = 5000; // Change slide every 3 seconds

  setInterval(() => {
    currentIndexMobile++;
    showSlide(currentIndexMobile);
  }, autoAdvanceIntervalMobile);

  // const screenWidth = screen.width;
  // console.log(screenWidth);
  // if (screenWidth > 425) {
  //   $(".scrollable").css("width", screenWidth - 20);
  // }else{
  //     $(".scrollable").css("width", screenWidth);
  // }
});
