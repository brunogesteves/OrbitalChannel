<?php
require "views/partials/admin/header.php";
?>
<div class="h-[calc(100vh_-_184px)] flex justify-start">
    <?php
    require "views/partials/admin/sidebar.php";
    // var_dump("front");
    // var_dump($openModalIsValid);
    ?>

    <main class="w-full">
        <div class="ui tabular menu">
            <div class="active item" data-tab="tab-name">Frente</div>
            <div class="item" data-tab="tab-name2">Mobile</div>
        </div>
        <div class="ui active tab" data-tab="tab-name">
            <!-- Tab Content !-->
            <button class="openNewModalbtn text-white bg-black my-7 p-2 ml-4 rounded-lg text-xl">Adicionar
                Anúncio</button>

            <div class="flex flex-col h-auto ads">
                <?php
                foreach ($ads as $ad): ?>
                    <div class="flex justify-between items-center h-auto w-full my-2 px-3 py-2 gap-x-1 ">
                        <img src="../images/ads/<?= $ad['file'] ?>" class=" w-20 h-20  object-fit" />
                        <p class="w-auto">
                            <?= $ad["name"] ?>
                        </p>
                        <p class="w-24">
                            <?= $ad["link"] ?>
                        </p>
                        <p class="w-24">
                            <?= date("d/m/Y h:i:s A", $ad["starts_at"]); ?>
                        </p>
                        <p class="w-24">
                            <?= date("d/m/Y h:i:s A", $ad["finishs_at"]); ?>
                        </p>
                        <p class="w-20 ">
                            <?= $ad["status"] == "on" ? "Publicado" : "Fora do Ar" ?>
                        </p>
                        <div class="flex gap-x-1">
                            <form method="GET">
                                <button type="submit" name="getUniqueId" value="<?= $ad["id"] ?>"
                                    class="bg-black hover:bg-red-700 px-3 py-1 rounded text-white m-3">
                                    Verificar
                                </button>
                            </form>

                            <form method="POST" action="/admin/ads/destroy" class=" flex items-center">
                                <input type="hidden" name="deleteAdId" value=<?= $ad["id"] ?> />
                                <button type="submit" name="_method" value="DELETE" class="rounded-md" name="deletePost">
                                    <img src="/images/icons/trash.png" alt="trash" class="w-7" />
                                </button>
                            </form>
                        </div>

                    </div>

                    <!-- begin first ver modal -->

                <?php endforeach; ?>
            </div>
        </div>
</div>
<div class="ui tab" data-tab="tab-name2">
    <!-- Tab Content !-->
    Mobile
</div>
<!-- ver Adicionar AD modal -->

<div class="ui modal newAdModal absolute top-[450px] left-1/2 transform -translate-x-1/2 -translate-y-1/2">
    <div class="bg-gray-100 py-5">
        <form method="POST" action="/admin/ads/create" enctype="multipart/form-data"
            class="flex flex-col items-center gap-y-5 ">
            <div class="flex justify-center gap-x-2">
                <span class="text-xl">nome: </span>
                <input type="text" name="adName" class=" w-96 border-2 border-black rounded-lg"
                    value="<?= $_POST["adName"] ?>" />
            </div>
            <span class=" text-red-500 font-bold -mt-3">
                <?php if (isset($errors["adName"])): ?>
                    <?= $errors["adName"] ?>
                <?php endif; ?>
            </span>
            <div class="flex justify-center gap-x-2">
                <span class="text-xl">Imagem:</span>
                <input type="file" required name="adFile" id="adFileUpload" accept=".jpg, .jpeg, .png" />
            </div>
            <div id="previewInputAdImage">
            </div>
            <div class=" flex justify-center gap-x-2">
                <span class="text-xl">Posição:</span>
                <select name="adPosition" class="text-xl">
                    <option value="none">Selecione uma posição</option>
                    <option value="mobile" <?php if ($_POST["adPosition"] == "mobile"): ?>selected<?php endif; ?>>
                        Mobile</option>
                    <option value="front" <?php if ($_POST["adPosition"] == "front"): ?>selected<?php endif; ?>>
                        Frente</option>
                </select>
            </div>
            <span class="text-red-500 font-bold -mt-3">
                <?php if (isset($errors["adPosition"])): ?>
                    <?= $errors["adPosition"] ?>
                <?php endif; ?>
            </span>
            <div class="flex justify-center gap-x-2">
                <span class="text-xl">Link:</span>
                <input type="text" name="adLink" value="<?= $_POST["adLink"] ?>"
                    class="border-2 border-black rounded-lg px-2 w-96" />
            </div>
            <span class="text-red-500 font-bold -mt-3">
                <?php if (isset($errors["adLink"])): ?>
                    <?= $errors["adLink"] ?>
                <?php endif; ?>
            </span>
            <div class="flex justify-center gap-x-2">
                <span class="text-xl">Início: </span>
                <input type="datetime-local" min="<?= $minTime ?>" name="adStarts_at"
                    value="<?= $_POST["adStarts_at"] ?>" class="border-2 border-black
                rounded-lg px-2" />
            </div>
            <span class="text-red-500 font-bold -mt-3">
                <?php if (isset($errors["adStarts_at"])): ?>
                    <?= $errors["adStarts_at"] ?>
                <?php endif; ?>
            </span>
            <div class="flex justify-center gap-x-2">
                <span class="text-xl">Fim:</span>
                <input type="datetime-local" min="<?= $minTime ?>" name="adFinishs_at"
                    value="<?= $_POST["adStarts_at"] ?>" class="border-2 border-black rounded-lg px-2" />
            </div>
            <span class="text-red-500 font-bold -mt-3">
                <?php if (isset($errors["adFinishs_at"])): ?>
                    <?= $errors["adFinishs_at"] ?>
                <?php endif; ?>
            </span>
            <div class="flex gap-x-3 mt-4" action="">
                <button class="closeNewAdModalbtn text-white bg-red-500 close p-2 rounded-md text-sm font-bold">
                    Fechar</button>
                <button type="submit" class="text-white bg-black p-2 rounded-md text-sm font-bold">Adicionar
                    Anuncio</button>
            </div>
        </form>
    </div>
</div>


<!-- ver atualizar AD modal -->
<input class="hidden" id="openModalIsValid" value="<?= $openModalIsValid ?>" />

<?php if ($openModalIsValid): ?>
    <div class="ui modal updateAdModal absolute top-[450px] left-1/2 transform -translate-x-1/2 -translate-y-1/2">
        <div class="bg-gray-100 py-5">
            <form method="POST" action="/admin/ads/update" enctype="multipart/form-data"
                class="flex flex-col items-center gap-y-5 ">
                <div class="flex justify-center gap-x-2">
                    <span class="text-xl">nome: </span>
                    <input type="text" disabled name="adName" class=" w-96 border-2 border-black rounded-lg"
                        value="<?= $uniqueAd["name"] ?>" />
                </div>
                <span class=" text-red-500 font-bold -mt-3">
                    <?php if (isset($errorsUpdate["adName"])): ?>
                        <?= $errorsUpdate["adName"] ?>
                    <?php endif; ?>
                </span>
                <div class="flex justify-center gap-x-2">
                    <span class="text-xl">Imagem:</span>
                    <input type="file" required name="adFile" id="adFileUpload" accept=".jpg, .jpeg, .png" />
                </div>
                <div id="previewInputAdImage">
                    <?php if (isset($uniqueAd["file"])): ?>
                        <img src="../images/ads/<?= $uniqueAd["file"] ?>" class=" thumb-image w-48 " />`
                    <?php endif; ?>
                </div>
                <div class=" flex justify-center gap-x-2">
                    <span class="text-xl">Posição:</span>
                    <select name="adPosition" class="text-xl">
                        <option value="none">Selecione uma posição</option>
                        <option value="mobile" <?php if ($uniqueAd["position"] == "mobile"): ?>selected<?php endif; ?>>
                            Mobile</option>
                        <option value="front" <?php if ($uniqueAd["position"] == "front"): ?>selected<?php endif; ?>>
                            Frente</option>
                    </select>
                </div>
                <span class="text-red-500 font-bold -mt-3">
                    <?php if (isset($errorsUpdate["adPosition"])): ?>
                        <?= $errorsUpdate["adPosition"] ?>
                    <?php endif; ?>
                </span>
                <div class="flex justify-center gap-x-2">
                    <span class="text-xl">Link:</span>
                    <input type="text" name="adLink" value="<?= $ad["link"] ?>"
                        class="border-2 border-black rounded-lg px-2 w-96" />
                </div>
                <span class="text-red-500 font-bold -mt-3">
                    <?php if (isset($errorsUpdate["adLink"])): ?>
                        <?= $errorsUpdate["adLink"] ?>
                    <?php endif; ?>
                </span>
                <div class="flex justify-center gap-x-2">
                    <span class="text-xl">Início: </span>
                    <input type="datetime-local" min="<?= $minTime ?>" name="adStarts_at" value="<?= (new DateTime(date("Y-m-d h:i ", $uniqueAd["starts_at"])))->format('Y-m-d\TH:i')
                          ?>" class="border-2 border-black
                rounded-lg px-2" />
                </div>
                <span class="text-red-500 font-bold -mt-3">
                    <?php if (isset($errorsUpdate["adStarts_at"])): ?>
                        <?= $errorsUpdate["adStarts_at"] ?>
                    <?php endif; ?>
                </span>
                <div class="flex justify-center gap-x-2">
                    <span class="text-xl">Fim:</span>
                    <input type="datetime-local" min="<?= $minTime ?>" name="adFinishs_at" value="<?= (new DateTime(date("Y-m-d h:i ", $uniqueAd["starts_at"])))->format('Y-m-d\TH:i')
                          ?? $_POST["adStarts_at"] ?>" class="border-2 border-black rounded-lg px-2" />
                </div>
                <span class="text-red-500 font-bold -mt-3">
                    <?php if (isset($errorsUpdate["adFinishs_at"])): ?>
                        <?= $errorsUpdate["adFinishs_at"] ?>
                    <?php endif; ?>
                </span>
                <input type="hidden" name="updateAdId" value="<?= $ad["id"] ?>" />
                <div class="flex gap-x-3 mt-4">
                    <button class="closeUpdateAdModalbtn text-white bg-red-500 close p-2 rounded-md text-sm font-bold">
                        Fechar</button>
                    <button type="submit" name="_method" value="put"
                        class="text-white bg-black p-2 rounded-md text-sm font-bold">Atualizar
                        Anuncio</button>
                </div>
            </form>
        </div>
    </div>
<?php endif; ?>

</main>

<script src="../scripts/ads.js" defer></script>

</div>
<?php
require "views/partials/admin/footer.php";

?>