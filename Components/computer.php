<div class="flex justify-between  items-start w-full h-auto ">
    <div class="w-1/2 flex flex-wrap  ">
        <?php foreach ($posts1 as $post): ?>
            <div class=" flex flex-col w-1/2 h-auto justify-center items-center ">
                <div class="w-[280px] h-[180px]">
                    <a href=/<?= $post["slug"] ?>>
                        <img src=<?= $post["source"] == "Orbital Channel" ? '/images/' . $post["image"] : $post["image"] ?>
                            alt="" class="w-full h-full" />
                    </a>
                </div>
                <div class="w-[280px] h-[100px]">
                    <a href="#">
                        <span class="text-2xl font-bold break-words text-left">
                            <?= substr($post["title"], 0, 62); ?>...

                        </span>
                    </a>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    <div class="w-1/2 bg-slate-500 relative">
        <div class="bg-blue-400 h-[565px]  overflow-hidden">
            <?php foreach ($posts1 as $post): ?>
                <div class=" w-full h-full">
                    <img src="<?= $post["source"] == "Orbital Channel" ? '/images/' . $post["image"] : $post["image"] ?>"
                        alt="demo image3" class="opacity-70 w-full h-full" />
                    <div class="absolute bottom-10 w-full text-center font-bold text-2xl">
                        <?= $post["title"] ?>
                    </div>
                </div>

            <?php endforeach; ?>
        </div>
        <div>
            <button class="prev bg-slate-400 rounded-md p-2 absolute left-0">
                <img src="/images/icons/arrow-right.png" class="w-7" />
            </button>
            <button class="next bg-slate-400 rounded-md p-2 absolute  right-3">
                <img src="/images/icons/arrow-right.png" class="w-7 rotate-180" />
            </button>
        </div>

    </div>
</div>
<div class="flex justify-between mt-2">
    <div class="flex flex-col justify-between item-start pl-7 w-5/12 ">
        <?php foreach ($posts3 as $post): ?>
            <div class="w-full my-5">
                <a href="#">
                    <span class="text-2xl font-bold break-words text-left border-l-4 border-red-500 pl-2">
                        <?= $post["title"] ?>
                    </span>
                </a>
            </div>
        <?php endforeach; ?>
    </div>
    <div class="w-7/12 flex flex-wrap bg-slate-400 items-start gap-y-3">
        <?php foreach ($posts4 as $post): ?>

            <div class="h-auto flex flex-col items-center w-1/3">
                <div class="w-[200px] h-[150px]">
                    <a href="#">
                        <img src=<?= $post["source"] == "Orbital Channel" ? '/images/' . $post["image"] : $post["image"] ?>
                            alt="" class="w-full h-full" />
                    </a>
                </div>
                <div class="w-3/4">
                    <a href="#">
                        <span class="text-2xl font-bold break-words text-left">
                            <?= substr($post["title"], 0, 62); ?>...
                        </span>
                    </a>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

</div>


</div>