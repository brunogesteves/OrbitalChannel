<div class="w-full h-40 bg-red-500">
    <img src="/images/ads/mobile.png" alt="" class="w-fit h-full" />
</div>
<div class="ui thin sidebar inverted vertical menu">
    <a class="item">
        PodCast da Rafa

    </a>
    <a class="item">
        PodCast da Rafa
    </a>
    <a class="item">
        PodCast da Rafa

    </a>
</div>
<nav class=" bg-[#251014] w-full">
    <div class="flex justify-start py-3 pl-10 gap-x-3 items-center">
        <img src="/images/icons/menu.svg" alt="logo" class="rounded-full w-7 h-7" id="menu_open" />
        <a href="/ "></a> <img src="/images/logo.jpg" alt="logo" class="rounded-full w-12 h-12 object-scale-down" /></a>
    </div>
</nav>
<div class="flex flex-col  m-5">
    <?php foreach ($posts1 as $post): ?>
        <div class="w-full my-5">
            <span class="text-2xl font-bold break-words text-left border-l-4 border-red-500 pl-2">
                <?= $post["title"] ?>
            </span>
        </div>

    <?php endforeach; ?>
</div>
<!-- <div id="slider" class="w-full">
    <div class="slides">
        <?php foreach ($posts3 as $post): ?>
            <div class="slideComputer  w-full h-full toBack ">
                <img src="/images/<?= $post["image"] ?>" alt="demo image3" class="opacity-70" />
                <div class="absolute bottom-10 w-full text-center font-bold text-2xl">
                    <?= $post["title"] ?>
                </div>
            </div>

        <?php endforeach; ?>
    </div>
    <div>
        <button class="prev bg-slate-400 rounded-md p-2">
            <img src="/images/icons/arrow-right.png" class="w-7" />
        </button>
        <button class="next bg-slate-400 rounded-md p-2">
            <img src="/images/icons/arrow-right.png" class="w-7 rotate-180" />
        </button>
    </div>
</div>-->
<?php foreach ($posts1 as $post): ?>
    <div class=" h-auto px-10 my-5 flex gap-x-5">
        <div class="w-5/12  h-[200px]">
            <img src=<?= $post["source"] == "Orbital Channel" ? '/images/' . $post["image"] : $post["image"] ?> alt=""
                class="w-screen object-scale-down w-[2000px] h-full" />
        </div>
        <div class="w-7/12">
            <span class="text-2xl font-bold break-words text-left">
                <?= $post["title"] ?>
            </span>
        </div>
    </div>
<?php endforeach; ?>
<?php foreach ($posts4 as $post): ?>
    <div class="h-auto px-10 my-5 flex gap-x-5">
        <div class="w-5/12 h-[200px]">
            <img src=<?= $post["source"] == "Orbital Channel" ? '/images/' . $post["image"] : $post["image"] ?> alt=""
                class="w-screen object-scale-down w-[2000px] h-full" />
        </div>
        <div class="w-7/12">
            <span class="text-2xl font-bold break-words text-left">
                <?= $post["title"] ?>
            </span>
        </div>
    </div>
<?php endforeach; ?>

<script type="text/javascript" src="/scripts/mobile.js"></script>