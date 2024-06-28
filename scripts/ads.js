$(document).ready(function () {
  $("#adFileUpload").on("change", function () {
    var imgPath = $(this)[0].value;

    if (typeof FileReader != "undefined") {
      var previewInputImage = $("#previewInputAdImage");
      previewInputImage.empty();

      var reader = new FileReader();
      reader.onload = function (e) {
        $("#previewInputAdImage").html(
          `<img src=${e.target.result} class="thumb-image w-full " />`
        );
      };
      previewInputImage.show();
      reader.readAsDataURL($(this)[0].files[0]);
    }
  });

  $(".adUpdateFileUpload").on("change", function () {
    $(".previewUploadInputAdImage").hide();
    var index = $(".adUpdateFileUpload").index(this);

    var imgPath = $(this)[0].value;

    if (typeof FileReader != "undefined") {
      var previewUploadInputAdImage = $(
        `.previewUploadInputAdImage:eq(${index})`
      );
      previewUploadInputAdImage.empty();

      var reader = new FileReader();
      reader.onload = function (e) {
        $(`.previewUploadInputAdImage:eq(${index})`).html(
          `<img src=${e.target.result} class="thumb-image w-full h-44 " />`
        );
      };
      previewUploadInputAdImage.show();
      reader.readAsDataURL($(this)[0].files[0]);
    }
  });

  if ($("#newModalhasErrors").val() > 0) {
    // $(`.newAdModal`).show();
    $(`.fullscreen.newAdModal`).modal("toggle");
  }

  $(".openNewModalbtn").on("click", function () {
    // $(`.newAdModal`).show();
    $(`.fullscreen.newAdModal`).modal("toggle");
  });

  $(".closeNewAdModalbtn").on("click", function () {
    // $(`.newAdModal`).hide();
    $(`.fullscreen.newAdModal`).modal("toggle");
  });

  $(".openUpdateAdModalbtn").on("click", function () {
    var index = $(".openUpdateAdModalbtn").index(this);
    $(`.fullscreen.updateAdModal:eq(${index})`).modal("toggle");
  });

  $(".closeUpdateAdModalbtn").on("click", function () {
    var index = $(".closeUpdateAdModalbtn").index(this);
    console.log(index);
    $(`.fullscreen.updateAdModal:eq(${index})`).modal("toggle");
  });

  $(".menu .item").tab();

  const schedule = new Date($("#post_at").val()).getTime();
  const timeNow = Date.now();
  if (schedule < timeNow) {
    $("#post_at").prop("disabled", true);
  } else {
    $("#post_at").prop("disabled", false);
  }
});
