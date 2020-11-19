<!DOCTYPE html>
<html lang="de">

<head>
    <meta charset="UTF-8" />
    <title>Incidenta</title>
    <link href="./css/app.css" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
</head>

<body class="antialiased bg-gray-200 h-screen flex flex-col">
    <header class="lg:px-16 px-6 bg-white flex flex-wrap items-center lg:py-0 py-2">
        <label for="menu-toggle" class="pr-4 pointer-cursor lg:hidden block"><svg class="fill-current text-gray-900"
                xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20">
                <title>menu</title>
                <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"></path>
            </svg></label>
        <div class="flex-1 flex justify-between items-center">
            <a class="font-bold text-lg text-gray-800" href="/">
                Incidenta
            </a>
        </div>
        <div class="hidden lg:flex lg:items-center lg:w-auto w-full" id="menu">
            <nav>
                <ul class="lg:flex items-center justify-between text-base text-gray-700 pt-4 lg:pt-0">
                    <li><a class="lg:p-4 py-3 px-0 block border-b-2 border-transparent hover:border-indigo-400"
                            href="/incidents">Einsätze</a></li>
                    <li><a class="lg:p-4 py-3 px-0 block border-b-2 border-transparent hover:border-indigo-400"
                            href="/vehicles">Fahrzeuge</a></li>
                </ul>
            </nav>
        </div>
        <div>
            {{-- <a href="#" class="lg:ml-4 flex items-center justify-start lg:mb-0 mb-4 pointer-cursor">
            <img class="rounded-full w-10 h-10 border-2 border-transparent hover:border-indigo-400" src="https://pbs.twimg.com/profile_images/1128143121475342337/e8tkhRaz_normal.jpg" alt="Andy Leverenz">
            </a> --}}
            <a href="login" class="button">Login</a>
        </div>
    </header>
    <div class="flex flex-col flex-grow overflow-y-scroll">
        <div class="flex-grow container mx-auto px-4">
            @yield('content')
        </div>
        <div class="flex justify-center text-center py-4 text-gray-600 font-medium">
            {{ date("Y") }} © Incidenta
        </div>
    </div>
</body>

</html>
