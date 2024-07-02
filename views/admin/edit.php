<?php
    require "views/partials/admin/headerAdmin.php";
    ?>

    <div class="h-[calc(100vh_-_198px)] flex justify-start">
        <?php
        require "views/partials/admin/sidebar.php";
        $errors = $_SESSION["errors"];   
        $tempContent = $_SESSION["tempContent"];  
            ?>

        <main class="flex flex-col h-auto w-full">

            <div class=" flex justify-center items-start w-full ">
                <div class="w-4/12 h-fit flex flex-col items-center z-0 ">
                    <form method="post" action="/admin/editar/update" class="flex justify-between text-center px-5 w-full h-full pt-2 ">
                        <div class="flex justify-start flex-col w-full gap-y-10 overflow-y-auto">
                            <button type="submit" name="_method" value="put" class="ui approve button">Atualizar</button>
                            <input type="text" required name="title" value="<?=$post["title"] ?>"
                                class="bg-slate-300 px-2 outline-none rounded-md border border-black placeholder:text-black placeholder:text-opacity-30"
                                placeholder="nome do post" />
                            <?php if (isset($errors["title"])): ?>
                                <div class="h-10 mb-1 text-red-500 font-bold"><?= $errors["title"] ?> </div>
                            <?php endif; ?>
                            <input type="datetime-local" name="new_post_at" id="schedule_time" min="<?= $minTime ?>"
                                value="<?= $scheduled ?>">                        
                                <?php if($isDateTimeDisabled):?>
                                <input type="hidden" name="post_at" value="<?= $post["post_at"] ?>" />
                            <?php endif;?>
                            <select id="section" class="rounded-md border border-black mb-3" name="section">
                                <option value="n1" <?php if($post["section"] =="n1"): ?> selected <?php endif;?> >n1</option>
                                <option value="n2" <?php if($post["section"] =="n2"): ?> selected <?php endif;?> >n2</option>
                                <option value="n3" <?php if($post["section"] =="n3"): ?> selected <?php endif;?> >n3</option>
                                <option value="n4" <?php if($post["section"] =="n4"): ?> selected <?php endif;?> >n4</option>
                            </select>
                            <input id="image_id" type="hidden" name="image_id" value="<?= $post["image_id"] ?>" />
                            
                            <div class="ui approve button openEditImageModalBtn">Selecione uma Thumb</div>
                            <div id="previewImage" class="flex justify-center">                            
                                <img src="../images/<?=$post["image"] ?>" />
                            </div>
                            <input type="hidden" name="content" id="content" value="<?=$post["content"]?>">
                            <input type="hidden" name="id" value="<?=$id?>">
                            <?php if (!$tempContent["thumb"]): ?>
                            <div class="h-10 mb-1 text-red-500 font-bold"><?= $errors["thumb"] ?> </div>
                            <?php endif; ?>
                            <?php if (!$tempContent["content"]): ?>
                                <div class="h-10 mb-1 text-red-500 font-bold"><?= $errors["content"] ?> </div>
                            <?php endif; ?>

                        </div>
                    </form>
                    <div class="ui modal editImageModal bg-slate-300  h-screen">
                    <div class="flex justify-between flex-wrap overflow-y-auto gap-y-5">
                            <?php
                            foreach ($images as $image): ?>
                                <div class="cursor-pointer w-1/6 mr-3">
                                    <div class="ui dimmable image">
                                        <div class="ui dimmer">
                                            <div >
                                                <div class="ui button seeImage" id=<?= $image["name"] ?>>Ver</div>
                                                <button class="ui primary button selectEditImage"
                                                    id=<?= $image["id"] ?> name=<?= $image["name"] ?> >Selecionar</button>
                                            </div>
                                        </div>
                                        <img src="../images/<?=$image["name"] ?>" alt=<?= $image["name"] ?>
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
        <script src="../scripts/editpost.js" defer></script>
        <script src="../scripts/suneditor.min.js"></script>
        <script src="../scripts/pt.js" defer></script>
        <link href="../styles/suneditor.min.css" rel="stylesheet" />

    </div>
    <?php
    require "views/partials/admin/footer.php";

    ?>