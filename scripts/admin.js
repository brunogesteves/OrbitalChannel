$(document).ready(() => {
  $(".openmodal").on("click", function () {
    var index = $(".openmodal").index(this);
    $(`.infoModal:eq(${index})`).show();
  });

  $(".closemodal").on("click", function () {
    var index = $(".closemodal").index(this);
    $(`.infoModal:eq(${index})`).hide();
  });

  $(".menu .item").tab();
});
