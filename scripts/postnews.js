$(document).ready(() => {
  $("#completeArticle").hide();

  $("#shortArticleBtn").click(function () {
    $("#shortArticle").hide();
    $("#shortArticleBtn").hide();
    $("#completeArticle").show();
  });
  const isWeekend = [0, 6].indexOf(new Date().getDay()) != -1;

  var timeNow = new Date().toLocaleString("pt-br", {
    hour: "numeric",
    minute: "numeric",
    hour12: false,
  });

  if (isWeekend) {
    $(".stock").addClass("hidden");
  } else {
    var stocksOpenAt = new Date();
    stocksOpenAt.setHours(9);
    stocksOpenAt.setMinutes(0);
    stocksOpenAt.setSeconds(0);
    var stocksCloseAt = new Date();
    stocksCloseAt.setHours(18);
    stocksCloseAt.setMinutes(0);
    stocksCloseAt.setSeconds(0);

    var isStocksWorking =
      new Date() > stocksOpenAt && new Date() < stocksCloseAt;
    if (!isStocksWorking) {
      $(".stock").addClass("hidden");
    }
  }
});
