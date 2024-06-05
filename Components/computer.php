<div class="flex justify-between  items-start w-full h-auto ">
    <div class="w-1/2 flex flex-wrap gap-y-3 pl-3">
        <?php foreach ($posts1 as $post) : ?>
            <div class=" flex flex-col w-1/2 h-auto justify-center items-center px-3">
                <div class="w-full h-full">
                    <a href=/<?= $post["slug"] ?>>
                        <img src=<?= $post["source"] == "Orbital Channel" ? '/images/' . $post["image"] : (strlen($post["image"]) <= 0 ? '/images/logo.jpg' : $post["image"]) ?> alt="" class="object-cover object-center w-full h-72" />
                    </a>
                </div>
                <div class="w-full h-full">
                    <a href="#">
                        <span class="text-2xl font-bold break-words text-left">
                            <?= substr($post["title"], 0, 62); ?>...
                        </span>
                    </a>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    <!-- <div class="dd">teste slider jquery</div> -->
    <div class="w-1/2 h-[500px] relative bg-black">
        <div class="carousel-container-computer h-full">
            <div class="carousel-computer h-full">
                <?php foreach ($posts2 as $post) : ?>
                    <div class="carousel-slide-computer h-full relative ">
                        <a href="/<?= $post["slug"] ?>">
                            <img src=<?= $post["source"] == "Orbital Channel" ? '/images/' . $post["image"] : (strlen($post["image"]) <= 0 ? '/images/logo.jpg' : $post["image"]) ?> alt="" class="object-cover object-center w-full h-full opacity-70">
                            <div class="absolute text-center w-full font-bold text-white text-2xl px-10 bottom-10">
                                <?= $post["title"] ?>
                            </div>
                        </a>
                    </div>

                <?php endforeach; ?>
            </div>
        </div>
        <div>
            <button id="prev" class="bg-slate-400 rounded-r-md p-2 absolute left-0 top-1/2">
                <img src="/images/icons/arrow-right.png" class="w-7" />
            </button>
            <button id="next" class="bg-slate-400 rounded-l-md p-2 absolute right-3 top-1/2">
                <img src="/images/icons/arrow-right.png" class="w-7 rotate-180" />
            </button>
        </div>
        <div class="slideAd h-[150px] mt-2 ">
            <div class="carousel-container-slideAd h-full">
                <div class="carousel-slideAd h-full">
                    <?php foreach ($adsSlide as $ad) : ?>
                        <div class="carousel-slide-slideAd h-full relative ">
                            <a href="/<?= $ad["link"] ?>">                                
                                <img src="/images/ads/<?= $ad["file"] ?>" alt="" class="object-cover object-center w-full h-full opacity-70">
                            </a>
                        </div>

                    <?php endforeach; ?>
                </div>
            </div>

        </div>
    </div>
</div>
<div class="flex justify-between mt-2">
    <div class="flex flex-col justify-between item-start pl-7 w-5/12 ">
        <?php foreach ($posts3 as $post) : ?>
            <div class="w-full my-5">
                <a href=/<?= $post["slug"] ?>>
                    <span class="text-2xl font-bold break-words text-left border-l-4 border-red-500 pl-2">
                        <?= $post["title"] ?>
                    </span>
                </a>
            </div>
        <?php endforeach; ?>
    </div>
    <div class="w-7/12 flex flex-wrap bg-slate-400 items-start gap-y-3">
        <?php foreach ($posts4 as $post) : ?>

            <div class="h-auto flex flex-col items-center w-1/3 px-3">
                <div class="w-full h-full">
                    <a href=/<?= $post["slug"] ?>>
                        <img src=<?= $post["source"] == "Orbital Channel" ? '/images/' . $post["image"] : (strlen($post["image"]) <= 0 ? '/images/logo.jpg' : $post["image"]) ?> alt="" class="w-full h-44 object-cover object-center " />
                    </a>
                </div>
                <div class="w-full">
                    <a href="#">
                        <span class="text-2xl font-bold break-words text-left">
                            <?= substr($post["title"], 0, 70); ?>...
                        </span>
                    </a>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>