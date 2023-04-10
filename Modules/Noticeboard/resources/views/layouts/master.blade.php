<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Module Noticeboard</title>

       {{-- Laravel Vite - CSS File --}}
       {{-- {{ module_vite('build-noticeboard', 'Resources/assets/sass/app.scss') }} --}}
    </head>

    <body>
        {{ $slot }}

        {{-- Laravel Vite - JS File --}}
        {{-- {{ module_vite('build-noticeboard', 'Resources/assets/js/app.js') }} --}}
    </body>
</html>
