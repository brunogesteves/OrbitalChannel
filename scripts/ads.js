$(document).ready(() => {
  $("#adFileUpload").on("change", function () {
    $("#thumb").hide();
    var imgPath = $(this)[0].value;

    if (typeof FileReader != "undefined") {
      var previewInputImage = $("#previewInputImage");
      previewInputImage.empty();

      var reader = new FileReader();
      reader.onload = function (e) {
        $("#previewInputAdImage").html(
          `<img src=${e.target.result} class="thumb-image w-96 " />`
        );
      };
      previewInputImage.show();
      reader.readAsDataURL($(this)[0].files[0]);
    }
  });

  const urlToStrip = $(location).attr("href");

  function stripUrl(urlToStrip) {
    let stripped = urlToStrip.split("?")[0];
    return stripped;
  }

  window.history.replaceState(null, "", stripUrl(urlToStrip));

  if ($("#openModalIsValid").val()) {
    $(`.updateAdModal`).show();
  }

  $(".openNewModalbtn").on("click", function () {
    $(`.newAdModal`).show();
  });

  $(".closeNewAdModalbtn").on("click", function () {
    $(`.newAdModal`).hide();
  });

  $(".closeUpdateAdModalbtn").on("click", function () {
    $(`.updateAdModal`).hide();
  });

  $(".menu .item").tab();

  const schedule = new Date($("#post_at").val()).getTime();
  const timeNow = Date.now();
  if (schedule < timeNow) {
    $("#post_at").prop("disabled", true);
  } else {
    $("#post_at").prop("disabled", false);
  }

  $(".add").text("jquery funcionando");
});
