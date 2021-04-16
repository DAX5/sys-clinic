<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <title>Sys Clinic - @yield('title')</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>

        <!-- Font Awesome JS -->
        <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js"
            integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous">
        </script>
        <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js"integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous">
        </script>

        <!-- jQuery 3.1.1 -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

        <!-- Bootstrap 4.5.0 -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"/>

        <!-- DataTables 1.10.21 -->
        <link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">
        <link href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css" rel="stylesheet">

        <style>
            .footer {
                position: fixed;
                left: 0;
                bottom: 0;
                width: 100%;
                background-color: #9C27B0;
                color: white;
                text-align: center;
            }
        </style>
    </head>
    <body class="font-sans antialiased">
        @section('sidebar')
        <div class="min-h-screen bg-gray-100">
            @include('layouts.navigation')

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
    </body>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>

    <script>
    $('.fone').keyup(function() {
        let input = $(this).val();
        
        if (input.length <= 14) {
            input = input.replace(/\D/g, "")
            input = input.replace(/(\d{2})(\d)/, "($1) $2")
            input = input.replace(/(\d{4})(\d)/, "$1-$2")
        } else {
            input = input.replace(/\D/g, "")
            input = input.replace(/(\d{2})(\d)/, "($1) $2")
            input = input.replace(/(\d{5})(\d)/, "$1-$2")
        }

        $(this).val(input);
    });

    $('.cpf').keyup(function() {
        let input = $(this).val();
        
        input = input.replace(/\D/g, "")
        input = input.replace(/(\d{3})(\d)/, "$1.$2")
        input = input.replace(/(\d{3})(\d)/, "$1.$2")
        input = input.replace(/(\d{3})(\d)/, "$1-$2")

        $(this).val(input);
    });

    $('.crm').keyup(function() {
        let input = $(this).val();
        
        input = input.replace(/\D/g, "")

        $(this).val(input);
    });
    </script>
    
</html>
