<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description"
        content="Learn about the Depo-Provera lawsuit and your eligibility for compensation. If you’ve suffered bone loss, fractures, or other health issues, get a free case evaluation today. No fees unless you win.">
    <meta name="author" content="Depo-Provera">
    <title>Depo-Provera Lawsuit | Free Case Evaluation for Injured Patients</title>

    <!-- Favicons-->
    <link rel="shortcut icon" href="{{ asset('img/favicon.png')}}" type="image/x-icon">
    <link rel="apple-touch-icon" type="image/x-icon" href="{{ asset('img/apple-touch-icon-57x57-precomposed.png')}}">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="72x72" href="{{ asset('img/apple-touch-icon-72x72-precomposed.png')}}">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="114x114"
        href="{{ asset('img/apple-touch-icon-114x114-precomposed.png')}}">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="144x144"
        href="{{ asset('img/apple-touch-icon-144x144-precomposed.png')}}">

    <!-- GOOGLE WEB FONT -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&amp;display=swap"
        rel="stylesheet">

    <!-- BASE CSS -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/menu.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/vendors.css') }}" rel="stylesheet">

    <!-- YOUR CUSTOM CSS -->
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">

    <!-- MODERNIZR MENU -->
    <script src="{{ asset('js/modernizr.js') }}"></script>
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.10.0/css/bootstrap-datepicker.min.css"
        integrity="sha512-34s5cpvaNG3BknEWSuOncX28vz97bRI59UnVtEEpFX536A7BtZSJHsDyFoCl8S7Dt2TPzcrCEoHBGeM4SUBDBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body>

    <div id="preloader">
        <div data-loader="circle-side"></div>
    </div><!-- /Preload -->

    <div id="loader_form">
        <div data-loader="circle-side-2"></div>
    </div><!-- /loader_form -->

    <header class="header_in">
        <div class="container">
            <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 bg-white  box-shadow">
                <h5 class="my-0 mr-md-auto font-weight-normal"><a href="{{ route('home') }}"><img
                            src="{{ asset('img/lawsuit-logo-01.png') }}" alt="Logo" width="220" height="80"
                            class="d-none d-md-block"><img src="{{ asset('img/lawsuit-logo-01.png') }}" alt="Logo"
                            width="220" height="80" class="d-block d-md-none"></a></h5>
                <nav class="my-2 my-md-0 mr-md-3">
                    <a class="p-2 text-dark btn " href="#get_started" title="Get Started">Get Started</a>
                    <a class="p-2 text-dark btn " href="#background_info" title="Background Info">Background Info</a>
                    <a class="p-2 text-dark btn " href="#who_is_eligible" title="Who Is Eligible">Who Is Eligible</a>
                    <a class="p-2 text-dark btn " href="#free_case_evaluation" title="Free Case Evaluation">Free Case
                        Evaluation</a>
                </nav>
                <a class="btn btn-outline-primary" href="tel:18667401419" title="Toll Free"><i
                        class="icon-call"></i>1-866-740-1419</a>
            </div>
        </div>
        <!-- /container -->
    </header>

    @yield('content')

    <div class="container">
        <footer id="home" class="clearfix">
            <p>© {{date('Y')}} Depo Lawsuit</p>
            <ul>
                <li><a href="{{route('privacy-policy')}}" class="animated_link">Privacy Policy</a></li>
                <li><a href="{{route('terms-condition')}}" class="animated_link">Terms & Conditions</a></li>
                <li><a href="{{route('depo-privacy-rights')}}" class="animated_link">Depo Privacy Rights</a></li>
            </ul>
        </footer>
        <!-- end footer-->
    </div>
    <!-- /container -->

    <div class="cd-overlay-nav">
        <span></span>
    </div>
    <!-- /cd-overlay-nav -->
    <div class="cd-overlay-content">
        <span></span>
    </div>


    <!-- COMMON SCRIPTS -->
    <script src="{{ asset('js/jquery-3.7.1.min.js') }}"></script>
    <script src="{{ asset('js/common_scripts.min.js') }}"></script>
    <script src="{{ asset('js/velocity.min.js') }}"></script>
    <script src="{{ asset('js/common_functions.js') }}"></script>
    <!-- Wizard script with branch -->
    <script src="{{ asset('js/wizard_with_branch.js') }}"></script>
    <script src="{{ asset('js/parallax.min.js') }}"></script>
    <script src="{{ asset('js/custom.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.10.0/js/bootstrap-datepicker.min.js"
        integrity="sha512-LsnSViqQyaXpD4mBBdRYeP6sRwJiJveh2ZIbW41EBrNmKxgr/LFZIiWT6yr+nycvhvauz8c2nYMhrP80YhG7Cw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

@yield('script')

</body>

</html>
