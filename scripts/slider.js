$(document).ready(function () {
  // $(".sliderArea").on("mousemove", function (e) {
  //   let mousePosition = e.pageX - e.currentTarget.offsetLeft;
  //   let slideArea = $(".sliderArea").width() / 2;
  //   if (mousePosition > slideArea) {
  //     $(".nextImg").show();
  //     $(".previewImg").hide();
  //   } else if (mousePosition < slideArea) {
  //     $(".nextImg").hide();
  //     $(".previewImg").show();
  //   }
  // });
  // $(".sliderArea").on("mouseleave", function () {
  //   $(".nextImg").hide();
  //   $(".previewImg").hide();
  // });

  const slides = $(".slideComputer"); // returns true

  let currentSlide = 0;

  function showSlide(index) {
    slides.map((slide) => {
      if (slide === index) {
        $(".slideComputer").eq(slide).removeClass("hidden");
      } else {
        $(".slideComputer").eq(slide).addClass("hidden");
      }
    });
  }

  setInterval(() => {
    currentSlide = (currentSlide - 1 + slides.length) % slides.length;
    showSlide(currentSlide);
  }, 2000);

  function nextSlide() {
    showSlide(currentSlide);
  }

  function prevSlide() {
    currentSlide = (currentSlide - 1 + slides.length) % slides.length;
    showSlide(currentSlide);
  }

  $(".prev").on("click", () => {
    prevSlide();
  });
  $(".next").on("click", () => {
    nextSlide();
  });

  $(".dd").text("juquery funciinando: ", currentSlide);
});
