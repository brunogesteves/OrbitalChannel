<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="CACHE-CONTROL" content="NO-CACHE" />
    <meta http-equiv="PRAGMA" content="NO-CACHE" />



    <!-- <script src="../scripts/jquery.js" defer></script> -->
    <script src="/scripts/tailwind.js"></script>
    <script src="/scripts/scripts.js" defer></script>
    <link rel="shortcut icon" href="/images/logo.ico" type="image/x-icon" />
    <link rel="stylesheet" type="text/css" href="/styles/semantic.min.css">
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"
        integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
    <script src="/scripts/semantic.min.js"></script>


    <title>Orbital Channel</title>
</head>

<body>
    <header class="flex justify-between items-center px-2 py-2">
        <div class="flex flex-col items-center justify-center">
            <div class="ui medium">
                <div class="ui dimmer">
                    <div class="content">
                        <div class="ui button changeLogotype">Mudar Logotipo</div>
                    </div>
                </div>
                <img class="ui image w-96" src="/images/logo.jpg">
            </div>
        </div>
        <div class="ui modal logotype">
            <div id="modalImage">
                <div class="flex justify-around flex-wrap overflow-y-auto h-[calc(100vh_-_107px)]">
                    <?php
                    foreach ($images as $image): ?>
                        <div class="cursor-pointer w-1/6 mr-3 relative">
                            <div class="ui dimmable image">
                                <div class="ui dimmer">
                                    <div class="content">
                                        <form method="POST">
                                            <input type="hidden" name="logotype" value="<?= $image["name"] ?>" />

                                            <button type="submit" class="ui primary button ">Selecionar</button>
                                        </form>
                                    </div>
                                </div>
                                <img src="/images/<?= $image["name"] ?>" alt=<?= $image["name"] ?> class="w-full min-h-10" />
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>

        <div id="timestamp" class="text-4xl"></div>
        <div class="flex flex-col items-center">
            <form method="POST" action="components/admin/login/form.php">
                <input type="submit" name="logout" value="Sair"
                    class=" cursor-pointer text-xl bg-black text-white w-20 text-center mt-3 rounded-md" />
            </form>
        </div>
    </header>