$(document).ready(() => {
  const urlToStrip = $(location).attr("href");

  function stripUrl(urlToStrip) {
    let stripped = urlToStrip.split("?")[0];
    return stripped;
  }

  window.history.replaceState(null, "", stripUrl(urlToStrip));

  $(".openModal").on("click", function () {
    var index = $(".openmodal").index(this);
    $(`.infoModal:eq(${index})`).show();
  });

  $(".closemodal").on("click", function () {
    var index = $(".closemodal").index(this);
    $(`.infoModal:eq(${index})`).hide();
  });
  $(".dd").text("jquery funcionando");
});
