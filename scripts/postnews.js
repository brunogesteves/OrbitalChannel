$(document).ready(() => {
  $("#completeArticle").hide();

  $("#shortArticleBtn").click(function () {
    $("#shortArticle").hide();
    $("#shortArticleBtn").hide();
    $("#completeArticle").show();
  });
});
