<!DOCTYPE html>
<html lang="de">

<head>
    <meta charset="UTF-8" />
    <title>Incidenta</title>
    <link href="./css/app.css" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
</head>

<body class="antialiased bg-gray-200 h-full flex flex-col">
    <header class="lg:px-16 px-6 bg-white flex flex-wrap items-center lg:py-0 py-2">
        <div class="flex-1 flex justify-between items-center">
          <a class="font-bold text-lg text-gray-800" href="#">
            Incidenta
            </a>
      </div>
      <label for="menu-toggle" class="pointer-cursor lg:hidden block"><svg class="fill-current text-gray-900" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"><title>menu</title><path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"></path></svg></label>
      <input class="hidden" type="checkbox" id="menu-toggle" />
      <div class="hidden lg:flex lg:items-center lg:w-auto w-full" id="menu">
        <nav>
          <ul class="lg:flex items-center justify-between text-base text-gray-700 pt-4 lg:pt-0">
            <li><a class="lg:p-4 py-3 px-0 block border-b-2 border-transparent hover:border-indigo-400" href="/incidents">Einsätze</a></li>
            <li><a class="lg:p-4 py-3 px-0 block border-b-2 border-transparent hover:border-indigo-400" href="/vehicles">Fahrzeuge</a></li>
          </ul>
        </nav>
        {{-- <a href="#" class="lg:ml-4 flex items-center justify-start lg:mb-0 mb-4 pointer-cursor">
          <img class="rounded-full w-10 h-10 border-2 border-transparent hover:border-indigo-400" src="https://pbs.twimg.com/profile_images/1128143121475342337/e8tkhRaz_normal.jpg" alt="Andy Leverenz">
        </a> --}}
        <button class="button">Login</button>
      </div>
      </header>
      <div class="lg:px-16 px-6 lg:py-8 py-4 flex-grow overflow-scroll">
        @yield('content')
      </div>
</body>

</html>
