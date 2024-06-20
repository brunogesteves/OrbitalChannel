<?php
?>
<div class="flex flex-col  m-5">
    <?php foreach ($posts1 as $post): ?>
        <div class="w-full my-5">
            <a href=/<?= $post["slug"] ?>>
                <span class="text-2xl font-bold break-words text-left border-l-4 border-red-500 pl-2">
                    <?= $post["title"] ?>
                </span>
            </a>
        </div>
    <?php endforeach; ?>
</div>
<div class="w-full h-[300px] relative bg-black">
    <div class="carousel-container-mobile h-full w-full">
        <div class="carousel-mobile h-full">
            <?php foreach ($posts2 as $post): ?>
                <div class="carousel-slide-mobile h-full relative ">
                    <a href="/<?= $post["slug"] ?>">
                        <img src=<?= $post["source"] == "Orbital Channel" ? '/images/' . $post["image"] : (strlen($post["image"]) <= 0 ? '/images/logo.jpg' : $post["image"]) ?> alt=""
                            class=" w-full opacity-70">
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
    <div class=" h-auto px-10 my-5 flex gap-x-5">
        <div class="w-4/12  h-[100px]">
            <a href=/<?= $post["slug"] ?>>
                <img src=<?= $post["source"] == "Orbital Channel" ? '/images/' . $post["image"] : (strlen($post["image"]) <= 0 ? '/images/logo.jpg' : $post["image"]) ?> alt="" class="w-screen object-fit w-[2000px] h-full" />

            </a>
        </div>
        <div class="w-full">
            <a href=/<?= $post["slug"] ?>>
                <span class="text-2xl font-bold break-words text-left">
                    <?= $post["title"] ?>
                </span>
            </a>
        </div>
    </div>
<?php endforeach; ?>
<?php foreach ($posts4 as $post): ?>
    <div class="h-auto px-7 my-2 flex gap-x-5 w-full ">
        <div class="w-4/12 h-[100px]">
            <a href=/<?= $post["slug"] ?>>
                <img src=<?= $post["source"] == "Orbital Channel" ? '/images/' . $post["image"] : (strlen($post["image"]) <= 0 ? '/images/logo.jpg' : $post["image"]) ?> alt="" class="w-screen object-fit w-[2000px] h-full" />
            </a>
        </div>
        <div class="w-full ">
            <a href=/<?= $post["slug"] ?>>
                <span class="text-2xl font-bold break-words text-left">
                    <?= $post["title"] ?>
                </span>
            </a>
        </div>
    </div>
<?php endforeach; ?> 


<script type="text/javascript" src="scripts/mobile.js"></script>