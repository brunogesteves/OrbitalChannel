<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="CACHE-CONTROL" content="NO-CACHE" />
    <meta http-equiv="PRAGMA" content="NO-CACHE" />
    <script src="scripts/tailwind.js"></script>
    <link rel="shortcut icon" href="/images/orbital/logo.ico" type="image/x-icon" />
    <title>Orbital Channel - Login</title>
</head>

<body class="min-h-screen">    
    <main class=" flex flex-col justify-center items-center gap-y-5 h-[calc(100vh_-_85px)] max-sm:mx-0 ">
        <div class="w-1/4 flex justify-center ">
            <a href="/"><img src="/images/orbital/logo.png" alt="logo" class="h-[150px] w-[150px]" /></a>
        </div>
        <form method="post" action="session/store" class="max-lg:hidden flex flex-col justify-center items-center">
            <input id="email" class="input border-2 border-black rounded-md mb-5 pl-3" autocomplete="off" type="email"
                name="email" placeholder="Digite o Email" value="email@email.com" />
            <input id="password" class="input border-2 border-black rounded-md mb-5 pl-3" autocomplete="off"
                type="password" name="password" placeholder="Digite a senha" value="1234" />
            <button type="submit"
                class="cursor-pointer text-xl bg-black text-white w-20 text-center my-3 rounded-md">Entrar</button>
            <div class="text-red-500 font-bold"><?= $warning ?></div>
        </form>
    </main>
    <footer class="bg-black text-white flex flex-col justify-center items-center  py-3 z-50">
        <img src="/images/orbital/logo.png" alt="logo" class="rounded-full w-10" />

        <span> Orbital Channel - Direitos Reservados</span>
    </footer>
</body>