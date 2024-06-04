$(document).ready(function () {
  $("#next").hide();
  $("#prev").hide();

  $(".carousel-container-computer").on("mousemove", function (e) {
    let mousePosition =
      e.pageX - $(".carousel-container-computer").offset().left;
    let slideArea = $(".carousel-computer").width() / 2;
    console.log(mousePosition);
    console.log(slideArea);
    if (mousePosition > slideArea) {
      $("#next").show();
      $("#prev").hide();
    } else if (mousePosition < slideArea) {
      $("#next").hide();
      $("#prev").show();
    }
  });
  $(".carousel-container-computer").on("mouseleave", function () {
    $("#next").hide();
    $("#prev").hide();
  });

  $("#prev").on("mouseover", function () {
    $("#next").hide();
    $("#prev").show();
  });

  $("#next").on("mouseover", function () {
    $("#next").show();
    $("#prev").hide();
  });

  const carousel = document.querySelector(".carousel-computer");
  const slides = document.querySelectorAll(".carousel-slide-computer");
  let currentIndex = 0;

  function showSlide(index) {
    if (index < 0) {
      currentIndex = slides.length - 1;
    } else if (index >= slides.length) {
      currentIndex = 0;
    }

    carousel.style.transform = `translateX(-${currentIndex * 100}%)`;
  }

  // Next and previous buttons (optional)
  const nextButton = $("#next");
  const prevButton = $("#prev");

  if (nextButton && prevButton) {
    nextButton.on("click", () => {
      currentIndex++;
      showSlide(currentIndex);
    });

    prevButton.on("click", () => {
      currentIndex--;
      showSlide(currentIndex);
    });
  }

  // Auto-advance the carousel (optional)
  const autoAdvanceInterval = 5000; // Change slide every 3 seconds

  setInterval(() => {
    currentIndex++;
    showSlide(currentIndex);
  }, autoAdvanceInterval);

  // $(".dd").text("juquery slider funciinando: ");
  // $(window).resize(function () {
  //   calculateNewScale();
  // });

  // calculateNewScale(); // if the user go to the page and his window is less than 1920px

  // function calculateNewScale() {
  //   var percentageOn1 = $(window).width() / 1300;
  //   $("body").css({
  //     "-moz-transform": "scale(" + percentageOn1 + ")",
  //     "-webkit-transform": "scale(" + percentageOn1 + ")",
  //     transform: "scale(" + percentageOn1 + ")",
  //   });
  // }

  const carouselAdFront = document.querySelector(".carousel-adfront");
  const slidesAdFront = document.querySelectorAll(".carousel-slide-adfront");
  let currentIndexAdFront = 0;

  function showSlideAdFront(index) {
    if (index < 0) {
      currentIndexAdFront = slidesAdFront.length - 1;
    } else if (index >= slidesAdFront.length) {
      currentIndexAdFront = 0;
    }

    carouselAdFront.style.transform = `translateX(-${
      currentIndexAdFront * 100
    }%)`;
  }

  const autoAdvanceIntervalAdFront = 5000;

  setInterval(() => {
    currentIndexAdFront++;
    showSlideAdFront(currentIndexAdFront);
  }, autoAdvanceIntervalAdFront);

  const carouselSlideAd = document.querySelector(".carousel-SlideAd");
  const slidesSlideAd = document.querySelectorAll(".carousel-slide-SlideAd");
  let currentIndexSlideAd = 0;

  function showSlideSlideAd(index) {
    if (index < 0) {
      currentIndexSlideAd = slidesSlideAd.length - 1;
    } else if (index >= slidesSlideAd.length) {
      currentIndexSlideAd = 0;
    }

    carouselSlideAd.style.transform = `translateX(-${
      currentIndexSlideAd * 100
    }%)`;
  }

  // Auto-advance the carousel (optional)
  const autoAdvanceIntervalSlideAd = 5000; // Change slide every 3 seconds

  setInterval(() => {
    currentIndexSlideAd++;
    showSlideSlideAd(currentIndexSlideAd);
  }, autoAdvanceIntervalSlideAd);
});
