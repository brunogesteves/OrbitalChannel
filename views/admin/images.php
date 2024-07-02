<?php
require "views/partials/admin/headerAdmin.php";
?>


<div class="h-full flex justify-start">
    <?php
    require "views/partials/admin/sidebar.php";
    ?>

    <main class="flex flex-col w-full">
        <div class="w-full flex justify-center items-start gap-x-5">
            <form method="POST" action="imagens/create" enctype="multipart/form-data" class="flex flex-col">
                <input type="file" name="image" id="fileUpload" required accept=".jpg, .jpeg, .png" />
                <button type="submit" class="text-white bg-black my-7 p-2 rounded-lg text-xl">adicionar</button>
            </form>
            <div id="previewInputImage"> </div>
        </div>
        <div class="flex justify-start items-start gap-x-7 flex-wrap overflow-y-auto"">
            <?php
            foreach ($images as $image): ?>
                <div class="cursor-pointer w-1/6 mr-3 relative">
                    <div class="ui dimmable image">
                        <div class="ui dimmer">
                            <div class="content">
                                <form method="post" action="imagens/destroy">
                                    <input type="hidden" name="imageId" value=<?= $image["id"] ?> />
                                    <input type="hidden" name="imageName" value=<?= $image["name"] ?> />
                                    <div class="ui button seePicture" id=<?= $image["name"] ?>>Ver</div>
                                    <button type="submit" name="_method" value="DELETE"
                                        class="ui primary button ">Apagar</button>
                                </form>
                            </div>
                        </div>
                        <img src=<?= "../images/" . $image["name"] ?> alt=<?= $image["name"] ?> class="w-full object-cover min-h-40" />
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <div class="ui modal">
            <div id="modalImage"></div>
        </div>

</div>

</main>
<script src="../scripts/images.js" defer></script>

</div>
<?php
require "views/partials/admin/footer.php";

?>