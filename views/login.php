<div class="flex justify-center items-center flex-col h-[calc(100vh_-_100px)]">
    <div class="scrollable m-3 max-sm:m-0 ">
        <?php
        require ("partials/header.php");
        ?>
    </div>
    <main class="scrollable h-auto max-sm:mx-0 mx-3 ">
        <div class="flex flex-col justify-evenly items-center h-auto gap-y-3">

            <form method="post" id="async_form" autocomplete="off" novalidate="novalidate"
                action="components/admin/login/form.php" class="max-lg:hidden">
                <div class="control-wrapper ">
                    <div class="input-wrapper">
                        <input id="email" class="input border-2 border-black rounded-md mb-5 pl-3" autocomplete="off"
                            type="email" name="email" placeholder="email" value="email@email.com" />
                    </div>
                </div>
                <div class="control-wrapper">
                    <div class="input-wrapper">
                        <input id="password" class="input border-2 border-black rounded-md mb-5 pl-3" autocomplete="off"
                            type="password" name="password" placeholder="
                            senha" value="1234" />
                    </div>
                </div>
                <div class="control-wrapper">
                    <button type="submit"
                        class="cursor-pointer text-xl bg-black text-white w-20 text-center my-3 rounded-md">Entrar</button>
                </div>
                <?php


                echo getenv('MAIL_FROM_ADDRESS');


                ?>
                <div class="text-red-500">

                    <?= empty($_COOKIE["message"]) ? "" : $_COOKIE["message"] ?>
                </div>
            </form>
        </div>
    </main>
</div>

<?php
require ("partials/footer.php");
?>

</body>

</html>