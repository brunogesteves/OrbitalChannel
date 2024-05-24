$(document).ready(function () {
  $("#fileUpload").on("change", function () {
    $("#thumb").hide();
    var imgPath = $(this)[0].value;

    if (typeof FileReader != "undefined") {
      var previewInputImage = $("#previewInputImage");
      previewInputImage.empty();

      var reader = new FileReader();
      reader.onload = function (e) {
        $("#previewInputImage").html(
          `<img src=${e.target.result} class="thumb-image w-48 " />`
        );
      };
      previewInputImage.show();
      reader.readAsDataURL($(this)[0].files[0]);
    }
  });

  // $(".tabular.menu .item").tab();

  $(".ui.dimmable").dimmer({
    on: "hover",
  });

  $(".seePicture").on("click", (e) => {
    const fileName = e.target.id;
    $("#modalImage").html(`<img src=../images/${fileName} />`);

    $(".ui.modal").modal("show");
  });
});
