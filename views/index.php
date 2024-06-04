<?php
include ("partials/header.php");
?>
<main class="">
    <div class="ui grid">
        <div class="two column mobile only row ">
            <?php
            include (__DIR__ . "/../Components/mobile.php");
            ?>
        </div>
        <div class="three column tablet only row">
            tablet
        </div>

        <div class="four column computer only row">            
            <?php
            include (__DIR__ . "/../Components/computer.php");
            ?>

        </div>
    </div>
</main>



<?php
require ("partials/footer.php");
?>