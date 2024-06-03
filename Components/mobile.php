<?php
include (__DIR__ . "/../views/partials/headerMobile.php");
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
<div id="slider" class="w-full">
    <div class="slides">
        <div class="slideComputer  w-full h-full bg-green-500 ">
            <img src="/images/<?= $post3[2]["image"] ?>" alt="demo image3" class="opacity-70" />
            <div class="absolute bottom-10 w-full px-10 text-center font-bold text-2xl">
                <?= $post["title"] ?>
            </div>
        </div>
    </div>
    <div>
        <button class="prev bg-slate-400 rounded-md p-2 ml-5">
            <img src="/images/icons/arrow-right.png" class="w-7" />
        </button>
        <button class="next bg-slate-400 rounded-md p-2">
            <img src="/images/icons/arrow-right.png" class="w-7 rotate-180" />
        </button>
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


<script type="text/javascript" src="/scripts/mobile.js"></script>