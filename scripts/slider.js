$(document).ready(function () {
  $(".carousel-container-computer").on("mousemove", function (e) {
    let mousePosition =
      e.pageX - $(".carousel-container-computer").offset().left;
    let slideArea = $(".carousel-computer").width() / 2;
    // console.log(e.pageX);
    // console.log(e.pageX - $(".carousel-container-computer").offset().left);
    // console.log(slideArea);
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
  const nextButton = document.getElementById("next");
  const prevButton = document.getElementById("prev");

  if (nextButton && prevButton) {
    nextButton.addEventListener("click", () => {
      currentIndex++;
      showSlide(currentIndex);
    });

    prevButton.addEventListener("click", () => {
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

  const carouselMobile = document.querySelector(".carousel-mobile");
  const slidesMobile = document.querySelectorAll(".carousel-slide-mobile");
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
    currentIndex++;
    showSlide(currentIndex);
  }, autoAdvanceIntervalMobile);

  $(".dd").text("juquery funciinando: ");
});
