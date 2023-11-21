<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>Sobotshane SIC </title>
    <link rel="icon" type="image/x-icon" href="{!! asset('template/src/assets/img/logo.jpg  ') !!}"/>
    <!-- ENABLE LOADERS -->
    <link href="{!! asset('template/layouts/modern-light-menu/css/light/loader.css') !!}" rel="stylesheet" type="text/css" />
    <link href="{!! asset('template/layouts/modern-light-menu/css/dark/loader.css') !!}" rel="stylesheet" type="text/css" />
    <script src="{!! asset('template/layouts/modern-light-menu/loader.js') !!}"></script>
    <!-- /ENABLE LOADERS -->
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">
    <link href="{!! asset('template/src/bootstrap/css/bootstrap.min.css') !!}" rel="stylesheet" type="text/css" />
    <link href="{!! asset('template/layouts/modern-light-menu/css/light/plugins.css') !!}" rel="stylesheet" type="text/css" />
    <link href="{!! asset('template/layouts/modern-light-menu/css/dark/plugins.css') !!}" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->
    
    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM STYLES -->
    <link rel="stylesheet" type="text/css" href="{!! asset('template/src/assets/css/light/elements/alert.css') !!}">
    <link rel="stylesheet" type="text/css" href="{!! asset('template/src/assets/css/dark/elements/alert.css') !!}">
       <link href="{!! asset('template/src/plugins/src/apex/apexcharts.css') !!}" rel="stylesheet" type="text/css">
    <link href="{!! asset('template/src/assets/css/light/dashboard/dash_1.css') !!}" rel="stylesheet" type="text/css" />
    <link href="{!! asset('template/src/assets/css/dark/dashboard/dash_1.css') !!}" rel="stylesheet" type="text/css" />
    <!-- END PAGE LEVEL PLUGINS/CUSTOM STYLES -->
    
    <style>
        body.dark .layout-px-spacing, .layout-px-spacing {
            min-height: calc(100vh - 155px) !important;
        }
    </style>
    
</head>
<body class="layout-boxed" page="starter-pack">

    <!-- BEGIN LOADER -->
    <div id="load_screen"> <div class="loader"> <div class="loader-content">
        <div class="spinner-grow align-self-center"></div>
    </div></div></div>
    <!--  END LOADER -->

    <!--  BEGIN NAVBAR  -->
       @include('template.navbar')
    <!--  END NAVBAR  -->

    <!--  BEGIN MAIN CONTAINER  -->
    <div class="main-container " id="container">

        <div class="overlay"></div>
        <div class="search-overlay"></div>

        <!--  BEGIN SIDEBAR  -->
      @include('template.sidebar')
        <!--  END SIDEBAR  -->
        
        <!--  BEGIN CONTENT AREA  -->
      @yield('content')
        <!--  END CONTENT AREA  -->
    </div>
    <!-- END MAIN CONTAINER -->

    <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
    <script src="{!! asset('template/src/plugins/src/global/vendors.min.js') !!}"></script>
    <script src="{!! asset('template/src/bootstrap/js/bootstrap.bundle.min.js') !!}"></script>
    <script src="{!! asset('template/src/plugins/src/perfect-scrollbar/perfect-scrollbar.min.js') !!}"></script>
    <script src="{!! asset('template/layouts/modern-light-menu/app.js') !!}"></script>
    <script src="{!! asset('template/src/plugins/src/waves/waves.min.js') !!}"></script>
    <script src="{!! asset('template/src/plugins/src/mousetrap/mousetrap.min.js') !!}"></script>
    
    <script src="{!! asset('template/src/assets/js/custom.js') !!}"></script>
    <script src="{!! asset('template/src/plugins/src/apex/apexcharts.min.js') !!}"></script>
    <script src="{!! asset('template/src/assets/js/dashboard/dash_1.js') !!}"></script>
    <!-- END GLOBAL MANDATORY SCRIPTS -->

    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->

    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
</body>
</html>