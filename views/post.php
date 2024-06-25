<?php
include ("partials/header.php");
?>
<div class="flex max-[767px]:flex-col">
    <div class="w-1/6 max-[767px]:w-full flex justify-center">esquerod</div>
    <main class=" scrollable min-h-[calc(100vh_-_167px)] max-sm:mx-0 mx-3 max-[767px]:mx-0 w-4/6 max-[767px]:w-full">
        <div class="h-auto text-center w-full flex flex-col justify-center">
            <div id="excerpt">
                <h1 class="w-full text-center text-3xl font-bold mb-2 max-sm:px-0">
                    <?= $content["title"] ?>
                </h1>
                <!-- begin share -->
                <div
                    class="flex gap-y-7 justify-end items-center gap-x-7 p-2 rounded-md max-sm:justify-center max-sm:my-5">
                    <div class="fb-share-button" data-href="https://developers.facebook.com/docs/plugins/"
                        data-layout="" data-size="">
                        <a target="_blank"
                            href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fplugins%2F&amp;src=sdkpreparse"
                            class="fb-xfbml-parse-ignore">

                        </a>
                    </div>
                    <a href="https://orbitaltv.net/<?= $content["slug"] ?>" class="twitter-share-button"
                        data-show-count="false">
                        <img src="images/icons/x.png" class="w-14" />
                    </a>

                    <a href="https://api.whatsapp.com/send?text=https://orbitaltv.net/<?= $content["slug"] ?>"
                        target="_blank">
                        <img src="images/whats.svg" class="w-9" />
                    </a>
                </div>
                <!-- end share -->
                <div class="flex justify-center">
                    <img src="<?= $content["source"] == "Orbital Channel" ? 'images/' . $content["image"] : $content["image"] ?>"
                        class="w-[652px] h-[419px] h-auto self-center" />
                </div>

                <!-- begin speechtotext -->
                <div id="speechtotext" class="mt-2">
                    <button type="button" id="pause" class="cursor-pointer bg-black text-white p-3">
                        Pausar
                    </button>
                    <button type="button" id="resume" class="cursor-pointer bg-black text-white p-3">
                        Retomar
                    </button>
                    <button type="button" id="stop" class="cursor-pointer bg-black text-white p-3">
                        Parar
                    </button>
                    <input type="submit" id="play" value="Escutar matéria"
                        class="cursor-pointer bg-black text-white p-3" />
                </div>
                <!-- end speechtotext -->

                <div class="mt-3">
                    <span id="text" class="text-justify mt-3 mb-7 max-sm:px-2 mt-3">
                        <?= substr($content["content"], 0, 250); ?>...
                    </span>
                </div>
                <div class="flex flex-col w-full  max-sm:justify-center mb-3  items-center">
                    <p class="text-start my-4 font-bold max-sm:pl-2">Fonte:
                        <?= $content["source"] ?>
                    </p>
                    <?php if (!$tempContent["thumb"]): ?>

                    <button class="bg-black text-white p-3 w-52 rounded-md" id="button_change">
                        Ler matéria completa
                    </button>
                </div>
            </div>
            <div class="w-full h-full p-3" id="complete">
                <iframe src=<?= $content["link"] ?> height="100vh" title="description"
                    style="overflow:hidden;height:100vh;width:100%"></iframe>
            </div>
            <?php endif; ?>

        </div>
    </main>
    <div class="w-1/6 max-[767px]:w-full flex justify-center flex flex-col gap-y-5 text-center">
        <span class="font-bold text-xl">Mais Posts</span>
        <?php foreach ($morePosts as $morePost): ?>
            <div>
                <a href="/<?= $morePost["slug"] ?>">
                    <img src="images/<?= $morePost["image"] ?>" class="max-[767px]:w-full" />
                </a>
                <p class=" text-xl font-bold my-5"><?= $morePost["title"] ?></p>
            </div>
        <?php endforeach ?>

    </div>
</div>
<?php
require ("partials/footer.php");
?>

<script src="../scripts/postnews.js" defer></script>
<script src="../scripts/textspeech.js" defer></script>


