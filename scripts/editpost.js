$(document).ready(() => {
  var editorContent = $("#content").val();

  const editor = SUNEDITOR.create(
    document.getElementById("editor") || "editor",
    {
      value: "",
      mode: "classic",
      rtl: false,
      katex: "window.katex",
      width: "90%",
      height: "50vh",
      placeholder: "Crie o post....É obrigatório",
      imageGalleryUrl: "http://orbitalchannel.42web.io/Components/gallery.php",
      videoFileInput: false,
      audioUrlInput: false,
      tabDisable: false,
      buttonList: [
        [
          "undo",
          "redo",
          "font",
          "fontSize",
          "formatBlock",
          "paragraphStyle",
          "blockquote",
          "bold",
          "underline",
          "italic",
          "strike",
          "subscript",
          "superscript",
          "fontColor",
          "hiliteColor",
          "textStyle",
          "removeFormat",
          "outdent",
          "indent",
          "align",
          "horizontalRule",
          "list",
          "lineHeight",
          "table",
          "link",
          // "image",
          // 'video',
          "audio",
          "math",
          "imageGallery",
          "fullScreen",
          "showBlocks",
          //   "codeView",
          "preview",
          "print",
          "save",
          "template",
        ],
      ],
      lang: SUNEDITOR_LANG.pt_br,
      "lang(In nodejs)": "pt_br",
    }
  );

  //   editor.onChange = function (contents) {
  //     let value = contents.target.innerHTML;
  //     $("#content").val(value);
  //   };

  editor.onInput = function (contents) {
    let value = contents.target.innerHTML;
    $("#content").val(value);
  };

  editor.insertHTML(editorContent);

  $("img").click(function (e) {
    var fileName = $(this).attr("src");
    var fileId = $(this).attr("alt");

    $("#previewImage").html(`<img src=../images/${fileName} />`);

    toggleModal();
    $("#image_id").val(fileId);
  });

  $(".openEditImageModalBtn").on("click", () => {
    $(".editImageModal").modal("show");
  });

  $(".selectEditImage").on("click", (e) => {
    const fileName = e.target.name;
    $("#previewImage").html(
      `<img src=../images/${fileName} class="max-h-72" />`
    );
    $("#image_id").val(e.target.id);
    $(".editImageModal").modal("hide");
  });

  $(".seeImage").on("click", (e) => {
    const fileName = e.target.id;
    $("#modalImage").html(`     
    <img src=/images/${fileName}  />`);
    $(".fullScreen").modal("show");
  });

  $(".closeImage").on("click", (e) => {
    $(".fullScreen").modal("hide");
    $(".editImageModal").modal("show");
  });

  $(".ui.dimmable").dimmer({
    on: "hover",
  });

  const schedule = new Date($("#schedule_time").val()).getTime();
  const timeNow = Date.now();
  if (schedule < timeNow) {
    $("#schedule_time").prop("disabled", true);
  } else {
    $("#schedule_time").prop("disabled", false);
  }
});
