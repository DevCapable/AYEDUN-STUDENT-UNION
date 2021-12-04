<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Template Mo">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900" rel="stylesheet">

    <title>Education - List of Meetings</title>

    <!-- Bootstrap core CSS -->
{{--    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">--}}
      <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet')}}">
      <link rel="stylesheet" href="{{ asset('assets/widgEditor/css/widgEditor.css') }}" />
      <link rel="stylesheet"  href="{{ asset('assets/css/templatemo-edu-meeting.css')}}"/>
      <link rel="stylesheet" href="{{ asset('assets/css/owl.css')}}"/>
      <link rel="stylesheet" href="{{ asset('assets/css/lightbox.css')}}"/>
  @include('layouts.styles')
    <!-- Additional CSS Files -->
{{--    <link rel="stylesheet" href="assets/css/fontawesome.css">--}}
{{--    <link rel="stylesheet" href="assets/css/templatemo-edu-meeting.css">--}}
{{--    <link rel="stylesheet" href="assets/css/owl.css">--}}
{{--    <link rel="stylesheet" href="assets/css/lightbox.css">--}}
<!--

TemplateMo 569 Edu Meeting

https://templatemo.com/tm-569-edu-meeting

-->
  </head>

<body>



  <!-- Sub Header -->
  <div class="sub-header">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-sm-8">
          <div class="left-content">
            <p>This is an educational <em>HTML CSS</em> template by TemplateMo website.</p>
          </div>
        </div>
        <div class="col-lg-4 col-sm-4">
          <div class="right-icons">
            <ul>
              <li><a href="#"><i class="fa fa-facebook"></i></a></li>
              <li><a href="#"><i class="fa fa-twitter"></i></a></li>
              <li><a href="#"><i class="fa fa-behance"></i></a></li>
              <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- ***** Header Area Start ***** -->
  <header class="header-area header-sticky">
      <div class="container">
          <div class="row">
              <div class="col-12">
                  <nav class="main-nav">
                      <!-- ***** Logo Start ***** -->
                      <a href="vote.blade.php" class="logo">
                          Edu Meeting
                      </a>
                      <!-- ***** Logo End ***** -->
                      <!-- ***** Menu Start ***** -->
                      <ul class="nav">
                          <li><a href="vote.blade.php">Home</a></li>
                          <li><a href="castVote.blade.php" class="active">Meetings</a></li>
                          <li><a href="vote.blade.php">Apply Now</a></li>
                          <li class="has-sub">
                              <a href="javascript:void(0)">Pages</a>
                              <ul class="sub-menu">
                                  <li><a href="castVote.blade.php">Upcoming Meetings</a></li>
                                  <li><a href="meeting-details.html">Meeting Details</a></li>
                              </ul>
                          </li>
                          <li><a href="vote.blade.php">Courses</a></li>
                          <li><a href="vote.blade.php">Contact Us</a></li>
                      </ul>
                      <a class='menu-trigger'>
                          <span>Menu</span>
                      </a>
                      <!-- ***** Menu End ***** -->
                  </nav>
              </div>
          </div>
      </div>
  </header>
  <!-- ***** Header Area End ***** -->

  <section class="heading-page header-text" id="top">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <h6>Here are our upcoming meetings</h6>
          <h2>Upcoming Meetings</h2>
        </div>
      </div>
    </div>
  </section>

  <section  class="meetings-page" id="MissAsu" style="align-content: center; align-self: center; alignment: center">
    <div class="container" >
      <div class="row">

          <div class="card-body" >
              <div class="row el-element-overlay">
{{--                  @foreach ($MissAsu as $item)--}}
                  <div class="col-lg-12 col-md-12 col-sm-12" style="padding-top: 20px">
                      <div class="card bg-white card-hover">
                          <div class="card-header">
                              <div class="row">
                                  <div class="col-12">
                                      <h4 id="infor" class="alert alert-danger" style="display: none"></h4>
                                      <span class="badge badge-success" style="color: #0dcaf0; size: auto">{{ strtoupper($MissAsu->fullname) }}</span>
                                  </div>
                              </div>
                          </div>
                          <div class="card-title"> <img src="{{ asset($MissAsu->image) }}" class="img-thumbnail"  width="100%" height="190%" />
                          </div>
                          <div class="card-footer" style="color: red">
                              <input type="number" style="width:100%; font-size: small" placeholder="Enter your vote" name="vote" id="vote" title="Not that you can not vote twice for a single candidate, and voting expired once you exhausted your units">
                              <br><br>
                              <span style="float: left; color: red" class="badge badge-info pull-left" id="">100 units left
                            </span>
                              <input type="number" name="" id="unit" value="100" style="display: none">

                               &nbsp;&nbsp;
                              <a title="Click to Submit your vote"  onclick="return confirm('Are you sure you want to submit this vote {{ $MissAsu->username }}?')"
                                 href="{{ url('user/delete_my_post/' . $MissAsu->id) }}">
                                  <button id="submit" value="0329/133"
                                          class="btn btn-outline-success btn-sm" name="submit">
                                      <i class="fa fa-arrow-alt-circle-right">Send Vote</i>
                                  </button>
                              </a>
                              <a title="Click to clear your vote"
                                 href="{{ url('user/editPost/' . $MissAsu->id) }}">
                                  <button id="edit-btn" value="0329/133"
                                          class="btn btn-outline-info btn-sm">
                                      <i class="fa fa-edit font-weight-bolder"> Clear box</i>
                                  </button>
                              </a>
                          </div>
                      </div>
                  </div>

{{--                      <div class="card-header">--}}
{{--                     --}}
{{--                      </div>--}}
{{--                  @endforeach--}}
              </div>
          </div>

      </div>
    </div>
    <div class="footer">
      <p>Copyright © 2022 Edu Meeting Co., Ltd. All Rights Reserved.
          <br>Design: <a href="https://templatemo.com/page/1" target="_parent" title="website templates">TemplateMo</a></p>
    </div>
  </section>

  <!-- Scripts -->
  <!-- Bootstrap core JavaScript -->
{{--    <script src="vendor/jquery/jquery.min.js"></script>--}}
{{--    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>--}}

{{--    <script src="assets/js/isotope.min.js"></script>--}}
{{--    <script src="assets/js/owl-carousel.js"></script>--}}
{{--    <script src="assets/js/lightbox.js"></script>--}}
{{--    <script src="assets/js/tabs.js"></script>--}}
{{--    <script src="assets/js/isotope.js"></script>--}}
{{--    <script src="assets/js/video.js"></script>--}}
{{--    <script src="assets/js/slick-slider.js"></script>--}}
{{--    <script src="assets/js/custom.js"></script>--}}
  <script src="{{ asset('assets/js/isotope.min.js')}}"></script>
  <script src="{{ asset('assets/js/owl-carousel.js')}}"></script>
  <script src="{{ asset('assets/js/lightbox.js')}}"></script>
  <script src="{{ asset('assets/js/tabs.js')}}"></script>
  <script src="{{ asset('assets/js/isotope.js')}}"></script>
  <script src="{{ asset('assets/js/video.js')}}"></script>
  <script src="{{ asset('assets/js/slick-slider.js')}}"></script>
  <script src="{{ asset('assets/js/custom.js')}}"></script>
    <script>
        //according to loftblog tut
        $('.nav li:first').addClass('active');

        var showSection = function showSection(section, isAnimate) {
          var
          direction = section.replace(/#/, ''),
          reqSection = $('.section').filter('[data-section="' + direction + '"]'),
          reqSectionPos = reqSection.offset().top - 0;

          if (isAnimate) {
            $('body, html').animate({
              scrollTop: reqSectionPos },
            800);
          } else {
            $('body, html').scrollTop(reqSectionPos);
          }

        };

        var checkSection = function checkSection() {
          $('.section').each(function () {
            var
            $this = $(this),
            topEdge = $this.offset().top - 80,
            bottomEdge = topEdge + $this.height(),
            wScroll = $(window).scrollTop();
            if (topEdge < wScroll && bottomEdge > wScroll) {
              var
              currentId = $this.data('section'),
              reqLink = $('a').filter('[href*=\\#' + currentId + ']');
              reqLink.closest('li').addClass('active').
              siblings().removeClass('active');
            }
          });
        };

        $('.main-menu, .responsive-menu, .scroll-to-section').on('click', 'a', function (e) {
          e.preventDefault();
          showSection($(this).attr('href'), true);
        });

        $(window).scroll(function () {
          checkSection();
        });

        $('#submit').on('click', function(e){
            e.preventDefault()
            let limit = $("#unit").val();
            let infor = $("#infor");
            infor.hide()
            let vote = $("#vote").val();
            if (vote > limit){
                infor.show()
                infor.html(`Sorry your units left is ${limit}`)
                e.preventDefault()
                // alert('sorry you have ' + limit + ' left');
            }else{
                alert(vote)
            }

        })


    </script>
</body>


</html>



