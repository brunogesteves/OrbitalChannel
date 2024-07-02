$(document).ready(() => {
  const urlToStrip = $(location).attr("href");

  function stripUrl(urlToStrip) {
    let stripped = urlToStrip.split("?")[0];
    return stripped;
  }

  window.history.replaceState(null, "", stripUrl(urlToStrip));

  $(".openExternalInfoModalbtn").on("click", function () {
    var index = $(".openExternalInfoModalbtn").index(this);
    $(`.fullScreen.externalInfoModal:eq(${index})`).modal("toggle");
  });

  $(".closeExternalInfoModalbtn").on("click", function () {
    var index = $(".closeExternalInfoModalbtn").index(this);
    $(`.fullScreen.externalInfoModal:eq(${index})`).modal("toggle");
  });
});
