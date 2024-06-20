<?php
require "views/partials/admin/header.php";
?>
<div class="h-[calc(100vh_-_181px)] flex justify-start">
    <?php
    require "views/partials/admin/sidebar.php";
    ?>

    <main class="flex flex-col h-auto overflow-y-auto w-full relative">
        <div class="ui top attached tabular menu">
            <a class="item active" data-tab="first">Orbital</a>
            <a class="item" data-tab="second">Externos</a>
            <a class="item" data-tab="third">Nível 1</a>
            <a class="item" data-tab="fourth">Nível 2</a>
            <a class="item" data-tab="fifth">Nível 3</a>
            <a class="item" data-tab="sixth">Nível 4</a>
            <a class="item" data-tab="seventh">Automáticos</a>
        </div>
        <div class="ui bottom attached tab segment active h-[calc(100vh_-_250px)] overflow-y-auto " data-tab="first">
            <!-- First -->
            <?php
            foreach ($posts as $post): ?>
                <div class="flex justify-between items-center h-auto w-full my-2 px-3 py-2 gap-x-1">
                    <img src="images/<?= $post['image'] ?>" class=" w-20 h-10  object-fit" />
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
                        <?= date("d-m-Y h:i ", $post["post_at"]) ?>
                    </p>
                    <p class="w-20 ">
                        <?= $post["status"] == "on" ? "Publicado" : "Fora do Ar" ?>
                    </p>
                    <div class="flex gap-x-1">
                        <button class="openmodalPost bg-black hover:bg-red-700 px-3 py-1 rounded text-white m-3">
                            Verificar
                        </button>
                        <form method="POST" action="orbital//admin/destroy" class="flex items-center">
                            <input type="hidden" name="deletePostId" value=<?= $post["id"] ?> />
                            <button type="submit" class="rounded-md" name="_method" value="DELETE">
                                <img src="images/icons/trash.png" alt="trash" class="w-7" />
                            </button>
                        </form>
                    </div>
                </div>
                <!-- begin first modal -->
                <div
                    class="ui modal fullscreen infoModal two column grid h-fit">
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
                        <div class="flex justify-end items-start w-100 p-3 gap-x-3 h-10">
                            <button type="button"
                                class="closemodalPost bg-red-600 hover:bg-red-700 px-3 py-1 rounded text-white mr-1">
                                Cancelar
                            </button>
                            <a href='/admin/editar?id=<?= $post["id"] ?>'
                                class="bg-blue-600 hover:bg-blue-700 px-3 py-1 rounded text-white cursor-pointer hover:text-white">
                                Editar
                            </a>
                            <form method="post" action="orbital//admin/update">
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
                    <img src="<?= $extpost["image"] ?>" class="w-20 h-10  object-fit" />
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
                        <?= date("d-m-Y h:i ", $post["post_at"]) ?>
                    </p>
                    <p class="w-20 ">
                        <?= $extpost["status"] == "off" ? "Fora do Ar" : "Publicado" ?>
                    </p>
                    <div class="flex gap-x-1">
                        <button class="openmodalPost bg-black hover:bg-red-700 px-3 py-1 rounded text-white m-3">
                            Verificar
                        </button>
                        <form method="POST" action="orbital//admin/destroy" class="flex items-center">
                            <input type="hidden" name="DeleteExtPostId" value=<?= $extpost["id"] ?> />
                            <button type="submit" name="_method" value="DELETE" class=" rounded-md">
                                <img src="/images/icons/trash.png" alt="trash" class="w-7" />
                            </button>
                        </form>
                    </div>
                </div>
                <!-- begin second modal -->
                <div
                class="ui modal fullscreen infoModal two column grid h-fit">
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
                        <div class="flex justify-end items-start w-100 p-3 gap-x-3 h-10">
                            <button type="button"
                                class="closemodalPost bg-red-600 hover:bg-red-700 px-3 py-1 rounded text-white mr-1">
                                Cancelar
                            </button>
                            <form method="post" action="orbital//admin/update">
                                <input type="hidden" name="sectionUpdateExtPostId" value=<?= $extpost["id"] ?> />
                                <select name="sectionUpdateExtPost">
                                    <option <?php if ($extpost["section"] == "n1"): ?> selected <?php endif; ?>>n1</option>
                                    <option <?php if ($extpost["section"] == "n2"): ?> selected <?php endif; ?>>n2</option>
                                    <option <?php if ($extpost["section"] == "n3"): ?> selected <?php endif; ?>>n3</option>
                                    <option <?php if ($extpost["section"] == "n4"): ?> selected <?php endif; ?>>n4</option>
                                </select>
                                <button type="submit" name="_method" value="put"
                                    class="bg-blue-600 hover:bg-blue-700 px-3 py-1 rounded text-white cursor-pointer">
                                    Atualizar seção
                                </button>
                            </form>
                            <form method="post" action="orbital//admin/update">
                                <input type="hidden" name="ExtPostStatusId" value=<?= $extpost["id"] ?> />
                                <input type="hidden" name="status" value=<?= $extpost["status"] == "on" ? "off" : "on" ?> />
                                <button type="submit" name="_method" value="put"
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
            <span>
                No momento : <?= sizeof($posts1) ?> /4
            </span>
            <?php
            foreach ($posts1 as $post): ?>
                <div class="flex justify-between items-center h-auto w-full my-2 px-3 py-2 gap-x-1">
                    <img src=<?= $post["source"] == "Orbital Channel" ? '/images/' . $post["image"] : $post["image"] ?>
                        class=" w-20 h-10 object-cover" />
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
                        <?= date("d-m-Y h:i ", $post["post_at"]) ?>
                    </p>
                    <p class="w-20 ">
                        <?= $post["status"] == "on" ? "Publicado" : "Fora do Ar" ?>
                    </p>
                    <div class="flex gap-x-1">
                        <button class="openmodalPost bg-black hover:bg-red-700 px-3 py-1 rounded text-white m-3">
                            Verificar
                        </button>
                    </div>
                </div>
                <!-- begin fourth-a -->
                <div
                class="ui modal fullscreen infoModal two column grid h-fit">
                    <div class="header">
                        <?= $post["title"] ?>
                    </div>
                    <div class=" flex justify-start gap-x-2">
                        <div class="w-1/6">
                            <img src=<?= $post["source"] == "Orbital Channel" ? '/images/' . $post["image"] : $post["image"] ?>
                                class=" w-20 h-20 object-cover" />
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
                                class="closemodalPost bg-red-600 hover:bg-red-700 px-3 py-1 rounded text-white mr-1">
                                Fechar
                            </button>
                            <?php if ($post["source"] == "Orbital Channel"): ?>
                                <a href='/admin/editar?id=<?= $post["id"] ?>'
                                    class="bg-blue-600 hover:bg-blue-700 px-3 py-1 rounded text-white cursor-pointer hover:text-white">
                                    Editar
                                </a>
                            <?php endif; ?>

                        </div>

                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <div class="ui bottom attached tab segment h-[calc(100vh_-_250px)] overflow-y-auto" data-tab="fourth">
            <!-- fourth -->
            <span>
                No momento : <?= sizeof($posts2) ?> /4
            </span>
            <?php
            foreach ($posts2 as $post): ?>
                <div class="flex justify-between items-center h-auto w-full my-2 px-3 py-2 gap-x-1">
                    <img src=<?= $post["source"] == "Orbital Channel" ? '/images/' . $post["image"] : $post["image"] ?>
                        class=" w-20 h-10 object-cover" />
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
                        <?= date("d-m-Y h:i ", $post["post_at"]) ?>
                    </p>
                    <p class="w-20 ">
                        <?= $post["status"] == "on" ? "Publicado" : "Fora do Ar" ?>
                    </p>
                    <div class="flex gap-x-1">
                        <button class="openmodalPost bg-black hover:bg-red-700 px-3 py-1 rounded text-white m-3">
                            Verificar
                        </button>
                    </div>
                </div>
                <!-- begin fourth-a -->
                <div
                class="ui modal fullscreen infoModal two column grid h-fit">
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
                                class="closemodalPost bg-red-600 hover:bg-red-700 px-3 py-1 rounded text-white mr-1">
                                Fechar
                            </button>
                            <?php if ($post["source"] == "Orbital Channel"): ?>
                                <a href='/admin/editar?id=<?= $post["id"] ?>'
                                    class="bg-blue-600 hover:bg-blue-700 px-3 py-1 rounded text-white cursor-pointer hover:text-white">
                                    Editar
                                </a>
                            <?php endif; ?>

                        </div>

                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <div class="ui bottom attached tab segment h-[calc(100vh_-_250px)] overflow-y-auto" data-tab="fifth">
            <!-- fifth -->
            <span>
                No momento : <?= sizeof($posts3) ?> /8
            </span>
            <?php
            foreach ($posts3 as $post): ?>
                <div class="flex justify-between items-center h-auto w-full my-2 px-3 py-2 gap-x-1">
                    <img src=<?= $post["source"] == "Orbital Channel" ? '/images/' . $post["image"] : $post["image"] ?>
                        class=" w-20 h-10 object-cover" />
                    <?= $post["title"] ?>
                    </p>
                    <p class="w-auto">
                        <?= $post["source"] ?>
                    </p>
                    <p class="w-5">
                        <?= $post["section"] ?>
                    </p>
                    <p class="w-24">
                        <?= date("d-m-Y h:i ", $post["post_at"]) ?>
                    </p>
                    <p class="w-20 ">
                        <?= $post["status"] == "on" ? "Publicado" : "Fora do Ar" ?>
                    </p>
                    <div class="flex gap-x-1">
                        <button class="openmodalPost bg-black hover:bg-red-700 px-3 py-1 rounded text-white m-3">
                            Verificar
                        </button>
                    </div>
                </div>
                <!-- begin fourth-a -->
                <div
                class="ui modal fullscreen infoModal two column grid h-fit">
                    <div class="header">
                        <?= $post["title"] ?>
                    </div>
                    <div class=" flex justify-start gap-x-2">
                        <div class="w-1/6">
                            <img src=<?= $post["source"] == "Orbital Channel" ? '/images/' . $post["image"] : $post["image"] ?>
                                class=" w-20 h-20 object-cover" />
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
                                class="closemodalPost bg-red-600 hover:bg-red-700 px-3 py-1 rounded text-white mr-1">
                                Fechar
                            </button>
                            <?php if ($post["source"] == "Orbital Channel"): ?>
                                <a href='/admin/editar?id=<?= $post["id"] ?>'
                                    class="bg-blue-600 hover:bg-blue-700 px-3 py-1 rounded text-white cursor-pointer hover:text-white">
                                    Editar
                                </a>
                            <?php endif; ?>

                        </div>

                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <div class="ui bottom attached tab segment h-[calc(100vh_-_250px)] overflow-y-auto" data-tab="sixth">
            <!-- sixth -->
            <span>
                No momento : <?= sizeof($posts4) ?> /9
            </span>
            <?php
            foreach ($posts4 as $post): ?>
                <div class="flex justify-between items-center h-auto w-full my-2 px-3 py-2 gap-x-1">
                    <img src=<?= $post["source"] == "Orbital Channel" ? '/images/' . $post["image"] : $post["image"] ?>
                        class=" w-20 h-20 object-cover" />
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
                        <?= date("d-m-Y h:i ", $post["post_at"]) ?>
                    </p>
                    <p class="w-20 ">
                        <?= $post["status"] == "on" ? "Publicado" : "Fora do Ar" ?>
                    </p>
                    <div class="flex gap-x-1">
                        <button class="openmodalPost bg-black hover:bg-red-700 px-3 py-1 rounded text-white m-3">
                            Verificar
                        </button>
                    </div>
                </div>
                <!-- begin fourth-a -->
                <div
                class="ui modal fullscreen infoModal two column grid h-fit">
                    <div class="header">
                        <?= $post["title"] ?>
                    </div>
                    <div class=" flex justify-start gap-x-2">
                        <div class="w-1/6">
                            <img src=<?= $post["source"] == "Orbital Channel" ? '/images/' . $post["image"] : $post["image"] ?>
                                class=" w-20 h-10 object-cover" />
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
                                class="closemodalPost bg-red-600 hover:bg-red-700 px-3 py-1 rounded text-white mr-1">
                                Fechar
                            </button>
                            <?php if ($post["source"] == "Orbital Channel"): ?>
                                <a href='/admin/editar?id=<?= $post["id"] ?>'
                                    class="bg-blue-600 hover:bg-blue-700 px-3 py-1 rounded text-white cursor-pointer hover:text-white">
                                    Editar
                                </a>
                            <?php endif; ?>

                        </div>

                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <div class="ui bottom attached tab segment h-[calc(100vh_-_250px)] overflow-y-auto" data-tab="seventh">
            <!-- seventh -->
            <?php
            foreach ($autoposts as $post): ?>
                <div class="flex justify-between items-center h-auto w-full my-2 px-3 py-2 gap-x-1">
                    <img src="<?= $post["image"] ?>" class=" w-20 h-10  object-fit" />
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
                        <?= date("d-m-Y h:i ", $post["post_at"]) ?>
                    </p>
                    <p class="w-20 ">
                        <?= $post["status"] == "on" ? "Publicado" : "Fora do Ar" ?>
                    </p>
                    <div class="flex gap-x-1">
                        <button class="openmodalPost bg-black hover:bg-red-700 px-3 py-1 rounded text-white m-3">
                            Verificar
                        </button>
                    </div>
                </div>
                <!-- begin fourth-a -->
                <div
                class="ui modal fullscreen infoModal two column grid h-fit">
                    <div class="header">
                        <?= $post["title"] ?>
                    </div>
                    <div class=" flex justify-start gap-x-2">
                        <div class="w-1/6">
                            <img src="<?= $post["image"] ?>" class="w-28 h-28">
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
                                class="closemodalPost bg-red-600 hover:bg-red-700 px-3 py-1 rounded text-white mr-1">
                                Fechar
                            </button>
                        </div>

                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </main>

    <script src="scripts/admin.js" defer></script>

</div>
<?php
require "views/partials/admin/footer.php";

?>