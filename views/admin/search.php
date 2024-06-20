<?php
require "views/partials/admin/headerAdmin.php";
?>

<div class="h-[calc(100vh_-_195px)] flex justify-start">
    <?php
    require "views/partials/admin/sidebar.php";

    ?>

    <main class="flex flex-col h-auto overflow-y-auto w-full">
        <div class="flex justify-start items-center w-full flex-col h-full">
            <div class="mt-3 w-full">
                <form method="POST" action="orbital//admin/procurar/search"
                    class=" w-full h-20 flex justify-center items-center gap-x-3">
                    <input type="text" required name="searchTerm" value="brasil"
                        class="bg-slate-300 rounded-md pl-2 outline-none" placeholder="buscar" />
                    <select class="h-5" name="language" required>
                        <option value="pt">Português</option>
                        <?php
                        foreach ($countries as $key => $values): ?>
                            <option value=<?= $values ?>><?= $key ?></option>
                        <?php endforeach; ?>
                    </select>
                    <button type="submit"
                        class="bg-slate-600 hover:bg-slate-700 px-3 py-1 rounded text-white m-5 cursor-pointer">Pesquisar
                    </button>
                </form>
            </div>
            <div class=" h-auto overflow-y-auto w-full h-[calc(100vh_-_250px)] overflow-y-auto">
                <?php
                foreach ($results as $result): ?>
                    <div class="flex justify-between items-center h-auto gap-x-3 p-3">
                        <img src="../<?= $result["media"] ?>" class="w-28 h-auto object-scale-down" />
                        <p>
                            <?= $result["title"] ?>
                        </p>
                        <div class="flex gap-x-5">
                            <button
                                class="openExternalInfoModalbtn bg-red-600 hover:bg-red-700 px-3 py-1 rounded text-white m-5">
                                Verificar
                            </button>
                        </div>
                    </div>
                    <!-- modal -->
                    <div
                        class="ui modal two column grid ExternalInfoModal absolute top-[300px] left-1/2 transform -translate-x-1/2 -translate-y-1/2">
                        <div class="header">
                            <?= $result["title"] ?>
                        </div>
                        <div class=" flex justify-start gap-x-2">
                            <div class="w-1/6">
                                <img src="../<?= $result["media"] ?>" class="w-full">
                            </div>
                            <div class="w-5/6 ">
                                <div>
                                    <span>Fonte:</span>
                                    <?= $result["clean_url"] ?>
                                </div>
                                <span>Link:</span>
                                <?= $result["link"] ?>

                                <div id="content">
                                    <span>Conteúdo:</span>
                                    <?= $result["summary"] ?>
                                </div>
                            </div>
                        </div>
                        <hr class="my-3">
                        <div class="  flex justify-end items-center gap-x-10 ">
                            <div class="flex justify-end items-start w-100 p-3 h-14">
                                <button type="button"
                                    class="closeExternalInfoModalbtn bg-red-600 hover:bg-red-700 px-3 h-full  rounded text-white mr-5">
                                    Cancelar
                                </button>
                                <form method="POST" action="orbital//admin/procurar/search" class="flex gap-x-5">
                                    <input type="hidden" name="title" value="<?= $result["title"] ?>" />
                                    <select name="section">
                                        <option>n1</option>
                                        <option>n2</option>
                                        <option>n3</option>
                                        <option>n4</option>
                                    </select>
                                    <input type="hidden" name="content" value="<?= $result["summary"] ?>" />
                                    <input type="hidden" name="source" value="<?= $result["clean_url"] ?>" />
                                    <input type="hidden" name="link" value="<?= $result["link"] ?>" />
                                    <input type="hidden" name="image" value="<?= $result["media"] ?>" />
                                    <input required type="datetime-local" name="post_at" min="<?= $minTime ?>" />
                                    <button type="submit" name="addExternalSource"
                                        class="bg-blue-600 hover:bg-blue-700 px-3 py-1 rounded text-white cursor-pointer">
                                        Adicionar
                                    </button>

                                </form>
                            </div>

                        </div>
                    </div>


                <?php endforeach; ?>
            </div>
    </main>
    <script src="../scripts/search.js"></script>


</div>
<?php
require "views/partials/admin/footer.php";

?>