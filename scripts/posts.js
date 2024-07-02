$(document).ready(() => {
  $(".openModalBtn").on("click", function () {
    var index = $(".openModalBtn").index(this);

    const title = $(".title").eq(index).text().trim();
    const source = $(".source").eq(index).text().trim();
    const section = $(".section").eq(index).text().trim();
    const status = $(".status").eq(index).text().trim();
    const content = $(".postContent").eq(index).text().trim();
    const thumb = $(".thumb").eq(index).text().trim();
    const postId = $(".postId").eq(index).text().trim();
    $("#modalAreaTitle").text(title);
    $("#modalAreaSource").text(source);
    $("#modalAreaSection").text(section);
    $("#modalAreaStatus").text(status);
    $("#modalAreaContent").text(content);

    if (source == "Orbital Channel") {
      $("#modalAreaThumb").html(
        `<img src=../images/${thumb} alt="image" class="w-full "/>`
      );

      $("#editPostPublish").html(`      
        <div class="flex justify-center items-center gap-x-3">
          <a href='/admin/editar?id=${Number(postId)}'
              class="bg-blue-600 hover:bg-blue-700 px-3 py-1 rounded text-white cursor-pointer hover:text-white">
                  Editar
           </a>      
           <form method="post" action="admin/update">
                <input type="hidden" name="UpdateStatusId" value=${postId} />
                <input type="hidden" name="status" value=${
                  status == "Publicado" ? "off" : "on"
                }  />
                <button type="submit" name="_method" value="put"
                    class="bg-blue-600 hover:bg-blue-700 px-3 py-1 rounded text-white cursor-pointer">
                    ${status == "Publicado" ? "Despublicar" : "Publicar"} 
                </button>
            </form>   
        </div>   
      `);
    } else if (source !== "Orbital Channel") {
      $("#modalAreaThumb").html(
        `<img src=${thumb} alt="image" class="w-full "/>`
      );
      $("#editPostPublish").html(`
          <form method="post" action="admin/update">
              <input type="hidden" name="ExtPostStatusId" value=${postId} />
              <input type="hidden" name="status" value=${
                status == "Publicado" ? "off" : "on"
              }  />
              <button type="submit" name="_method" value="put"
                  class="bg-blue-600 hover:bg-blue-700 px-3 py-1 rounded text-white cursor-pointer">
                  ${status == "Publicado" ? "Despublicar" : "Publicar"} 
              </button>
          </form>

          <form id="changeSection" method="post" action="admin/update">
                <select class="rounded-md border border-black" name="sectionUpdateExtPost">
                    <option value="n1">n1</option>
                    <option value="n2">n2</option>
                    <option value="n3">n3</option>
                    <option value="n4">n4</option>
                </select>	
                <input type="hidden" name="sectionUpdateExtPostId" value=${postId} />                
                <button type="submit" name="_method" value="put"
                  class="bg-blue-600 hover:bg-blue-700 px-3 py-1 ml-3 rounded text-white cursor-pointer">
                  Atualizar seção
                </button>
          </form>          
      `);
      $("#changeSection select").val(section);
    }

    $(".fullscreen.modalArea").modal("toggle");
  });

  $("#closeModalBtn").on("click", function () {
    $(".fullscreen.modalArea").modal("toggle");
  });

  $(".menu .item").tab();
});
