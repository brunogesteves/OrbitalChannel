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

  setInterval(() => {
    $("#timestamp").text(
      new Date().toLocaleString("pt-BR", { timeZone: "America/Sao_Paulo" })
    );
  }, 1000);
});
