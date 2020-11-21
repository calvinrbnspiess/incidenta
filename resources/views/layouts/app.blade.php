<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Incidenta</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">

        @livewireStyles

        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen flex flex-col bg-gray-100">
            @livewire('navigation-dropdown')

            {{-- <!-- Page Heading -->
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header> --}}

            <!-- Page Content -->
            <main class="flex-grow">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6 pb-2 lg:py-12 lg:pb-2">
                    @if($message = Session::get('success'))
                    <div>
                        <p>{{ $message }}</p>
                    </div>
                    @endif
                    @if($errors->any())
                        <div class="flex flex-col">
                            @foreach($errors->all() as $error)
                            <div class="w-full my-2 flex align-bottom rounded-lg border border-red-600 p-2" role="dialog" aria-modal="true" aria-labelledby="modal-headline">
                                    <div class="flex items-center justify-start">
                                    <div class="flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10">
                                        <!-- Heroicon name: exclamation -->
                                        <svg class="h-6 w-6 text-red-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                                        </svg>
                                    </div>
                                    <p class="ml-2">{{ $error }}</p>
                                    </div>
                            </div>
                            @endforeach
                        </div>
                    @endif
                    {{ $slot }}
                </div>
            </main>
            <div class="flex justify-center text-center py-4 text-gray-600 font-medium">
                {{ date("Y") }} © Incidenta
            </div>
        </div>
        @stack('modals')

        @livewireScripts
    </body>
</html>
