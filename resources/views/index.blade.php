<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>AYEDUN STUDENT UNION</title>
    <!--    -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400">
    <!-- Google web font "Open Sans" -->
    <link rel="stylesheet" href="font-awesome-4.5.0/css/font-awesome.min.css">

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">

    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap-theme.min.css') }}">
    <link rel="stylesheet" href="{{ asset('bootstrap/css/fontAwesome.css') }}">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="//use.fontawesome.com/releases/v5.0.7/css/all.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('slick/slick.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('slick/slick-theme.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/tooplate-style.css') }}">
    <script src="{{ asset('slider/js/jquery.js') }}"></script>

    <!-- tooplate style -->

    <script>
        var renderPage = true;

        if (navigator.userAgent.indexOf('MSIE') !== -1 ||
            navigator.appVersion.indexOf('Trident/') > 0) {
            /* Microsoft Internet Explorer detected in. */
            alert("Please view this in a modern browser such as Chrome or Microsoft Edge.");
            renderPage = false;
        }

    </script>
    <style>
        h4 {
            font-family: Bodoni Bd BT;

        }

        #imagge {
            border-radius: 20px;
            border-style: double;
            border-color: #1affff;

        }

        hr {
            size: 40px;
            border-color: #1a4ccf;
            border-style: solid;
        }

        h3 {
            text-align: center;
            background-color: #66ff66;
            padding: 10px;
        }

        #dropdown {
            background-color: #1f2e2e;
            color: #fff;
            border-radius: 0px;
            margin: 5px;
            padding-left: 10%;
            border-bottom: 1px dotted #fff;
        }

        #dropdown:hover {
            color: rgb(136, 250, 6);
            background-color: #111111;
        }

        a {
            text-decoration: none;
        }

        .card:hover {
            box-shadow: 0px 2px 15px 2px gray;
        }

        section.map {
            margin-bottom: 150px;
        }

        section.map #map {
            height: 450px;
        }
    </style>
</head>

<body>
    <!-- Loader -->
    <div id="loader-wrapper">
        <div id="loader"></div>
        <div class="loader-section section-left"></div>
        <div class="loader-section section-right"></div>
    </div>
    <div class="container">
        <section class="tm-section-head" id="top">
            <header id="header" class="text-center tm-text-gray">
                <p><a id="homename" class="navbar-brand" href="index.php"><img style="border-color:#009933"
                            src="img/ASU_LOGO.png" height="80" width="90" class="img-responsive" alt="ASU LOGO"
                            class="img-rounded"></a></p>
                <p style="font-size: 30px; color: #009933; font-family: Exotc350 Bd BT">AYEDUN STUDENTS' UNION
                <p style="font-size: 15px;"> <strong>MOTTO:</strong> <i style=" color: red">Education, Unity and
                        Progress!</i></p>
                </p>
            </header>
            <nav class="navbar narbar-light">
                <a class="navbar-brand tm-text-gray" href="#">
                    Menu
                </a>
                <button type="button" id="nav-toggle" class="navbar-toggler collapsed" data-toggle="collapse"
                    data-target="#mainNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon">
                        <i class="fa fa-navicon tm-fa-toggler-icon"></i>
                    </span>
                </button>
                <div id="mainNav" class="collapse navbar-collapse tm-bg-white">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a id="dropdown" class="nav-link tm-text-gray" href="#top">HOME
                                <span class="sr-only">(current)</span>
                            </a>
                        </li>
                        <li id="dropdown" class="nav-item">
                            <a style="text-decoration: none; color:#fff " href="#tm-section-2">EXECUTIVES</a>
                        </li>
                        <li id="dropdown" class="nav-item">
                            <a style="text-decoration: none; color:#fff" href="{{ '/historyOfAyedun' }}">AYEDUN</a>
                        </li>
                        <li id="dropdown" class="nav-item">
                            <a style="text-decoration: none; color:#fff" href="#tm-section-6">CONTACT</a>
                        </li>

                        <li id="dropdown" class="nav-item">
                            <a style="text-decoration: none; color:#fff" href="{{ '/Login' }}">  LOGIN.</a>
                        </li>
                        <li id="dropdown" class="nav-item">
                            <a style="text-decoration: none; color:#fff" href="{{ '/administrator' }}">ADMIN.</a>
                        </li>
                        <li id="dropdown" class="nav-item">
                            <button id="toReg" style="  background-color: #1f2e2e; color:#fff">REGISTER</button>

                        </li>
                    </ul>
                </div>
            </nav>

            <div class="navbar navbar-default navbar-fixed-top">
                <a href="/index.html" class="navbar-brand"></a>
                <botton class="navbar-toggle collapsed" data-toggle="collapse" data-target="#mydropdown">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </botton>
            </div>
            <div class="collapse navbar-collapse" id="mydropdown">

                <ul class="nav navbar-nav">
                    <li>
                        <a href="index.php">Home</a>
                    </li>
                    <li>
                        <a href="#">info</a>
                    </li>

                    <li>
                        <a href="#">contact</a>
                    </li>
                </ul>
            </div>
        </section>
        <section class="row" id="tm-section-1">
            <div class="col-lg-12 tm-slider-col">
                <div class="tm-img-slider">
                    <div class="tm-img-slider-item" href="img/Beloved2.jpg">
                        <p class="tm-slider-caption"> Beloved Hotel Ayedun.</p>
                        <img src="img/Beloved2.jpg" alt="Image" class="tm-slider-img">
                    </div>
                    <div class="tm-img-slider-item" href="img/gallery-img-01.jpg">
                        <p class="tm-slider-caption"> 1 .“Education is the most powerful weapon which you can use to
                            change the world” – Nelson Mandela.</p>
                        <img src="img/gallery-img-01.jpg" alt="Image" class="tm-slider-img">
                    </div>
                    <div class="tm-img-slider-item" href="img/AyedunCover.jpg">
                        <p class="tm-slider-caption"> 2. “The cure for boredom is curiosity. There is no cure for
                            curiosity” – Dorothy Parker.</p>
                        <img src="img/AyedunCover.jpg" alt="Image" class="tm-slider-img">
                    </div>
                    <div class="tm-img-slider-item" href="img/AYEDUN.jpg">
                        <p class="tm-slider-caption"> 3. “The beautiful thing about learning is that no one can take it
                            away from you” – B. B. King.</p>
                        <img src="img/AYEDUN.jpg" alt="Image" class="tm-slider-img">
                    </div>
                    <div class="tm-img-slider-item" href="img/gallery-img-04.jpg">
                        <p class="tm-slider-caption"> 4. “When you educate one person you can change a life, when you
                            educate many you can change the world”- Shai Reshef.</p>
                        <img src="img/beloved.jpeg" alt="Image" class="tm-slider-img">
                    </div>
                    <div class="tm-img-slider-item" href="img/2021ASU_EXCOS1.jpg">
                        <p class="tm-slider-caption"> 1. Side view showing newly Executives of the Union..</p>
                        <img src="img/2021ASU_EXCOS1.jpg" alt="Image" class="tm-slider-img">
                    </div>
                    <div class="tm-img-slider-item" href="img/2021ASU_EXCOS2.jpg">
                        <p class="tm-slider-caption"> 2. Side view showing newly Executives of the Union.</p>
                        <img src="img/2021ASU_EXCOS2.jpg" alt="Image" class="tm-slider-img">
                    </div>

                </div>
            </div>
        </section>
        <button class="btn btn-outline-success" id="toReg">
            <i class="fa fa-registered"></i> Register Now!
        </button>
       <a style="text-decoration: none" href="{{ url('/historyOfAyedun') }}" class="btn btn-outline-success"> What You Need To Know About Ayedun</a>
        <div class="row">
            <section class="tm-section-2 tm-section-mb" id="tm-section-2">
                <div class="col-lg-12 col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <p
                                style="color:rgb(247, 247, 247); font-size: larger; text-align: center; font-family: Copperplate Gothic Bold; background-color: #ff9900;">
                                <strong> NATIONAL EXECUTIVES</strong>
                            </p>

                        </div>
                        <div class="card-body" style="text-align: center">
                            <div class="row el-element-overlay">
                                @foreach ($NationalExecutives as $NationalExecutive)
                                <div class="col-lg-3 col-md-3 col-sm-6" style="padding-top: 20px">
                                    <div class="card bg-white card-hover">
                                        <div class="card-header">
                                            <span class="badge badge-success pull-right">{{ $NationalExecutive->gender
                                                }}</span><br>
                                            <span style="float: left" class="badge badge-info pull-right">
                                                From ({{ $NationalExecutive->year_of_tenure_from }}) To
                                                ({{ $NationalExecutive->year_of_tenure_to }}) </span>
                                        </div>
                                        <div class="card-img-top">
                                            <img src="{{ asset($NationalExecutive->picture) }}" class="img_thumbnails"
                                                style="height: 300px; width: 100%;" class="img-thumbnail img-responsive"
                                                alt="Ayedun Students' Union" />
                                        </div>
                                        <div class="card-body">
                                            <div class="card-title text-center">
                                                {{ strtoupper($NationalExecutive->full_name) }}
                                            </div>
                                        </div>
                                        <div class="card-footer">
                                            <span class="badge badge-info pull-left">{{ $NationalExecutive->post
                                                }}</span>
                                            <span class="badge badge-success pull-right">{{ $NationalExecutive->compound
                                                }}
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                <div class="col-lg-12 col-md-12">
                    <div class="card">
                        <div class="card-header">

                            <p
                            style="color: rgb(247, 247, 247); font-size: larger; text-align: center; font-family: Copperplate Gothic Bold; background-color: #ff9900;">
                            <strong> NOTIFICATION BOARD</strong>
                        </p>
                        </div>
                        <div class="card-body">
                            <div class="row el-element-overlay">
                                @foreach ($AdminPosts as $item)
                                <div class="col-lg-4 col-md-4 col-sm-6" style="padding-top: 20px">
                                    <div class="card bg-white card-hover">
                                        <div class="card-header">


                                            <span style="float: right" class="badge badge-info pull-right">
                                                {{ Carbon\Carbon::parse($item->created_at)->diffForHumans() }}
                                            </span>
                                        </div>

                                        <div class="card-title">
                                            <p
                                                style="height: 50%; width: 100%; text-align: justify; color: black; font-family: Arial, Helvetica, sans-serif;">

                                                @if ($item->video == '' && $item->image == '')
                                                    {!! $item->posting !!}
                                                @elseif ($item->posting =='' && $item->video=='')
                                                    <img src="{{ asset($item->image) }}" class="img-thumbnail"
                                                        width="100%" height="190%" />
                                                    <p
                                                        style="height: 50%; width: 100%; text-align: justify; color: black; font-family: Arial, Helvetica, sans-serif;">
                                                        {!! $item->ImageCaption !!}
                                                    </p>
                                                @elseif ($item->posting =='' && $item->image =='')
                                                    <video width="100%" height="100%" controls>
                                                        <source src="{{ asset($item->video) }}" type="video/mp4">
                                                    </video>
                                                    <p
                                                        style="height: 50%; width: 100%; text-align: justify; color: black; font-family: Arial, Helvetica, sans-serif;">
                                                        {!! $item->VideoCaption !!}
                                                    </p>
                                                @endif
                                            </p>
                                        </div>
                                        <div class="card-footer">



                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="card card-body bg-transparent">
                                {{ $AdminPosts->links() }}
                            </div>
                        </div>
                    </div>

                </div>
                <div class="row">
                    <div class="col-xl-8 col-lg-8 col-md-12"
                        style="text-align: justify; background-color: rgb(206, 228, 219);padding: 20px;">
                        <h3 style=" box-shadow: 0px 2px 15px 2px gray;">AYEDUN STUDENTS' UNION</h3>
                        <p style="text-align: justify; margin: 5PX;"> Ayedun Students’ Union was greatly well founded by
                            Great People Mr. Feyi Olaniyan Chairman protem officials 1980-1981 follow by
                            Mr Timothy Oyeniyi from 1981-1982 and 1984-1986 followed by Mr Aransiola Mathew
                            from 1983-1984 followed by Mr Adekeye Ralph Fola from 1988 -1990 followed by
                            Mr Omotosho Tony Idowu from 1990-1992 followed by Mr Kayode Ola Peter from 1993-1995
                            followed by Mr Omotosho Jacob Tunde from 1996-1998 followed by Mr Abegunde Clement from
                            1999-2000 followed by Mr Afolayan S Rotimi from 2001 -2002 followed by Mr Afolayan S Adedayo
                            from 2003-2004 followed by Mr Obaoye Gbenga David from 2005-2006 followed by Mr Afolayan
                            Akinloye Tonies from 2007-2008 followed by Mr Awoseyin Stephen Olalekan from 2009-2010
                            followed
                            by Mr Ogunyemi Ralpheal Olawale from 2011 -2012 followed by Mr. Adeyemi Stephen Kola. From
                            2013-
                            2014 followed by Mr. Jimoh Segun Anthony from 2015- 2016 followed Comr. Emannuel Dare from
                            2017-2020 followed by Comr. Babalola Kehinde from 2020 till date, ASU clocked 40Years
                            December
                            30th 2020 and still counting...
                        <p>GREAT ASU!!!</p>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-12" style="background-color: #000000; color: #ffffff">

                        <h3 style="margin-top: 10px;">OUR CORE VALUES</h3>
                        <i>
                            <p><i class="fa fa-check-circle"></i>Education, Unity and Progress</p>
                            <p><i class="fa fa-bullhorn"></i> GREAT ASU!!!</p>
                        </i>
                        <br>
                        <h3>VISION</h3>
                        <i>
                            <p><i class="fa fa-hand-point-right"></i> For oneness and unity of the Ayedun
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Indigenous</p>
                            <p><i class="fa fa-hand-point-right"></i>Enhancement of Educational System in both
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Home and diaspora
                        </i></p>
                    </div>
                </div>

            </section>
            <div class="row">
                <div class="col-xl-4 col-lg-4 col-md-12" style="  box-shadow: 0px 2px 15px 2px gray;">

                    <div class="card bg-white card-hover">
                        <div class="card-header">
                            <span style="float: left" class="badge badge-info pull-right">SINCE?
                            </span>
                            <span class="badge badge-success pull-right"></span>
                        </div>
                        <div class="card-img-top">
                            <img src="{{ asset('img/Obajisun.jpeg') }}" class="img_thumbnails"
                                style="height: 300px; width: 100%;" class="img-thumbnail img-responsive"
                                alt="Ayedun Students' Union" />
                        </div>
                        <div class="card-body">
                            <div class="card-title text-center">
                                <h5><strong> His Royal Majesty Oba Rotimi Orimadegun 1 Arojojoye 2 Obajisun Of Ayedun
                                        City</strong></h5>
                            </div>
                        </div>
                        <div class="card-footer">
                            <span class="badge badge-info pull-left">
                                <h4>Royalness</h4>
                            </span>
                            <span class="badge badge-success pull-right">ILE-ALA </span>
                        </div>
                    </div>

                </div>

                <div class="col-xl-4 col-lg-4 col-md-12" style="  box-shadow: 0px 2px 15px 2px gray;">

                    <div class="card bg-white card-hover">
                        <div class="card-header">
                            <span style="float: left" class="badge badge-info pull-right">SINCE?
                            </span>
                            <span class="badge badge-success pull-right"></span>
                        </div>
                        <div class="card-img-top">
                            <img src="{{ asset('img/Mrs_EBUN_M_TIAMIYU.jpeg') }}" class="img_thumbnails"
                                 style="height: 300px; width: 100%;" class="img-thumbnail img-responsive"
                                 alt="Ayedun Students' Union" />
                        </div>
                        <div class="card-body">
                            <div class="card-title text-center">
                                <h6><strong>Mrs EBUN M. TIAMIYU</strong></h6>
{{--                                <card-title>The Obamila Of ILE-ALA Compound </card-title>--}}
                            </div>
                        </div>
                        <div class="card-footer">
                            <span class="badge badge-info pull-left">
                                <h4>Matron</h4>
                            </span>
                            <span class="badge badge-success pull-right">IMONBA</span>
                        </div>
                    </div>

                </div>
                <div class="col-xl-4 col-lg-4 col-md-12" style="  box-shadow: 0px 2px 15px 2px gray;">

                    <div class="card bg-white card-hover">
                        <div class="card-header">
                            <span style="float: left" class="badge badge-info pull-right">SINCE?
                            </span>
                            <span class="badge badge-success pull-right"></span>
                        </div>
                        <div class="card-img-top">
                            <img src="{{ asset('img/patron.jpeg') }}" class="img_thumbnails"
                                style="height: 300px; width: 100%;" class="img-thumbnail img-responsive"
                                alt="Ayedun Students' Union" />
                        </div>
                        <div class="card-body">
                            <div class="card-title text-center">
                                <h6><strong>High-Chief, Engr. Micheal Babalola</strong></h6>
                                <card-title>The Obamila Of ILE-ALA Compound </card-title>
                            </div>
                        </div>
                        <div class="card-footer">
                            <span class="badge badge-info pull-left">
                                <h4>Patron</h4>
                            </span>
                            <span class="badge badge-success pull-right">ILE-ALA </span>
                        </div>
                    </div>

                </div>
            </div>
            </section>


        </div>
        </section>
        <section class="tm-section-6" id="tm-section-6">
            <div class="row">
                <div class="col-lg-7 col-md-7 col-xs-12">
                    @if (Session::has('success'))
                    <div class="alert alert-info alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button><strong><i>{{
                                session('success') }}</i></strong>
                    </div>
                    @endif

                    @if (Session::has('error'))
                    <div class="alert alert-danger alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button><strong>{{ session('error')
                            }}</strong>
                    </div>
                    @endif
                    <div class="contact_message">
                        <form method="POST" novalidate>
                            @csrf
                            <div class="row mb-2">
                                <div class="form-group col-xl-6">
                                    <input type="text" id="contact_name" name="ClientName" class="form-control"
                                        placeholder="Name" required />
                                </div>
                                <div class="form-group col-xl-6 pl-xl-1">
                                    <input type="email" id="contact_email" name="ClientEmail" class="form-control"
                                        placeholder="Email" required />
                                </div>
                            </div>
                            <div class="form-group">
                                <textarea id="contact_message" name="ClientMessage" class="form-control" rows="6"
                                    placeholder="Message" required></textarea>
                            </div>
                            <button type="submit" class="btn  tm-btn-submit float-right btn-big"><i
                                    class="fa fa-envelope"></i> Send It Now</button>
                        </form>
                    </div>
                    <button class="btn btn-outline-success" id="toReg">
                        <i class="fa fa-registered"></i> Register Now!
                    </button>
                </div>

                <div class="col-lg-5 col-md-5 col-xs-12 tm-contact-right" style="background-color:rgb(41, 231, 183);">
                    <div class="tm-address-box" style="color: #000; font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;">
                        <h2 class="mb-4" >Contact Us</h2>
                        <p class="mb-5" style="color: #000;">AYEDUN OKE-ERO KWARA STATE.</p>
                        <address>
                            <strong>  Emails: </strong>
                            <br><i style="font-size: 20px;" class="fa fa-envelope"> <strong> Web Mail:</strong> &nbsp;&nbsp;contactus@ayedunstudentsunion.com
                              </i>
                            <br> <i style="font-size: 20px;" class="fa fa-envelope"> <strong>Gmail:</strong> &nbsp;&nbsp;AyedunStudentUnion@gmail.com
                               </i><br>

                            <strong> Phones: </strong>
                            <br><i style="font-size: 20px;" class="fa fa-phone"> +234 814 368 6809 &nbsp;&nbsp;
                                National
                                PRO</i>,
                            <br> <i style="font-size: 20px;" class="fa fa-phone"> +234 813 452 2741 &nbsp;&nbsp;
                                National President</i>,
                        </address>
                    </div>
                </div>
            </div>
        </section>
    </div>
    </div>
    </section>
    <section class="map">
        <div class="container" style="padding-top: 90px;">
            <div class="row">
                <div class="col-md-12">
                    <div id="map">
                        <!-- How to change your own map point
            1. Go to Google Maps
            2. Click on your location point
            3. Click "Share" and choose "Embed map" tab
            4. Copy only URL and paste it within the src="" field below
        -->

                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15801.732133670313!2d5.097898166249932!3d8.05723415315975!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x10481efe69a9c42f%3A0x7ea5e69fd56283bf!2sAyedun%2C%20Ekan%20Meje!5e0!3m2!1sen!2sng!4v1611004874746!5m2!1sen!2sng"
                            width="100%" height="100%" frameborder="0" style="border:0;" allowfullscreen=""
                            aria-hidden="false" tabindex="0"></iframe>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <footer class="mt-5" style="background-color: #66ff66; color: black; font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif ">
        <p class="text-center">Copyright © {!! date('year') !!} Ayedun Students' Union All Rights Reserved - Design:
            CapeTech & Communications LMTD.
        </p>
    </footer>
    </div>

    <!-- load JS files -->
    <script type="/text/javascript" src="{{ asset('jquery-1.11.3.min.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <!-- https://popper.js.org/ -->
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <!-- https://getbootstrap.com/ -->
    <script type="text/javascript" src="{{ asset('slick/slick.min.js') }}"></script>
    <!-- Slick Carousel -->

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <script>
        function setCarousel() {
            var slider = $('.tm-img-slider');

            if (slider.hasClass('slick-initialized')) {
                slider.slick('destroy');
            }

            if ($(window).width() > 991) {
                // Slick carousel
                slider.slick({
                    autoplay: true,
                    fade: true,
                    speed: 800,
                    infinite: true,
                    slidesToShow: 1,
                    slidesToScroll: 1
                });
            } else {
                slider.slick({
                    autoplay: true,
                    fade: true,
                    speed: 800,
                    infinite: true,
                    slidesToShow: 1,
                    slidesToScroll: 1
                });
            }
        }

        $(document).ready(function () {
            if (renderPage) {
                $('body').addClass('loaded');
            }

            setCarousel();

            $(window).resize(function () {
                setCarousel();
            });

            // Close menu after link click
            $('.nav-link').click(function () {
                $('#mainNav').removeClass('show');
            });

            // https://css-tricks.com/snippets/jquery/smooth-scrolling/
            // Select all links with hashes
            $('a[href*="#"]')
                // Remove links that don't actually link to anything
                .not('[href="#"]')
                .not('[href="#0"]')
                .click(function (event) {
                    // On-page links
                    if (
                        location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') &&
                        location.hostname == this.hostname
                    ) {
                        // Figure out element to scroll to
                        var target = $(this.hash);
                        target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
                        // Does a scroll target exist?
                        if (target.length) {
                            // Only prevent default if animation is actually gonna happen
                            event.preventDefault();
                            $('html, body').animate({
                                scrollTop: target.offset().top + 1
                            }, 1000, function () {
                                // Callback after animation
                                // Must change focus!
                                var $target = $(target);
                                $target.focus();
                                if ($target.is(":focus")) { // Checking if the target was focused
                                    return false;
                                } else {
                                    $target.attr('tabindex',
                                        '-1'); // Adding tabindex for elements not focusable
                                    $target.focus(); // Set focus again
                                };
                            });
                        }
                    }
                });
        });

        function showSwal() {
            Swal.fire({
                title: '<img style="border-radius: 100px; " src="img/ASU_LOGO.png" height="100" width="120" class="img-responsive" alt="ASU logo" class="img-rounded"> ',

                html:
                    '<strong  ">Welcome!</strong><br>' +
                    '<a class="btn-outline-success" style="text-decoration: none; color:#;" href="/register">STUDENTS REG.</a>|  ' +
                    '<a class="btn-outline-success" style="text-decoration: none; color:#;" href="/registerationGuest">GUEST REG.</a>|  ' +

                    '<a class="btn-outline-success" style="text-decoration: none; color:#;" href="/registerationStakeHolder">STAKEHOLDER REG.</a><br>  ' +
                    '<strong>Great A.S.U!</strong>',
                showCloseButton: true,
                showCancelButton: false,
                focusConfirm: false,
                confirmButtonText:
                    '<i class="fa fa-thumbs-up"></i> Latter!',
                confirmButtonAriaLabel: 'Thumbs up, great!',

            })
        }

        $('body').on('click', '#toReg', function () {
            showSwal();
        });
    </script>
<script>
    const Toast = Swal.mixin({
      toast: true,
      position: '',
      showConfirmButton: false,
      timer: 4000,
      timerProgressBar: true,
      didOpen: (toast) => {
        toast.addEventListener('mouseenter', Swal.stopTimer)
        toast.addEventListener('mouseleave', Swal.resumeTimer)
      }
    })
    Toast.fire({
      icon: 'success',
      title: 'WELCOME!, AYEDUN STUDENT UNION! EDUCATION UNITY AND PROGRESS'
    })
  </script>
</body>

</html>
