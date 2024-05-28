$(document).ready(() => {
  $("#menu_open").on("click", function () {
    $(".ui.sidebar").sidebar("toggle");
  });

  // const screenWidth = screen.width;
  // console.log(screenWidth);
  // if (screenWidth > 425) {
  //   $(".scrollable").css("width", screenWidth - 20);
  // }else{
  //     $(".scrollable").css("width", screenWidth);
  // }
});
