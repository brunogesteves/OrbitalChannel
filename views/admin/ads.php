<?php
require "views/partials/admin/headerAdmin.php";

?>
<div class="h-[calc(98vh_-_181px)] flex justify-start">
    <?php
    require "views/partials/admin/sidebar.php";
    ?>

    <main class="w-full">
        <div class="ui tabular menu">
            <div class="active item" data-tab="front">Frente</div>
            <div class="item" data-tab="mobile">Mobile</div>
            <div class="item" data-tab="slide">Slide</div>
        </div>

        <div class="ui active tab" data-tab="front">


            <button class="openNewModalbtn text-white bg-black my-7 p-2 ml-4 rounded-lg text-xl">Adicionar
                Anúncio</button>

            <div class="flex flex-col h-[calc(100vh_-_350px)] ads overflow-y-auto">
                <?php
                foreach ($frontAds as $ad) : ?>
                    <img src="../images/ads/<?= $ad['file'] ?>" class=" w-full object-fit object-center" />
                    <div class="flex justify-between items-center h-auto w-full my-2 px-3 py-2 gap-x-1 ">
                        <p class="w-auto ">
                            <?= $ad["name"] ?>
                        </p>
                        <p class="w-auo">
                            <?= $ad["link"] ?>
                        </p>
                        <p class="w-24 ">
                            <?= date("d/m/Y h:i:s A", $ad["starts_at"]); ?>
                        </p>
                        <p class="w-24 ">
                            <?= date("d/m/Y h:i:s A", $ad["finishs_at"]); ?>
                        </p>
                        <p class="w-20">
                            <?= $ad["status"] == "on" ? "Publicado" : "Fora do Ar" ?>
                        </p>
                        <div class="flex gap-x-1">
                            <form method="POST" action="/admin/ads/publish" class=" flex items-center">
                                <input type="hidden" name="statusId" value=<?= $ad["id"] ?> />
                                <input type="hidden" name="recentStatus" value=<?= $ad["status"] == "on" ? "off" : "on" ?> />
                                <button type="submit" name="_method" value="put" class="bg-red-500 hover:bg-red-700 px-3 py-1 rounded-md text-white m-3">
                                    <?= $ad["status"] == "on" ? "Despublicar" : "Publicar" ?>
                                </button>
                            </form>
                            <button class="openUpdateAdModalbtn bg-black hover:bg-red-700 px-3 py-1 rounded text-white m-3">
                                Verificar
                            </button>
                            <form method="POST" action="/admin/ads/destroy" class=" flex items-center">
                                <input type="hidden" name="deleteAdId" value=<?= $ad["id"] ?> />
                                <input type="hidden" name="deleteAdname" value=<?= $ad["name"] ?> />
                                <button type="submit" name="_method" value="DELETE" class="rounded-md" name="deletePost">
                                    <img src="../images/icons/trash.png" alt="trash" class="w-7" />
                                </button>
                            </form>
                        </div>
                    </div>
                    <div class="ui modal fullscreen updateAdModal h-fit">
                        <div class="bg-gray-100 py-5">
                            <form method="POST" action="/admin/ads/update" enctype="multipart/form-data" class="flex flex-col items-center gap-y-5 ">
                                <div class="flex justify-center gap-x-2">
                                    <span class="text-xl">nome: </span>
                                    <input type="text" disabled class=" w-96 border-2 border-black rounded-lg" value="<?= $ad["name"] ?>" />
                                </div>
                                <div class="flex justify-center gap-x-2">
                                    <span class="text-xl">Imagem:</span>
                                    <input type="file" name="adUpdateFileUpload" class="adUpdateFileUpload" accept=".jpg, .jpeg, .png" value="[]" />
                                </div>
                                <div class="previewUploadInputAdImage">
                                    <img src="../images/ads/<?= $ad["file"] ?>" class=" thumb-image w-48 " />`
                                </div>
                                <div class=" flex justify-center gap-x-2">
                                    <span class="text-xl">Posição:</span>
                                    <select name="adPosition" class="text-xl">
                                        <option value="none">Selecione uma posição</option>
                                        <option value="mobile" <?= $ad["position"] == "mobile" ? "selected" : "" ?>>
                                            Mobile</option>
                                        <option value="front" <?= $ad["position"] == "front" ? "selected" : "" ?>>
                                            Frente</option>
                                        <option value="slide" <?= $ad["position"] == "slide" ? "selected" : "" ?>>
                                            Slide</option>
                                    </select>
                                </div>
                                <span class="text-red-500 font-bold -mt-3">
                                    <?php if (isset($errorsUpdate["adPosition"])) : ?>
                                        <?= $errorsUpdate["adPosition"] ?>
                                    <?php endif; ?>
                                </span>
                                <div class="flex justify-center gap-x-2">
                                    <span class="text-xl">Link:</span>
                                    <input type="text" name="adLink" value="<?= $ad["link"] ?>" class="border-2 border-black rounded-lg px-2 w-96" />
                                </div>
                                <span class="text-red-500 font-bold -mt-3">
                                    <?php if (isset($errorsUpdate["adLink"])) : ?>
                                        <?= $errorsUpdate["adLink"] ?>
                                    <?php endif; ?>
                                </span>
                                <div class="flex justify-center gap-x-2">
                                    <span class="text-xl">Início: </span>
                                    <input type="datetime-local" min="<?= $minTime ?>" name="adStarts_at" value="<?= (new DateTime(date("Y-m-d h:i ", $ad["starts_at"])))->format('Y-m-d\TH:i')
                                                                                                                    ?>" class="border-2 border-black rounded-lg px-2" />
                                </div>
                                <span class="text-red-500 font-bold -mt-3">
                                    <?php if (isset($errorsUpdate["adStarts_at"])) : ?>
                                        <?= $errorsUpdate["adStarts_at"] ?>
                                    <?php endif; ?>
                                </span>
                                <div class="flex justify-center gap-x-2">
                                    <span class="text-xl">Fim:</span>
                                    <input type="datetime-local" min="<?= $minTime ?>" name="adFinishs_at" value="<?= (new DateTime(date("Y-m-d h:i ", $ad["finishs_at"])))->format('Y-m-d\TH:i')
                                                                                                                        ?? $_POST["adStarts_at"] ?>" class="border-2 border-black rounded-lg px-2" />
                                </div>
                                <span class="text-red-500 font-bold -mt-3">
                                    <?php if (isset($errorsUpdate["adFinishs_at"])) : ?>
                                        <?= $errorsUpdate["adFinishs_at"] ?>
                                    <?php endif; ?>
                                </span>
                                <input type="hidden" name="updateAdId" value="<?= $ad["id"] ?>" />
                                <input type="hidden" name="adName" value="<?= $ad["name"] ?>" />
                                <div class="flex gap-x-3 mt-4">
                                    <button type="button" class="closeUpdateAdModalbtn bg-red-600 hover:bg-red-700 px-3 py-1 rounded text-white mr-1">
                                        Cancelar
                                    </button>
                                    <button type="submit" name="_method" value="put" class="text-white bg-black p-2 rounded-md text-sm font-bold">Atualizar
                                        Anúncio</button>
                                </div>
                            </form>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
        <div class="ui tab" data-tab="mobile">
            <!-- Tab Content !-->
            <button class="openNewModalbtn text-white bg-black my-7 p-2 ml-4 rounded-lg text-xl">Adicionar
                Anúncio</button>

            <div class="flex flex-col h-[calc(100vh_-_350px)] ads overflow-y-auto">
                <?php
                foreach ($mobileAds as $ad) : ?>
                    <img src="../images/ads/<?= $ad['file'] ?>" class=" w-full object-fit object-center" />
                    <div class="flex justify-between items-center h-auto w-full my-2 px-3 py-2 gap-x-1 ">
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
                            <form method="POST" action="/admin/ads/publish" class=" flex items-center">
                                <input type="hidden" name="statusId" value=<?= $ad["id"] ?> />
                                <input type="hidden" name="recentStatus" value=<?= $ad["status"] == "on" ? "off" : "on" ?> />
                                <button type="submit" name="_method" value="put" name="statusPost" class="bg-red-500 hover:bg-red-700 px-3 py-1 rounded-md text-white m-3">
                                    <?= $ad["status"] == "on" ? "Despublicar" : "Publicar" ?>
                                </button>
                            </form>
                            <button class="openUpdateAdModalbtn bg-black hover:bg-red-700 px-3 py-1 rounded text-white m-3">
                                Verificar
                            </button>
                            <form method="POST" action="/admin/ads/destroy" class=" flex items-center">
                                <input type="hidden" name="deleteAdId" value=<?= $ad["id"] ?> />
                                <input type="hidden" name="deleteAdname" value=<?= $ad["name"] ?> />
                                <button type="submit" name="_method" value="DELETE" class="rounded-md" name="deletePost">
                                    <img src="../images/icons/trash.png" alt="trash" class="w-7" />
                                </button>
                            </form>
                        </div>
                    </div>
                    <div class="ui modal fullscreen updateAdModal h-fit">
                        <div class="bg-gray-100 py-5">
                            <form method="POST" action="/admin/ads/update" enctype="multipart/form-data" class="flex flex-col items-center gap-y-5 ">
                                <div class="flex justify-center gap-x-2">
                                    <span class="text-xl">nome: </span>
                                    <input type="text" disabled class=" w-96 border-2 border-black rounded-lg" value="<?= $ad["name"] ?>" />
                                </div>
                                <span class=" text-red-500 font-bold -mt-3">
                                    <?php if (isset($errorsUpdate["adName"])) : ?>
                                        <?= $errorsUpdate["adName"] ?>
                                    <?php endif; ?>
                                </span>
                                <div class="flex justify-center gap-x-2">
                                    <span class="text-xl">Imagem:</span>
                                    <input type="file" name="adUpdateFileUpload" class="adUpdateFileUpload" accept=".jpg, .jpeg, .png" />
                                </div>
                                <div class="previewUploadInputAdImage">
                                    <img src="../images/ads/<?= $ad["file"] ?>" class=" thumb-image w-48 " />`
                                </div>
                                <div class=" flex justify-center gap-x-2">
                                    <span class="text-xl">Posição:</span>
                                    <select name="adPosition" class="text-xl">
                                        <option value="none">Selecione uma posição</option>
                                        <option value="mobile" <?= $ad["position"] == "mobile" ? "selected" : "" ?>>
                                            Mobile</option>
                                        <option value="front" <?= $ad["position"] == "front" ? "selected" : "" ?>>
                                            Frente</option>
                                        <option value="slide" <?= $ad["position"] == "slide" ? "selected" : "" ?>>
                                            Slide</option>
                                    </select>
                                </div>
                                <span class="text-red-500 font-bold -mt-3">
                                    <?php if (isset($errorsUpdate["adPosition"])) : ?>
                                        <?= $errorsUpdate["adPosition"] ?>
                                    <?php endif; ?>
                                </span>
                                <div class="flex justify-center gap-x-2">
                                    <span class="text-xl">Link:</span>
                                    <input type="text" name="adLink" value="<?= $ad["link"] ?>" class="border-2 border-black rounded-lg px-2 w-96" />
                                </div>
                                <span class="text-red-500 font-bold -mt-3">
                                    <?php if (isset($errorsUpdate["adLink"])) : ?>
                                        <?= $errorsUpdate["adLink"] ?>
                                    <?php endif; ?>
                                </span>
                                <div class="flex justify-center gap-x-2">
                                    <span class="text-xl">Início: </span>
                                    <input type="datetime-local" min="<?= $minTime ?>" name="adStarts_at" value="<?= (new DateTime(date("Y-m-d h:i ", $ad["starts_at"])))->format('Y-m-d\TH:i')
                                                                                                                    ?>" class="border-2 border-black rounded-lg px-2" />
                                </div>
                                <span class="text-red-500 font-bold -mt-3">
                                    <?php if (isset($errorsUpdate["adStarts_at"])) : ?>
                                        <?= $errorsUpdate["adStarts_at"] ?>
                                    <?php endif; ?>
                                </span>
                                <div class="flex justify-center gap-x-2">
                                    <span class="text-xl">Fim:</span>
                                    <input type="datetime-local" min="<?= $minTime ?>" name="adFinishs_at" value="<?= (new DateTime(date("Y-m-d h:i ", $ad["finishs_at"])))->format('Y-m-d\TH:i')
                                                                                                                        ?? $_POST["adStarts_at"] ?>" class="border-2 border-black rounded-lg px-2" />
                                </div>
                                <span class="text-red-500 font-bold -mt-3">
                                    <?php if (isset($errorsUpdate["adFinishs_at"])) : ?>
                                        <?= $errorsUpdate["adFinishs_at"] ?>
                                    <?php endif; ?>
                                </span>
                                <input type="hidden" name="updateAdId" value="<?= $ad["id"] ?>" />
                                <input type="hidden" name="adName" value="<?= $ad["name"] ?>" />
                                <div class="flex gap-x-3 mt-4">
                                    <button class="closeUpdateAdModalbtn text-white bg-red-500 close p-2 rounded-md text-sm font-bold">
                                        Fechar</button>
                                    <button type="submit" name="_method" value="put" class="text-white bg-black p-2 rounded-md text-sm font-bold">Atualizar
                                        Anúncio</button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <!-- begin first ver modal -->
                <?php endforeach; ?>
            </div>
        </div>
        <div class="ui tab" data-tab="slide">
            <!-- Tab Content !-->
            <button class="openNewModalbtn text-white bg-black my-7 p-2 ml-4 rounded-lg text-xl">Adicionar
                Anúncio</button>

            <div class="flex flex-col h-[calc(100vh_-_350px)] ads overflow-y-auto">
                <?php
                foreach ($slideAds as $ad) : ?>
                    <img src="../images/ads/<?= $ad['file'] ?>" class=" w-full object-fit object-center" />
                    <input type="hidden" name="recentStatus" value=<?= $ad["status"] == "on" ? "off" : "on" ?> />
                    <div class="flex justify-between items-center h-auto w-full my-2 px-3 py-2 gap-x-1 ">
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
                            <form method="POST" action="/admin/ads/publish" class=" flex items-center">
                                <input type="hidden" name="statusId" value=<?= $ad["id"] ?> />
                                <input type="hidden" name="recentStatus" value=<?= $ad["status"] == "on" ? "off" : "on" ?> />
                                <button type="submit" name="_method" value="put" name="statusPost" class="bg-red-500 hover:bg-red-700 px-3 py-1 rounded-md text-white m-3">
                                    <?= $ad["status"] == "on" ? "Despublicar" : "Publicar" ?>
                                </button>
                            </form>
                            <button class="openUpdateAdModalbtn bg-black hover:bg-red-700 px-3 py-1 rounded text-white m-3">
                                Verificar
                            </button>
                            <form method="POST" action="/admin/ads/destroy" class=" flex items-center">
                                <input type="hidden" name="deleteAdId" value=<?= $ad["id"] ?> />
                                <input type="hidden" name="deleteAdname" value=<?= $ad["name"] ?> />
                                <button type="submit" name="_method" value="DELETE" class="rounded-md" name="deletePost">
                                    <img src="../images/icons/trash.png" alt="trash" class="w-7" />
                                </button>
                            </form>
                        </div>
                    </div>
                    <div class="ui modal fullscreen updateAdModal h-fit">
                        <div class="bg-gray-100 py-5">
                            <form method="POST" action="/admin/ads/update" enctype="multipart/form-data" class="flex flex-col items-center gap-y-5 ">
                                <div class="flex justify-center gap-x-2">
                                    <span class="text-xl">nome: </span>
                                    <input type="text" disabled class=" w-96 border-2 border-black rounded-lg" value="<?= $ad["name"] ?>" />
                                </div>
                                <span class=" text-red-500 font-bold -mt-3">
                                    <?php if (isset($errorsUpdate["adName"])) : ?>
                                        <?= $errorsUpdate["adName"] ?>
                                    <?php endif; ?>
                                </span>
                                <div class="flex justify-center gap-x-2">
                                    <span class="text-xl">Imagem:</span>
                                    <input type="file" name="adUpdateFileUpload" class="adUpdateFileUpload" accept=".jpg, .jpeg, .png" />
                                </div>
                                <div class="previewUploadInputAdImage">
                                    <img src="../images/ads/<?= $ad["file"] ?>" class=" thumb-image w-48 " />`
                                </div>
                                <div class=" flex justify-center gap-x-2">
                                    <span class="text-xl">Posição:</span>
                                    <select name="adPosition" class="text-xl">
                                        <option value="none">Selecione uma posição</option>
                                        <option value="mobile" <?= $ad["position"] == "mobile" ? "selected" : "" ?>>
                                            Mobile</option>
                                        <option value="front" <?= $ad["position"] == "front" ? "selected" : "" ?>>
                                            Frente</option>
                                        <option value="slide" <?= $ad["position"] == "slide" ? "selected" : "" ?>>
                                            Slide</option>
                                    </select>
                                </div>
                                <span class="text-red-500 font-bold -mt-3">
                                    <?php if (isset($errorsUpdate["adPosition"])) : ?>
                                        <?= $errorsUpdate["adPosition"] ?>
                                    <?php endif; ?>
                                </span>
                                <div class="flex justify-center gap-x-2">
                                    <span class="text-xl">Link:</span>
                                    <input type="text" name="adLink" value="<?= $ad["link"] ?>" class="border-2 border-black rounded-lg px-2 w-96" />
                                </div>
                                <span class="text-red-500 font-bold -mt-3">
                                    <?php if (isset($errorsUpdate["adLink"])) : ?>
                                        <?= $errorsUpdate["adLink"] ?>
                                    <?php endif; ?>
                                </span>
                                <div class="flex justify-center gap-x-2">
                                    <span class="text-xl">Início: </span>
                                    <input type="datetime-local" min="<?= $minTime ?>" name="adStarts_at" value="<?= (new DateTime(date("Y-m-d h:i ", $ad["starts_at"])))->format('Y-m-d\TH:i')
                                                                                                                    ?>" class="border-2 border-black rounded-lg px-2" />
                                </div>
                                <span class="text-red-500 font-bold -mt-3">
                                    <?php if (isset($errorsUpdate["adStarts_at"])) : ?>
                                        <?= $errorsUpdate["adStarts_at"] ?>
                                    <?php endif; ?>
                                </span>
                                <div class="flex justify-center gap-x-2">
                                    <span class="text-xl">Fim:</span>
                                    <input type="datetime-local" min="<?= $minTime ?>" name="adFinishs_at" value="<?= (new DateTime(date("Y-m-d h:i ", $ad["finishs_at"])))->format('Y-m-d\TH:i')
                                                                                                                        ?? $_POST["adStarts_at"] ?>" class="border-2 border-black rounded-lg px-2" />
                                </div>
                                <span class="text-red-500 font-bold -mt-3">
                                    <?php if (isset($errorsUpdate["adFinishs_at"])) : ?>
                                        <?= $errorsUpdate["adFinishs_at"] ?>
                                    <?php endif; ?>
                                </span>
                                <input type="hidden" name="updateAdId" value="<?= $ad["id"] ?>" />
                                <input type="hidden" name="adName" value="<?= $ad["name"] ?>" />
                                <div class="flex gap-x-3 mt-4">
                                    <button class="closeUpdateAdModalbtn text-white bg-red-500 close p-2 rounded-md text-sm font-bold">
                                        Fechar</button>
                                    <button type="submit" name="_method" value="put" class="text-white bg-black p-2 rounded-md text-sm font-bold">Atualizar
                                        Anúncio</button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <!-- begin first ver modal -->
                <?php endforeach; ?>
            </div>
        </div>
</div>

<!-- ver Adicionar AD modal -->
<input class="hidden" id="newModalhasErrors" value="<?= sizeof($newAdErrors) ?>" />
<div class="ui modal fullscreen newAdModal h-fit">
    <div class="bg-gray-100 py-5">
        <form method="POST" action="/admin/ads/create" enctype="multipart/form-data" class="flex flex-col items-center gap-y-5 ">
            <div class="flex justify-center gap-x-2">
                <span class="text-xl">nome: </span>
                <input type="text" name="adName" class=" w-96 border-2 border-black rounded-lg" value="<?= $tempNewAdContent["adName"] ?>" />
            </div>
            <span class=" text-red-500 font-bold -mt-3">
                <?php if (!$tempNewAdContent["adName"]) : ?>
                    <?= $newAdErrors["adName"] ?>
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
                    <option value="mobile" <?php if ($tempNewAdContent["adPosition"] == "mobile") : ?>selected<?php endif; ?>>
                        Mobile</option>
                    <option value="front" <?php if ($tempNewAdContent["adPosition"] == "front") : ?>selected<?php endif; ?>>
                        Frente</option>
                    <option value="slide" <?php if ($tempNewAdContent["adPosition"] == "slide") : ?>selected<?php endif; ?>>
                        Slide</option>
                </select>
            </div>
            <span class="text-red-500 font-bold -mt-3">
                <?php if (!$tempNewAdContent["adPosition"]) : ?>
                    <?= $newAdErrors["adPosition"] ?>
                <?php endif; ?>
            </span>
            <div class="flex justify-center gap-x-2">
                <span class="text-xl">Link:</span>
                <input type="text" name="adLink" value="<?= $tempNewAdContent["adLink"] ?>" class="border-2 border-black rounded-lg px-2 w-96" />
            </div>
            <span class="text-red-500 font-bold -mt-3">
                <?php if (!$tempNewAdContent["adLink"]) : ?>
                    <?= $newAdErrors["adLink"] ?>
                <?php endif; ?>
            </span>
            <div class="flex justify-center gap-x-2">
                <span class="text-xl">Início: </span>
                <input type="datetime-local" min="<?= $minTime ?>" name="adStarts_at" value="<?= $tempNewAdContent["adStarts_at"] ?>" class="border-2 border-black
                rounded-lg px-2" />
            </div>
            <span class="text-red-500 font-bold -mt-3">
                <?php if (!$tempNewAdContent["adStarts_at"]) : ?>
                    <?= $newAdErrors["adStarts_at"] ?>
                <?php endif; ?>
            </span>
            <div class="flex justify-center gap-x-2">
                <span class="text-xl">Fim:</span>
                <input type="datetime-local" min="<?= $minTime ?>" name="adFinishs_at" value="<?= $tempNewAdContent["adFinishs_at"] ?>" class="border-2 border-black rounded-lg px-2" />
            </div>
            <span class="text-red-500 font-bold -mt-3">
                <?php if (!$tempNewAdContent["adFinishs_at"]) : ?>
                    <?= $newAdErrors["adFinishs_at"] ?>
                <?php endif; ?>
            </span>
            <div class="flex gap-x-3 mt-4">
                <button class="closeNewAdModalbtn text-white bg-red-500 close p-2 rounded-md text-sm font-bold">
                    Fechar</button>
                <button type="submit" class="text-white bg-black p-2 rounded-md text-sm font-bold">Adicionar
                    Anúncio</button>
            </div>
        </form>
    </div>
</div>
</main>
</div>
<script src="/scripts/ads.js" defer></script>
<?php
require "views/partials/admin/footer.php";

?>