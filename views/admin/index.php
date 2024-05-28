<?php
require "views/partials/admin/header.php";
?>
<div class="h-[calc(100vh_-_195px)] flex justify-start">
    <?php
    require "views/partials/admin/sidebar.php";
    ?>

    <main class="flex flex-col h-auto overflow-y-auto w-full">
        <div class="ui top attached tabular menu">
            <a class="item active" data-tab="first">Orbital</a>
            <a class="item" data-tab="second">Externos</a>
            <a class="item" data-tab="third">Publicados</a>
        </div>
        <div class="ui bottom attached tab segment active h-[calc(100vh_-_250px)] overflow-y-auto" data-tab="first">
            <!-- First -->
            <?php
            foreach ($posts as $post): ?>
                <div class="flex justify-between items-center h-auto w-full my-2 px-3 py-2 gap-x-1">
                    <img src="/images/<?= $post['image'] ?>" class=" w-20 h-20  object-fit" />
                    <p class="w-96">
                        <?= $post["title"] ?>
                    </p>
                    <p class="w-auto">
                        <?= $post["source"] ?>
                    </p>
                    <p class="w-5">
                        <?= $post["section"] ?>
                    </p>
                    <p class="w-24">
                        <?= date("d/m/Y h:i:s A", $post["posted_at"]); ?>
                    </p>
                    <p class="w-20 ">
                        <?= $post["status"] == "on" ? "Publicado" : "Fora do Ar" ?>
                    </p>
                    <div class="flex gap-x-1">
                        <button class="openmodal bg-black hover:bg-red-700 px-3 py-1 rounded text-white m-3">
                            Verificar
                        </button>
                        <form method="POST" action="/admin/destroy" class="flex items-center">
                            <input type="hidden" name="deletePostId" value=<?= $post["id"] ?> />
                            <button type="submit" class="rounded-md" name="_method" value="DELETE">
                                <img src="/images/icons/trash.png" alt="trash" class="w-7" />
                            </button>
                        </form>
                    </div>
                </div>
                <!-- begin first modal -->
                <div
                    class="ui modal two column grid infoModal absolute top-[200px] left-[500px] transform -translate-x-1/2 -translate-y-1/2">
                    <div class="header">
                        <?= $post["title"] ?>
                    </div>
                    <div class=" flex justify-start gap-x-2">
                        <div class="w-1/6">
                            <img src="/images/<?= $post["image"] ?>" class="w-28 h-28">
                        </div>
                        <div class="w-5/6">
                            <span>Posição:</span>
                            <span <?= $post["section"] ?>></span>
                            <div>
                                <span>Status:</span>
                                <?= $post["status"] == "off" ? "Fora do Ar" : "Publicado" ?>
                            </div>
                            <div>
                                <span>Fonte:</span>
                                <?= $post["source"] ?>
                            </div>
                            <span>Fonte:</span>

                            <div id="content">
                                <span>Conteúdo:</span>
                                <?= nl2br($post["content"]) ?>
                            </div>
                        </div>
                    </div>
                    <div class="actions">
                        <div class="flex justify-end items-start w-100 p-3 gap-x-3 h-14">
                            <button type="button"
                                class="closemodal bg-red-600 hover:bg-red-700 px-3 py-1 rounded text-white mr-1">
                                Cancelar
                            </button>
                            <a href='/admin/editar?id=<?= $post["id"] ?>'
                                class="bg-blue-600 hover:bg-blue-700 px-3 py-1 rounded text-white cursor-pointer hover:text-white">
                                Editar
                            </a>
                            <form method="post" action="/admin/update">
                                <input type="hidden" name="UpdateStatusId" value=<?= $post["id"] ?> />
                                <input type="hidden" name="status" value=<?= $post["status"] == "on" ? "off" : "on" ?> />
                                <button type="submit" name="_method" value="put"
                                    class="bg-blue-600 hover:bg-blue-700 px-3 py-1 rounded text-white cursor-pointer">
                                    <?= $post["status"] == "on" ? "Despublicar" : "Publicar" ?>
                                </button>
                            </form>
                        </div>

                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <div class="ui bottom attached tab segment h-[calc(100vh_-_250px)] overflow-y-auto" data-tab="second">
            <!-- Second -->
            <?php
            foreach ($extposts as $extpost): ?>
                <div class="flex justify-between items-center h-auto w-full my-2 px-3 py-2 gap-x-1">
                    <img src="<?= $extpost["image"] ?>" class="w-20 h-20  object-fit" />
                    <p class="w-96">
                        <?= $extpost["title"] ?>
                        <?= $extpost["id"] ?>
                    </p>
                    <p class="w-auto">
                        <?= $extpost["source"] ?>
                    </p>
                    <p class="w-5">
                        <?= $extpost["section"] ?>
                    </p>
                    <p class="w-24">
                        <?= date("d/m/Y h:i:s A", $extpost["posted_at"]); ?>
                    </p>
                    <p class="w-20 ">
                        <?= $extpost["status"] == "off" ? "Fora do Ar" : "Publicado" ?>
                    </p>
                    <div class="flex gap-x-1">
                        <button class="openmodal bg-black hover:bg-red-700 px-3 py-1 rounded text-white m-3">
                            Verificar
                        </button>
                        <form method="POST" action="/admin/destroy" class="flex items-center">
                            <input type="hidden" name="DeleteExtPostId" value=<?= $extpost["id"] ?> />
                            <button type="submit" name="_method" value="DELETE" class=" rounded-md">
                                <img src="/images/icons/trash.png" alt="trash" class="w-7" />
                            </button>
                        </form>
                    </div>
                </div>
                <!-- begin second modal -->
                <div
                    class="ui modal two column grid infoModal absolute top-[200px] left-[500px] transform -translate-x-1/2 -translate-y-1/2">
                    <div class="header">
                        <?= $extpost["title"] ?>
                        <?= $extpost["id"] ?>
                    </div>
                    <div class=" flex justify-start gap-x-2">
                        <div class="w-1/6">
                            <img src="<?= $extpost["image"] ?>" class="w-28 h-28">
                        </div>
                        <div class="w-5/6">
                            <span>Posição:</span>
                            <span><?= $extpost["section"] ?></span>
                            <div>
                                <span>Status:</span>
                                <?= $extpost["status"] == "off" ? "Fora do Ar" : "Publicado" ?>
                            </div>
                            <div>
                                <span>Fonte:</span>
                                <?= $extpost["source"] ?>
                            </div>
                            <span>Link:</span>
                            <?= $extpost["link"] ?>
                            <div id="content">
                                <span>Conteúdo:</span>
                                <?= nl2br($extpost["content"]) ?>
                            </div>
                        </div>
                    </div>
                    <div class="actions">
                        <div class="flex justify-end items-start w-100 p-3 gap-x-3 h-14">
                            <button type="button"
                                class="closemodal bg-red-600 hover:bg-red-700 px-3 py-1 rounded text-white mr-1">
                                Cancelar
                            </button>
                            <form method="post" action="/admin/update">
                                <input type="hidden" name="sectionUpdateExtPostId" value=<?= $extpost["id"] ?> />
                                <select name="sectionUpdateExtPost">
                                    <option>n1</option>
                                    <option>n2</option>
                                    <option>n3</option>
                                    <option>n4</option>
                                </select>
                                <button type="submit" name="_method" value="put"
                                    class="bg-blue-600 hover:bg-blue-700 px-3 py-1 rounded text-white cursor-pointer">
                                    Atualizar seção
                                </button>
                            </form>
                            <form method="post" action="/admin/update">
                                <input type="hidden" name="ExtPostStatusId" value=<?= $extpost["id"] ?> />
                                <input type="hidden" name="status" value=<?= $extpost["status"] == "on" ? "off" : "on" ?> />
                                <button type="submit"
                                    class="bg-blue-600 hover:bg-blue-700 px-3 py-1 rounded text-white cursor-pointer">
                                    <?= $extpost["status"] == "on" ? "Despublicar" : "Publicar" ?>
                                </button>

                            </form>
                        </div>

                    </div>
                </div>
            <?php endforeach; ?>

        </div>
        <div class="ui bottom attached tab segment h-[calc(100vh_-_250px)] overflow-y-auto" data-tab="third">
            <!-- Third -->
            <?php
            foreach ($posts as $post): ?>
                <?php if ($post["status"] == "on"): ?>
                    <div class="flex justify-between items-center h-auto w-full my-2 px-3 py-2 gap-x-1">
                        <img src="/images/<?= $post["image"] ?>" class=" w-20 h-20  object-fit" />
                        <p class="w-96">
                            <?= $post["title"] ?>
                            <?= $post["id"] ?>
                        </p>
                        <p class="w-auto">
                            <?= $post["source"] ?>
                        </p>
                        <p class="w-5">
                            <?= $post["section"] ?>
                        </p>
                        <p class="w-24">
                            <?= date("d/m/Y h:i:s A", $post["posted_at"]); ?>
                        </p>
                        <p class="w-20 ">
                            <?= $post["status"] == "on" ? "Publicado" : "Fora do Ar" ?>
                        </p>
                        <div class="flex gap-x-1">
                            <button class="openmodal bg-black hover:bg-red-700 px-3 py-1 rounded text-white m-3">
                                Verificar
                            </button>
                        </div>
                    </div>
                    <!-- begin third-a -->
                    <div
                        class="ui modal two column grid infoModal absolute top-[200px] left-[500px] transform -translate-x-1/2 -translate-y-1/2">
                        <div class="header">
                            <?= $post["title"] ?>
                        </div>
                        <div class=" flex justify-start gap-x-2">
                            <div class="w-1/6">
                                <img src="/images/<?= $post["image"] ?>" class="w-28 h-28">
                            </div>
                            <div class="w-5/6">
                                <span>Posição:</span>
                                <span <?= $post["section"] ?>></span>
                                <div>
                                    <span>Status:</span>
                                    <?= $post["status"] == "off" ? "Fora do Ar" : "Publicado" ?>
                                </div>
                                <div>
                                    <span>Fonte:</span>
                                    <?= $post["source"] ?>
                                </div>

                                <div id="content">
                                    <span>Conteúdo:</span>
                                    <?= nl2br($post["content"]) ?>
                                </div>
                            </div>
                        </div>
                        <div class="actions">
                            <div class="flex justify-end items-start w-100 p-3 gap-x-3 h-14">
                                <button type="button"
                                    class="closemodal bg-red-600 hover:bg-red-700 px-3 py-1 rounded text-white mr-1">
                                    Fechar
                                </button>
                                <a href='/admin/editar?id=<?= $post["id"] ?>'
                                    class="bg-blue-600 hover:bg-blue-700 px-3 py-1 rounded text-white cursor-pointer hover:text-white">
                                    Editar
                                </a>

                            </div>

                        </div>
                    </div>
                <?php endif ?>
            <?php endforeach; ?>
            <!--  third-b -->
            <?php foreach ($extposts as $extpost): ?>
                <?php if ($extpost["status"] == "on"): ?>

                    <div class="flex justify-between items-center h-auto w-full my-2 px-3 py-2 gap-x-1">
                        <img src="<?= $extpost["image"] ?>" class="w-20 h-20  object-fit" />
                        <p class="w-96">
                            <?= $extpost["title"] ?>
                            <?= $extpost["id"] ?>
                        </p>
                        <p class="w-auto">
                            <?= $extpost["source"] ?>
                        </p>
                        <p class="w-5">
                            <?= $extpost["section"] ?>
                        </p>
                        <p class="w-24">
                            <?= date("d/m/Y h:i:s A", $extpost["posted_at"]); ?>
                        </p>
                        <p class="w-20 ">
                            <?= $extpost["status"] == "off" ? "Fora do Ar" : "Publicado" ?>
                        </p>
                        <div class="flex gap-x-1">
                            <button class="openmodal bg-black hover:bg-red-700 px-3 py-1 rounded text-white m-3">
                                Verificar
                            </button>

                        </div>
                    </div>
                    <!-- begin second modal -->
                    <div
                        class="ui modal two column grid infoModal absolute top-[200px] left-[500px] transform -translate-x-1/2 -translate-y-1/2">
                        <div class="header">
                            <?= $extpost["title"] ?>
                            <?= $extpost["id"] ?>
                        </div>
                        <div class=" flex justify-start gap-x-2">
                            <div class="w-1/6">
                                <img src="<?= $extpost["image"] ?>" class="w-28 h-28">
                            </div>
                            <div class="w-5/6">
                                <span>Posição:</span>
                                <span><?= $extpost["section"] ?></span>
                                <div>
                                    <span>Status:</span>
                                    <?= $extpost["status"] == "off" ? "Fora do Ar" : "Publicado" ?>
                                </div>
                                <div>
                                    <span>Fonte:</span>
                                    <?= $extpost["source"] ?>
                                </div>
                                <span>Link:</span>
                                <?= $extpost["link"] ?>
                                <div id="content">
                                    <span>Conteúdo:</span>
                                    <?= nl2br($extpost["content"]) ?>
                                </div>
                            </div>
                        </div>
                        <div class="actions">
                            <div class="flex justify-end items-start w-100 p-3 gap-x-3 h-14">
                                <button type="button"
                                    class="closemodal bg-red-600 hover:bg-red-700 px-3 py-1 rounded text-white mr-1">
                                    Fechar
                                </button>
                            </div>
                        </div>
                    </div>
                <?php endif ?>
            <?php endforeach; ?>

        </div>


    </main>

    <script src="../scripts/admin.js" defer></script>

</div>
<?php
require "views/partials/admin/footer.php";

?>