<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.settings.name', 'Laravel') }}</title>
        <link rel="shortcut icon" href="{{ asset('images/favicon.png') }}" type="image/png">

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/vendor.css') }}">
        <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
        @livewireStyles

        <!-- Scripts -->
        <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <script src="{{ asset('assets/js/ckeditor/ckeditor.js') }}"></script>
        <script src="{{ asset('js/app.js') }}" defer></script>
    </head>
    <body class="font-sans antialiased">
        <h1 style="display: none">{{ config('app.settings.name', 'Laravel') }}</h1>
        <div class="min-h-screen bg-gray-100">
            @livewire('navigation-dropdown')

            <!-- Page Heading -->
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>

            <!-- Page Content -->
            <main>
                
                {{ $slot }}
            </main>
        </div>

        @stack('modals')

        @livewireScripts

        <script>
            const id = localStorage.getItem('annoucements');
            if(id) {
                const el = document.querySelector('.annoucements');
                if(el.dataset.id > id) {
                    el.classList.remove('hidden')
                }
            } else {
                document.querySelector('.annoucements').classList.remove('hidden')
            }
            document.querySelector('.annoucements .close') && document.querySelector('.annoucements .close').addEventListener('click', () => {
                localStorage.setItem('annoucements', document.querySelector('.annoucements').dataset.id);
                document.querySelector('.annoucements').remove();
            })
        </script>
        <script>
            let engine = "{{ config('app.settings.engine') }}";
            Livewire.on('engineUpdated', newEngine => {
                if(newEngine == 'imap') {
                    document.getElementById('imap-settings').style.display = ''
                } else {
                    document.getElementById('imap-settings').style.display = 'none'
                }
            })
        </script>
    </body>
</html>
