<?php
?>
<div class="flex flex-col  m-5">

    <?php foreach ($posts1 as $post): ?>
        <div class="w-full my-1">
            <a href=/<?= $post["slug"] ?> class="flex">
                <span class="border-l-4 border-red-500 h-7"></span>
                <p class="text-2xl font-bold text-justify  pl-2">
                    <?= $post["title"] ?>
                </p>
            </a>
        </div>
    <?php endforeach; ?>
</div>
<div class="w-full h-[300px] relative bg-black max-[425px]:h-[195px] mb-5">
    <div class="carousel-container-mobile h-full w-full">
        <div class="carousel-mobile h-full">
            <?php foreach ($posts2 as $post): ?>
                <div class="carousel-slide-mobile h-full relative ">
                    <a href="/<?= $post["slug"] ?>">
                        <img src=<?= $post["source"] == "Orbital Channel" ? '/images/' . $post["image"] : (strlen($post["image"]) <= 0 ? '/images/logo.jpg' : $post["image"]) ?>                                alt="" class=" w-full h-full opacity-70">
                        <div class="absolute text-center w-full font-bold text-white text-2xl px-10 bottom-10">
                            <?= $post["title"] ?>
                        </div>
                    </a>
                </div>

            <?php endforeach; ?>
        </div>
    </div>
</div>
 <?php foreach ($posts3 as $post): ?>
    <div class=" h-auto px-5 my-1 flex gap-x-2 w-full h-[100px]">
        <div class="w-5/12  h-[100px]">
            <a href=/<?= $post["slug"] ?>>
                <img src=<?= $post["source"] == "Orbital Channel" ? '/images/' . $post["image"] : (strlen($post["image"]) <= 0 ? '/images/logo.jpg' : $post["image"]) ?> alt="" class="object-fill w-full h-full" />

            </a>
        </div>
        <div class="w-7/12">
            <a href=/<?= $post["slug"] ?>>
                <p class="text-2xl font-bold text-justify">
                    <?= $post["title"] ?>
                </p>
            </a>
        </div>
    </div>
<?php endforeach; ?>
<br />
<br />
<?php foreach ($posts4 as $post): ?>
    <div class="h-auto px-5 my-1 flex gap-x-2 w-full h-[100px]">
        <div class="w-5/12 ">
            <a href=/<?= $post["slug"] ?>>
                <img src=<?= $post["source"] == "Orbital Channel" ? '/images/' . $post["image"] : (strlen($post["image"]) <= 0 ? '/images/logo.jpg' : $post["image"]) ?> alt="" class="object-fill w-full h-full" />
            </a>
        </div>
        <div class="w-7/12 ">
            <a href=/<?= $post["slug"] ?>>
                <p class="text-2xl font-bold text-justify">
                    <?= $post["title"] ?>
                </p>
            </a>
        </div>
    </div>
<?php endforeach; ?> 


<script type="text/javascript" src="scripts/mobile.js"></script>