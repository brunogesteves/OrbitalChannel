$(document).ready(() => {
  $(".openmodalPost").on("click", function () {
    var index = $(".openmodalPost").index(this);
    console.log(index);
    // $(`.infoModal:eq(${index})`).show();
    $(`.fullscreen.infoModal:eq(${index})`).modal("toggle");
  });

  $(".closemodalPost").on("click", function () {
    var index = $(".closemodalPost").index(this);
    console.log(index);

    // $(`.infoModal:eq(${index})`).hide();
    $(`.fullscreen.infoModal:eq(${index})`).modal("toggle");
  });

  $(".menu .item").tab();
});
