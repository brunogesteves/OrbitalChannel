$(document).ready(() => {
  $("#menu_mobile_open").on("click", function () {
    $(".ui.sidebar").sidebar("toggle");
  });
  $("#menu_tablet_open").on("click", function () {
    $(".ui.sidebar").sidebar("toggle");
  });

  const carouselMobile = document.querySelector(".carousel-mobile");
  const slidesMobile = document.querySelectorAll(".carousel-slide-mobile");

  let currentMobileIndex = 0;
  function showSlide(index) {
    if (index < 0) {
      currentMobileIndex = slidesMobile.length - 1;
    } else if (index >= slidesMobile.length - 4) {
      currentMobileIndex = 0;
    }

    carouselMobile.style.transform = `translateX(-${
      currentMobileIndex * 100
    }%)`;
  }

  const autoMobileAdvanceInterval = 5000;

  setInterval(() => {
    currentMobileIndex++;
    showSlide(currentMobileIndex);
  }, autoMobileAdvanceInterval);

  if (isWeekend) {
    $(".stock").addClass("hidden");
  } else {
    var stocksOpenAt = new Date();
    stocksOpenAt.setHours(9);
    stocksOpenAt.setMinutes(0);
    stocksOpenAt.setSeconds(0);
    var stocksCloseAt = new Date();
    stocksCloseAt.setHours(18);
    stocksCloseAt.setMinutes(0);
    stocksCloseAt.setSeconds(0);

    var isStocksWorking =
      new Date() > stocksOpenAt && new Date() < stocksCloseAt;
    if (!isStocksWorking) {
      $(".stock").addClass("hidden");
    }
  }
});
