<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="CACHE-CONTROL" content="NO-CACHE" />
    <meta http-equiv="PRAGMA" content="NO-CACHE" />


    <script src="../scripts/tailwind.js"></script>
    <script src="../scripts/scripts.js" defer></script>
    <link rel="shortcut icon" href="../images/orbital/logo.ico" type="image/x-icon" />
    <link rel="stylesheet" type="text/css" href="../styles/semantic.min.css">
    <script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
    <script src="../scripts/semantic.min.js"></script>


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
                <img class="ui image w-52 h-52 object-center" src="../images/orbital/logo.png">
            </div>
        </div>
        <div class="ui modal logotype ">
            <div class="flex flex-col justify-start items-center pt-10 min-h-96">
                <span class="text-3xl font-bold text-black">Selecione um novo Logotipo</span>                
                <form method="POST" action="admin/imagens/logotype" enctype="multipart/form-data" class="flex flex-col mt-10">
                    <input type="file" name="image" id="newLogotype" required accept=".png" />
                    <button type="submit" class="text-white bg-black my-7 p-2 rounded-lg text-xl">Mudar Logotipo</button>
                </form>
                <div id="previewNewLogotype"> </div>
                </form>                
            </div>
        </div>
        <div class="text-4xl" id="timestamp"></div>
        <div class="flex flex-col items-center">
            <form method="POST" action="orbital/session/delete">
                <button type="submit" name="_method" value="DELETE" class=" cursor-pointer text-xl bg-black text-white w-20 text-center mt-3 rounded-md">
                    Sair</button>
            </form>
        </div>
    </header>