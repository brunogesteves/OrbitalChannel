<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="CACHE-CONTROL" content="NO-CACHE" />
    <meta http-equiv="PRAGMA" content="NO-CACHE" />


    <script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
    <script src="scripts/tailwind.js"></script>
    <script src="scripts/slider.js"></script>
    <script src="scripts/home.js"></script>
    <script src="scripts/semantic.min.js"></script>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/pt_BR/sdk.js#xfbml=1&version=v20.0" nonce="MxGYeLoT"></script>

    <link rel="stylesheet" type="text/css" href="styles/semantic.min.css">
    <link rel="stylesheet" href="styles/slider.css" />
    <script type="text/javascript">
        function googleTranslateElementInit() {
            new google.translate.TranslateElement({
                pageLanguage: 'pt'
            }, 'google_translate_element');
        }
    </script>
    <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
    <link rel="shortcut icon" href="images/orbital/logo.ico" type="image/x-icon" />
    <title>Orbital Channel</title>
</head>

<body class="m-auto p-0">
    <div class="ui centered grid">
        <div class=" mobile only row ">
            <div class="ui thin sidebar inverted vertical menu">
                <a class="item">
                    PodCast da Rafa mobile
                </a>
                <a class="item">
                    PodCast da Rafa
                </a>
                <a class="item">
                    PodCast da Rafa
                </a>
            </div>
            <nav class="bg-[#251014] w-full">
                <div class="h-[100px] w-full">
                    <div class="carousel-container-adMobile h-full">
                        <div class="carousel-adMobile h-full">
                            <?php foreach ($adsMobile as $ad) : ?>
                                <div class="carousel-slide-adMobile h-full">
                                    <a href="/<?= $ad["link"] ?>">
                                        <img src="/images/ads/<?= $ad["file"] ?>" alt="" class="object-cover object-center w-full h-full">
                                    </a>
                                </div>

                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
                <div class="flex justify-start py-3 pl-5  gap-x-3 w-full">
                    <img src="/images/icons/menu.svg" alt="logo" class="rounded-full mt-1 w-7 h-7" id="menu_mobile_open" />
                    <a href="/"> <img src="/images/orbital/logo.png" alt="logo" class="rounded-full -mt-2 w-11 h-11 object-center" /></a>
                    <a href="/"> <span class="text-white text-3xl  font-black font-sans">ORBITAL CHANNEL</span></a>
                </div>
            </nav>
            <div class="w-full h-20 flex flex-col justify-center items-center shadow-lg font-bold stock">Cotação Dólar - Real:
                <span class="<?= $stock["pctChange"] > 0 ? "text-green-500" : "text-red-500" ?>"> R$<?= $stock["ask"] ?></span>
            </div>
        </div>
        <div class="three column tablet only row">
            <div class="ui thin sidebar inverted vertical menu">
                <a class="item">
                    PodCast da Rafa tablet
                </a>
                <a class="item">
                    PodCast da Rafa
                </a>
                <a class="item">
                    PodCast da Rafa
                </a>
            </div>
            <nav class="bg-[#251014] w-full">
                <div class="h-[100px] w-full">
                    <div class="carousel-container-adTablet h-full">
                        <div class="carousel-adTablet h-full">
                            <?php foreach ($adsMobile as $ad) : ?>
                                <div class="carousel-slide-adTablet h-full">
                                <a href="/<?= $ad["link"] ?>">
                                    <img src="/images/ads/<?= $ad["file"] ?>" alt="" class="object-cover object-center w-full h-full">
                                </a>
                            </div>

                        <?php endforeach; ?>
                    </div>
                    </div>
                </div>
                <div class="flex justify-start py-3 pl-5  gap-x-3 w-full">
                    <img src="/images/icons/menu.svg" alt="logo" class="rounded-full mt-1 w-7 h-7" id="menu_tablet_open" />
                    <a href="/"></a> <img src="/images/orbital/logo.png" alt="logo" class="rounded-full -mt-2 w-11 h-11 object-scale-down" /></a>
                    <span class="text-white text-3xl  font-black font-sans">ORBITAL CHANNEL</span>
                </div>
            </nav>
            <div class="w-full h-20 flex flex-col justify-center items-center shadow-lg font-bold">Cotação Dólar - Real:
                <span class="<?= $stock["pctChange"] > 0 ? "text-green-500" : "text-red-500" ?>"> R$<?= $stock["ask"] ?></span>
            </div>
        </div>
        <div class="computer only row w-full">
            <header class="w-full flex justify-center items-center h-52 py-3 gap-3 mr-6 max-[768px]:hidden ">
                <div class="w-1/4 flex justify-center h-full">
                    <a href="/"><img src="/images/orbital/logo.png" alt="logo" class="h-full" /></a>
                </div>

                <div class="carousel-container-adfront h-full">
                    <div class="carousel-adfront h-full">
                        <?php foreach ($adsFront as $ad) : ?>
                            <div class="carousel-slide-adfront h-full">
                                <a href="/<?= $ad["link"] ?>">
                                    <img src="/images/ads/<?= $ad["file"] ?>" alt="" class="object-contain object-center w-full h-full">
                                </a>
                            </div>

                        <?php endforeach; ?>
                    </div>
                </div>
            </header>
            <hr class="border-b-2  mb-2 mx-6 border-black w-full">
            </hr>
        </div>
    </div>