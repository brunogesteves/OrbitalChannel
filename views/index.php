<?php
require ("partials/header.php");
?>
<main class="">
    <div class="ui grid">
        <div class="two column mobile only row ">
            <?php
            include (__DIR__ . "/../Components/mobile.php");
            ?>
        </div>
        <div class="three column tablet only row">
            <div class="dd">teste jquery</div>
            <div class="carousel-container">
                <div class="carousel">
                    <div class="carousel-slide">
                        <img src="/images/logo.jpg" alt="Image 1">
                    </div>
                    <div class="carousel-slide">
                        <img src="/images/logoold.jpg" alt="Image 2">
                    </div>
                    <div class="carousel-slide">
                        <img src="/images/modelothumb.png" alt="Image 3">
                    </div>
                </div>
            </div>
        </div>

        <div class="four column computer only row">
            <!-- <div id="slider">
                <div class="slides">
                    <div class="slideComputer  w-full h-full ">
                        <img src="/images/logo.jpg" alt="demo image3" class="opacity-70" />
                        <div class="absolute bottom-10 w-full text-center font-bold text-2xl">
                            slide1
                        </div>
                    </div>


                    <div class="slideComputer  w-full h-full bg-amber-500 toBack ">
                        <img src="/images/logo.jpg" alt="demo image3" class="opacity-70" />
                        <div class="absolute bottom-10 w-full text-center font-bold text-2xl">
                            slide2
                        </div>
                    </div>


                    <div class="slideComputer  w-full h-full bg-blue-500 toBack ">
                        <img src="/images/logo.jpg" alt="demo image3" class="opacity-70" />
                        <div class="absolute bottom-10 w-full text-center font-bold text-2xl">
                            slide3
                        </div>
                    </div>
                </div>
                <div>
                    <button class="prev bg-slate-400 hover:bg-slate-200 rounded-md p-2">
                        <img src="/images/icons/arrow-right.png" class="w-7" />
                    </button>
                    <button class="next bg-slate-400 hover:bg-slate-200 rounded-md p-2">
                        <img src="/images/icons/arrow-right.png" class="w-7 rotate-180" />
                    </button>
                </div>
            </div> -->
            <?php
            include (__DIR__ . "/../Components/computer.php");
            ?>

        </div>
    </div>
</main>

<script src="/scripts/slider.js"></script>


<?php
require ("partials/footer.php");
?>