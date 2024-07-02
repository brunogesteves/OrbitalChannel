<?php
require "views/partials/admin/headerAdmin.php";
?>

<div class="h-full flex justify-start">
    <?php
    require "views/partials/admin/sidebar.php";
    
    ?>

    <main class="flex flex-col h-auto w-full">
        <div class=" flex justify-center items-start w-full ">
            <div class="w-4/12 h-fit flex flex-col z-0 ">
                <form method="post" action="/admin/adicionar/create" class="flex justify-between text-center px-5 w-full h-full pt-2 ">
                    <div class="flex justify-start flex-col w-full gap-y-5 overflow-y-auto">
                        <button type="submit" class="ui approve button">Salvar</button>
                        <input type="text" name="title" value="<?= $tempContent["title"];?>"
                            class="bg-slate-300 px-2 outline-none rounded-md border border-black placeholder:text-black placeholder:text-opacity-30"
                            placeholder="nome do post" />
                        <?php if (!$tempContent["title"]): ?>
                            <div class="h-5 text-red-500 font-bold"><?= $errors["title"] ?> </div>
                        <?php endif; ?>
                        <input type="datetime-local" name="post_at" min="<?= $minTime ?>" id="post_at" value="<?= $tempContent["post_at"];?>">
                        <?php if (!$tempContent["date"]): ?>
                            <div class="h-5 text-red-500 font-bold"><?= $errors["date"] ?> </div>
                        <?php endif; ?>

                        <select id="section" class="rounded-md border border-black mb-3" name="section">
                            <option value="n1" <?php if($tempContent["section"]= "n1" ):?> selected <?php endif; ?> >n1</option>
                            <option value="n2" <?php if($tempContent["section"]= "n2"):?> selected <?php endif; ?> >n2</option>
                            <option value="n3" <?php if($tempContent["section"]= "n3"):?> selected <?php endif; ?> >n3</option>
                            <option value="n4" <?php if($tempContent["section"]= "n4"):?> selected <?php endif; ?> >n4</option>
                        </select>
                        <input id="image_id" type="hidden" name="image_id" value="<?= $tempContent["image_id"];?>"/>
                        <div id="previewImage"></div>
                        <input type="hidden" name="content" id="content" value="<?= $tempContent["content"];?>">
                        <div class="ui approve button openAddImageModalBtn">Selecione uma Thumb</div>
                        <?php if (!$tempContent["thumb"]): ?>
                            <div class="h-5 text-red-500 font-bold"><?= $errors["thumb"] ?> </div>
                        <?php endif; ?>
                        <?php if (!$tempContent["content"]): ?>
                            <div class="h-5 text-red-500 font-bold"><?= $errors["content"] ?> </div>
                        <?php endif; ?>

                    </div>
                </form>
                <div class="ui modal addImageModal bg-slate-300  h-screen">
                    <div class="flex justify-start gap-x-5 flex-wrap overflow-y-auto gap-y-5">
                        <?php
                        foreach ($images as $image): ?>
                            <div class="cursor-pointer w-1/6 m-2 h-[150px]">
                                <div class="ui dimmable image">
                                    <div class="ui dimmer">
                                        <div class="content">
                                            <div class="ui button seeImage" id=<?= $image["name"] ?>>Ver</div>
                                            <button class="ui primary button selectImage"
                                            id="<?= $image["id"]  ?>" name="<?= $image["name"] ?>">Selecionar</button>

                                        </div>
                                    </div>
                                    <img src="../images/<?= $image["name"] ?>" alt=<?= $image["name"] ?>
                                        class="w-full min-h-40" />
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
            <div class="ui modal fullScreen">
                <div class="text-2xl ml-3 mt-3  cursor-pointer closeImage">X</div>
                <div id="modalImage" class="flex justify-center mb-5"></div>
            </div>
            <div class="w-8/12 z-0">
                <div class="h-full flex items-start justify-center">
                    <textarea id="editor">Carregando Editor...</textarea>
                </div>
            </div>
        </div>
    </main>
    <script src="../scripts/addpost.js" defer></script>
    <script src="../scripts/suneditor.min.js" defer></script>
    <script src="../scripts/pt.js" defer></script>
    <link href="../styles/suneditor.min.css" rel="stylesheet" />

</div>
<?php
require "views/partials/admin/footer.php";
?>