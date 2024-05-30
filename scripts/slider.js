$(document).ready(function () {
  $("#slider").on("mousemove", function (e) {
    let mousePosition = e.pageX - e.currentTarget.offsetLeft;
    let slideArea = $("#slider").width() / 2;
    if (mousePosition > slideArea) {
      $(".next").show();
      $(".prev").hide();
    } else if (mousePosition < slideArea) {
      $(".next").hide();
      $(".prev").show();
    }
  });
  $("#slider").on("mouseleave", function () {
    $(".next").hide();
    $(".prev").hide();
  });

  const slides = $(".slideComputer"); // returns true

  let currentSlide = 0;

  function showSlide(index) {
    for (let i = 0; i < slides.length; i++) {
      if (i === index) {
        $(".slideComputer").eq(i).addClass("pushToLeft");
        $(".slideComputer").eq(i).removeClass("toBack");
      } else {
        $(".slideComputer").eq(i).removeClass("pushToLeft");
        $(".slideComputer").eq(i).addClass("toBack");
      }
    }
  }

  setInterval(() => {
    // currentSlide = (currentSlide - 1 + slides.length) % slides.length;
    currentSlide = currentSlide === slides.length - 1 ? 0 : currentSlide + 1;

    showSlide(currentSlide);
  }, 3000);

  function nextSlide() {}

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

  $(".dd").text("juquery funciinando: ");
});
