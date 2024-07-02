$(document).ready(function () {
  $(".ui.dimmer").dimmer({
    on: "hover",
  });

  $(".changeLogotype").on("click", (e) => {
    const fileName = e.target.id;
    // $("#modalImage").html(`<img src=../images/${fileName} />`);

    $(".logotype").modal("show");
    $(`.infoModal`).hide();
  });

  $("#newLogotype").on("change", function () {
    var imgPath = $(this)[0].value;

    if (typeof FileReader != "undefined") {
      var previewInputImage = $("#previewNewLogotype");
      previewInputImage.empty();

      var reader = new FileReader();
      reader.onload = function (e) {
        $("#previewNewLogotype").html(
          `<img src=${e.target.result} class="thumb-image w-full " />`
        );
      };
      previewInputImage.show();
      reader.readAsDataURL($(this)[0].files[0]);
    }
  });

  setInterval(() => {
    $("#timestamp").text(
      new Date().toLocaleString("pt-BR", { timeZone: "America/Sao_Paulo" })
    );
  }, 1000);
});
