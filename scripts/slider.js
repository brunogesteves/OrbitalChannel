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

  const autoAdvanceInterval = 5000;

  setInterval(() => {
    currentIndex++;
    showSlide(currentIndex);
  }, autoAdvanceInterval);

  const carouselAdFront = document.querySelector(".carousel-adfront");
  const slidesAdFront = document.querySelectorAll(".carousel-slide-adfront");
  let currentAdFrontIndex = 0;

  function showSlideAdFront(index) {
    if (index < 0) {
      currentAdFrontIndex = slidesAdFront.length - 1;
    } else if (index >= slidesAdFront.length) {
      currentAdFrontIndex = 0;
    }

    carouselAdFront.style.transform = `translateX(-${
      currentAdFrontIndex * 100
    }%)`;
  }

  const autoAdvanceAdFrontInterval = 5000;

  setInterval(() => {
    currentAdFrontIndex++;
    showSlideAdFront(currentAdFrontIndex);
  }, autoAdvanceAdFrontInterval);

  const carouselAdMobile = document.querySelector(".carousel-adMobile");
  const slidesAdMobile = document.querySelectorAll(".carousel-slide-adMobile");
  let currentIndexAdMobile = 0;

  function showAdMobile(index) {
    if (index < 0) {
      currentIndexAdMobile = slidesAdMobile.length - 1;
    } else if (index >= slidesAdMobile.length) {
      currentIndexAdMobile = 0;
    }

    carouselAdMobile.style.transform = `translateX(-${
      currentIndexAdMobile * 100
    }%)`;
  }

  const autoAdvanceIntervalAdMobile = 5000;

  setInterval(() => {
    currentIndexAdMobile++;
    showAdMobile(currentIndexAdMobile);
  }, autoAdvanceIntervalAdMobile);

  const carouselAdSlide = document.querySelector(".carousel-adSlide");
  const slidesAdSlide = document.querySelectorAll(".carousel-slide-adSlide");
  let currentIndexAdSlide = 0;

  function showAdSlide(index) {
    if (index < 0) {
      currentIndexAdSlide = slidesAdSlide.length - 1;
    } else if (index >= slidesAdSlide.length) {
      currentIndexAdSlide = 0;
    }

    carouselAdSlide.style.transform = `translateX(-${
      currentIndexAdSlide * 100
    }%)`;
  }

  const autoAdvanceIntervalAdSlide = 5000;

  setInterval(() => {
    currentIndexAdSlide++;
    showAdSlide(currentIndexAdSlide);
  }, autoAdvanceIntervalAdSlide);

  const carouselAdTablet = document.querySelector(".carousel-adSlide");
  const slidesTablet = document.querySelectorAll(".carousel-slide-adSlide");
  let currentIndexAdTablet = 0;

  function showAdTablet(index) {
    if (index < 0) {
      currentIndexAdTablet = slidesTablet.length - 1;
    } else if (index >= slidesTablet.length) {
      currentIndexAdTablet = 0;
    }

    carouselAdTablet.style.transform = `translateX(-${
      currentIndexAdTablet * 100
    }%)`;
  }

  const autoAdvanceIntervalAdTablet = 5000;

  setInterval(() => {
    currentIndexAdTablet++;
    showAdTablet(currentIndexAdTablet);
  }, autoAdvanceIntervalAdTablet);
});
