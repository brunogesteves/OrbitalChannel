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
        <div class="w-full">
            <span class="text-2xl font-bold break-words text-left border-l-4 border-red-500 pl-2">
                <?= $post["title"] ?>
            </span>
        </div>

    <?php endforeach; ?>
</div>
<!-- slide -->

<div class="slider">
    <div class="slides">
        <input type="radio" name="radio-btn" id="radio1" />
        <input type="radio" name="radio-btn" id="radio2" />
        <input type="radio" name="radio-btn" id="radio3" />
        <input type="radio" name="radio-btn" id="radio4" />
        <div class="slide first">
            <img src="/images/logo.jpg" alt="img3" />
        </div>
        <div class="slide">
            <img src="/images/82c989a4-5459-4540-b8d1-5181b537e1e5-cover.png" alt="img1" />
        </div>
        <div class="slide">
            <img src="/images/precos(1).png" alt="img2" />
        </div>
        <div class="slide">
            <img src="/images/bb8eae2d-131b-4040-8235-808767a7b707.png" alt="img4" />
        </div>
        <div class="navigation-auto">

            <div class="auto-btn1"></div>
            <div class="auto-btn2"></div>
            <div class="auto-btn3"></div>
            <div class="auto-btn4"></div>
        </div>
    </div>
    <div class="manual-navigation">
        <label for="rado1" class="manual-btn"></label>
        <label for="rado2" class="manual-btn"></label>
        <label for="rado3" class="manual-btn"></label>
        <label for="rado4" class="manual-btn"></label>
    </div>
</div>
<!-- slide -->
<?php foreach ($posts3 as $post): ?>
    <div class=" h-auto px-10 my-5 flex gap-x-5">
        <div class="w-5/12">
            <img src="/images/<?= $post["image"] ?>" alt="" class="w-screen object-cover h-[200px]" />
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
        <div class="w-5/12">
            <img src="/images/<?= $post["image"] ?>" alt="" class="w-screen object-cover h-[200px]" />
        </div>
        <div class="w-7/12">
            <span class="text-2xl font-bold break-words text-left">
                <?= $post["title"] ?>
            </span>
        </div>
    </div>
<?php endforeach; ?>

<script type="text/javascript" src="/scripts/mobile.js"></script>