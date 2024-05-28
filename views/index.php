<?php
require ("partials/header.php");
?>
<main class="">
    <div class="ui grid">
        <div class="two column mobile only row bg-green-500">
            <?php
            include (__DIR__ . "/../Components/mobile/top.php");
            ?>
        </div>
        <div class="four column computer only row">
            <div class="dd">teste jquery</div>
            <div id="slider">

                <a href="">
                    <div class="slideComputer relative">
                        <img src="/images/precos(1).png" alt="demo image3" class="opacity-70" />
                        <div class="absolute bottom-10 w-full text-center font-bold text-2xl">
                            sadadasdadsdsdsdsdsdsd
                        </div>
                </a>
            </div>
            <div class="slideComputer">
                <img src="/images/logo.jpg" alt="" />
            </div>
            <div class="slideComputer">
                <img src="/images/screencapture-eadunisantos-grupoa-education-plataforma-course-677543-content-8689002-2024-03-18-09_50_54.png"
                    alt="demo image2" />
            </div>


            <a class="prev">aqui</a>
            <a class="next">&gt;</a>
        </div>

    </div>
    <div class="three column tablet only row">
        tablet
    </div>
    </div>


</main>



<?php
require ("partials/footer.php");
?>