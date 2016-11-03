<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- BEGIN META -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="Olive Enterprise">
        <!-- END META -->

        <!-- BEGIN SHORTCUT ICON -->
        <link rel="shortcut icon" href="img/favicon.ico">
        <!-- END SHORTCUT ICON -->
        <title>{{ config('app.name') }}</title>
        <!-- BEGIN STYLESHEET-->
        <link href="{{ config('url.styles') }}/css/bootstrap.min.css" rel="stylesheet"><!-- BOOTSTRAP CSS -->
        <link href="{{ config('url.styles') }}/css/bootstrap-reset.css" rel="stylesheet"><!-- BOOTSTRAP CSS -->
        <link href="{{ config('url.styles') }}/assets/font-awesome/css/font-awesome.css" rel="stylesheet"><!-- FONT AWESOME ICON CSS -->
        <link href="{{ config('url.styles') }}/css/style.css" rel="stylesheet"><!-- THEME BASIC CSS -->
        <link href="{{ config('url.styles') }}/css/style-responsive.css" rel="stylesheet"><!-- THEME RESPONSIVE CSS -->
        <!--dashboard calendar-->
        <link href="{{ config('url.styles') }}/css/clndr.css" rel="stylesheet"><!-- CALENDER CSS -->
        <!-- END STYLESHEET-->
        <script src="{{ config('url.styles') }}/js/jquery-1.8.3.min.js" ></script><!-- BASIC JQUERY 1.8.3 LIB. JS -->
    </head>
    <body>
        <!-- BEGIN SECTION -->
        <section id="container">
            <!-- BEGIN HEADER -->
            <header class="header white-bg">
                <!-- SIDEBAR TOGGLE BUTTON -->
                <div class="sidebar-toggle-box">
                    <div  data-placement="right" class="fa fa-bars tooltips">
                    </div>
                </div>
                <!-- SIDEBAR TOGGLE BUTTON  END-->
                {{ link_to_route('index_index', config('app.name'), [], ['class' => 'logo']) }}

                <!-- START USER LOGIN DROPDOWN  -->
                <div class="top-nav ">
                    <ul class="nav pull-right top-menu">
                        <li class="dropdown">
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                                <span class="username">{{ Auth::user()->name }}</span>
                                <b class="caret"></b>
                            </a>
                            <ul class="dropdown-menu extended logout">
                                <li class="log-arrow-up">
                                </li>
                                <li>
                                    <a href="#">
                                        <i class=" fa fa-suitcase">
                                        </i>
                                        个人资料
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-cog">
                                        </i>
                                        设置
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ url('/logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        <i class="fa fa-key"></i>
                                        退出登陆
                                    </a>
                                    <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <!-- END USER LOGIN DROPDOWN  -->
            </header>
            <!-- END HEADER -->
            <!-- BEGIN SIDEBAR -->
            <aside>
                @include('layouts._menu')
            </aside>
            <!-- END SIDEBAR -->
            <!-- BEGIN MAIN CONTENT -->


            <section id="main-content">
                <!-- BEGIN WRAPPER  -->
                <section class="wrapper">
                    @yield('content')
                </section>
                <!-- END WRAPPER  -->
            </section>
            <!-- END MAIN CONTENT -->
        </section>
        <!-- END SECTION -->
        <!-- BEGIN JS -->
        <script src="{{ config('url.styles') }}/js/bootstrap.min.js" ></script><!-- BOOTSTRAP JS -->
        <script src="{{ config('url.styles') }}/js/jquery.dcjqaccordion.2.7.js"></script><!-- ACCORDIN JS -->
        <script src="{{ config('url.styles') }}/js/jquery.scrollTo.min.js" ></script><!-- SCROLLTO JS -->
        <script src="{{ config('url.styles') }}/js/jquery.nicescroll.js" ></script><!-- NICESCROLL JS -->
        <script src="{{ config('url.styles') }}/js/respond.min.js" ></script><!-- RESPOND JS -->
        <script src="{{ config('url.styles') }}/js/jquery.sparkline.js"></script><!-- SPARKLINE JS -->
        <script src="{{ config('url.styles') }}/js/sparkline-chart.js"></script><!-- SPARKLINE CHART JS -->
        <script src="{{ config('url.styles') }}/js/common-scripts.js"></script><!-- BASIC COMMON JS -->
        <!--Calendar-->
        <script src="{{ config('url.styles') }}/js/calendar/clndr.js"></script><!-- CALENDER JS -->
        <script src="{{ config('url.styles') }}/js/calendar/evnt.calendar.init.js"></script><!-- CALENDER EVENT JS -->
        <script src="{{ config('url.styles') }}/js/calendar/moment-2.2.1.js"></script><!-- CALENDER MOMENT JS -->
        <script src="{{ config('url.styles') }}/assets/jquery-knob/js/jquery.knob.js" ></script><!-- JQUERY KNOB JS -->
        <script >
//knob
$(".knob").knob();

        </script>
        <!-- END JS -->
    </body>
</html>