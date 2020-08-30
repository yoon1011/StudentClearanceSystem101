<!DOCTYPE html>
<!--
Landing page based on Pratt: http://blacktie.co/demo/pratt/
-->
<html lang="en">
<head>
    <meta charset="utf-8">

    <title>College of Hospitality and Tourism Management (CHTM) Department</title>

    <!-- Custom styles for this template -->
    <link href="{{ asset('/css/all-landing.css') }}" rel="stylesheet">


    <style type="text/css">
        .center {
          display: block;
          margin-left: auto;
          margin-right: auto;
          width: 10%;
        }
    </style>
</head>

<body data-spy="scroll" data-offset="0" data-target="#navigation">

<div id="app">
    <!-- Fixed navbar -->
    <div id="navigation" class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#"><b>CHTM</b></a>
            </div>
            <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav navbar-right">
                    @if (Auth::guest())
                        <li><a href="{{ url('/login') }}">{{ trans('adminlte_lang::message.login') }}</a></li>
                        <li><a href="{{ url('/register') }}">{{ trans('adminlte_lang::message.register') }}</a></li>
                    @else
                        <li><a href="/home">{{ Auth::user()->name }}</a></li>
                    @endif
                </ul>
            </div><!--/.nav-collapse -->
        </div>
    </div>


    <section id="home" name="home"></section>
    <div id="headerwrap">
        <div class="container">
            <div class="row centered">
                <div class="col-lg-12">
                    <img class="img-responsive center" src="{{ asset('/img/uc.png') }}" alt="">
                </div>
                <div class="col-lg-12">
                    <h1>College of Hospitality and Tourism Management (CHTM) Department</h1>
                    
                    <h3><a href="{{ url('/register') }}" class="btn btn-lg btn-success">Register</a></h3>
                </div>
            </div>
        </div> <!--/ .container -->
    </div><!--/ #headerwrap -->


</div>

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="{{ asset('/js/app.js') }}"></script>
<script src="{{ asset('/js/smoothscroll.js') }}"></script>
<script>
    $('.carousel').carousel({
        interval: 3500
    })
</script>
</body>
</html>
