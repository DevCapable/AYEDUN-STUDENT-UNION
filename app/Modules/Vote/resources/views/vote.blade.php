{{--<!DOCTYPE html>--}}
{{--<html lang="en">--}}

{{--  <head>--}}

{{--    <meta charset="utf-8">--}}
{{--    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">--}}
{{--    <meta name="description" content="">--}}
{{--    <meta name="author" content="TemplateMo">--}}
{{--    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900" rel="stylesheet">--}}

{{--    <title>MISS ASU</title>--}}

{{--    <!-- Bootstrap core CSS -->--}}
{{--    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">--}}


{{--    <!-- Additional CSS Files -->--}}
{{--    <link rel="stylesheet" href="assets/css/fontawesome.css">--}}
{{--    <link rel="stylesheet" href="assets/css/templatemo-edu-meeting.css">--}}
{{--    <link rel="stylesheet" href="assets/css/owl.css">--}}
{{--    <link rel="stylesheet" href="assets/css/lightbox.css">--}}
{{--<!----}}

{{--TemplateMo 569 Edu Meeting--}}

{{--https://templatemo.com/tm-569-edu-meeting--}}

{{---->--}}
{{--  </head>--}}

{{--<body>--}}

{{--  <!-- Sub Header -->--}}
{{--  <div class="sub-header">--}}
{{--    <div class="container">--}}
{{--      <div class="row">--}}
{{--        <div class="col-lg-8 col-sm-8">--}}
{{--          <div class="left-content">--}}
{{--            <p>This is an electronic voting platform <em>ASU licenced</em> Powered by CapeTech & inforComs.</p>--}}
{{--          </div>--}}
{{--        </div>--}}
{{--        <div class="col-lg-4 col-sm-4">--}}
{{--          <div class="right-icons">--}}
{{--            <ul>--}}
{{--              <li><a href="#"><i class="fa fa-facebook"></i></a></li>--}}
{{--              <li><a href="#"><i class="fa fa-twitter"></i></a></li>--}}
{{--              <li><a href="#"><i class="fa fa-behance"></i></a></li>--}}
{{--              <li><a href="#"><i class="fa fa-linkedin"></i></a></li>--}}
{{--            </ul>--}}
{{--          </div>--}}
{{--        </div>--}}
{{--      </div>--}}
{{--    </div>--}}
{{--  </div>--}}

{{--  <!-- ***** Header Area Start ***** -->--}}
{{--  <header class="header-area header-sticky">--}}
{{--      <div class="container">--}}
{{--          <div class="row">--}}
{{--              <div class="col-12">--}}
{{--                  <nav class="main-nav">--}}
{{--                      <!-- ***** Logo Start ***** -->--}}
{{--                      <a href="vote.blade.php" class="logo">--}}
{{--                          ASU E-Voting--}}
{{--                      </a>--}}
{{--                      <!-- ***** Logo End ***** -->--}}
{{--                      <!-- ***** Menu Start ***** -->--}}
{{--                      <ul class="nav">--}}
{{--                          <li class="scroll-to-section"><a href="#top" class="active">Home</a></li>--}}
{{--                          <li><a href="castVote.blade.php">Meetings</a></li>--}}
{{--                          <li class="scroll-to-section"><a href="#apply">Apply Now</a></li>--}}
{{--                          <li class="has-sub">--}}
{{--                              <a href="javascript:void(0)">Pages</a>--}}
{{--                              <ul class="sub-menu">--}}
{{--                                  <li><a href="castVote.blade.php">Upcoming Meetings</a></li>--}}
{{--                                  <li><a href="meeting-details.html">Meeting Details</a></li>--}}
{{--                              </ul>--}}
{{--                          </li>--}}
{{--                          <li class="scroll-to-section"><a href="#courses">Courses</a></li>--}}
{{--                          <li class="scroll-to-section"><a href="#contact">Contact Us</a></li>--}}
{{--                      </ul>--}}
{{--                      <a class='menu-trigger'>--}}
{{--                          <span>Menu</span>--}}
{{--                      </a>--}}
{{--                      <!-- ***** Menu End ***** -->--}}
{{--                  </nav>--}}
{{--              </div>--}}
{{--          </div>--}}
{{--      </div>--}}
{{--  </header>--}}
{{--  <!-- ***** Header Area End ***** -->--}}

{{--  <!-- ***** Main Banner Area Start ***** -->--}}
{{--  <section class="section main-banner" id="top" data-section="section1">--}}
{{--      <video autoplay muted loop id="bg-video">--}}
{{--          <source src="assets/images/course-video.mp4" type="video/mp4" />--}}
{{--      </video>--}}

{{--      <div class="video-overlay header-text">--}}
{{--          <div class="container">--}}
{{--            <div class="row">--}}
{{--              <div class="col-lg-12">--}}
{{--                <div class="caption">--}}
{{--              <h6>Great Ayedun Students!</h6>--}}
{{--              <h2>Welcome to ASU Voting Platform</h2>--}}
{{--              <p>Ayedun Students’ Union was greatly well founded by Great--}}
{{--                  People and we have countless of Miss ASU that has partook since the begining till date now that we clocked 40Years plus every December 30th and we are still counting...--}}

{{--              <div class="main-button-red">--}}
{{--                  <div class="scroll-to-section"><a href="#contact">Cast your Vote Now!</a></div>--}}
{{--              </div>--}}
{{--          </div>--}}
{{--              </div>--}}
{{--            </div>--}}
{{--          </div>--}}
{{--      </div>--}}
{{--  </section>--}}
{{--  <!-- ***** Main Banner Area End ***** -->--}}

{{--  <section class="services">--}}
{{--    <div class="container">--}}
{{--      <div class="row">--}}
{{--        <div class="col-lg-12">--}}
{{--          <div class="owl-service-item owl-carousel" style="animation-play-state: paused;">--}}

{{--              @foreach ($miss_assu_candidate as $candidate)--}}

{{--              <div class="item" style="height: 40%">--}}
{{--                  <div class="icon">--}}
{{--<!--                      <img src="assets/images/service-icon-02.png" alt="">-->--}}
{{--                      <img src="{{ asset($candidate->picture) }}" class="img_thumbnails"--}}
{{--                           style="height: 300px; width: 100%;" class="img-thumbnail img-responsive"--}}
{{--                           alt="Ayedun Students' Union" />--}}
{{--                  </div>--}}
{{--                  <div class="down-content">--}}
{{--<!--                      <h4>Best Teachers</h4>-->--}}
{{--                      <span class="badge badge-success pull-right">{{ $candidate->gender--}}
{{--                                                }}</span><br>--}}
{{--                      <span style="float: left" class="badge badge-info pull-right">--}}
{{--                                                From ({{ $NationalExecutive->year_of_tenure_from }}) To--}}
{{--                                                ({{ $NationalExecutive->year_of_tenure_to }}) </span>--}}
{{--                      <p>Suspendisse tempor mauris a sem elementum bibendum. Praesent facilisis massa non vestibulum.</p>--}}
{{--                      <div class="card-body">--}}
{{--                          <div class="card-title text-center">--}}
{{--                              {{ strtoupper($candidate->fullname) }}--}}

{{--                                  <div class="row">--}}

{{--                                          <div class="col-8">--}}
{{--                                              <input type="number" style="width:100%; height: 100%; float: left; font-size: small" placeholder="Enter your vote" name="vote" id="vote" title="Not that you can not vote twice for a single candidate, and voting expired once you exhausted your units">--}}

{{--                                          </div>--}}
{{--                                          <div class="col-2">--}}
{{--                                              <a title="Click to Submit your vote"  onclick="return confirm('Are you sure you want to submit tis vote {{ $candidate->username }}?')"--}}
{{--                                                 href="{{ url('meeting/' . $candidate->id) }}">--}}
{{--                                                                                 href="{{ url('changeMissAsuAppDp') }}">--}}

{{--                                              <button id="submit" value="0329/133"--}}
{{--                                                      class="btn btn-outline-success btn-sm" name="submit">--}}
{{--                                                  <i class="fa fa-thumbs-o-up font-weight-bolder"> Vote</i>--}}
{{--                                              </button>--}}
{{--                                              </a>--}}
{{--                                          </div>--}}
{{--                                      </div>--}}




{{--                          </div>--}}
{{--                      </div>--}}
{{--                  </div>--}}
{{--              </div>--}}

{{--              @endforeach--}}




{{--            <div class="item">--}}
{{--              <div class="icon">--}}
{{--                <img src="assets/images/service-icon-03.png" alt="">--}}
{{--              </div>--}}
{{--              <div class="down-content">--}}
{{--                <h4>Best Students</h4>--}}
{{--                <p>Suspendisse tempor mauris a sem elementum bibendum. Praesent facilisis massa non vestibulum.</p>--}}
{{--              </div>--}}
{{--            </div>--}}

{{--            <div class="item">--}}
{{--              <div class="icon">--}}
{{--                <img src="assets/images/service-icon-02.png" alt="">--}}
{{--              </div>--}}
{{--              <div class="down-content">--}}
{{--                <h4>Online Meeting</h4>--}}
{{--                <p>Suspendisse tempor mauris a sem elementum bibendum. Praesent facilisis massa non vestibulum.</p>--}}
{{--              </div>--}}
{{--            </div>--}}

{{--            <div class="item">--}}
{{--              <div class="icon">--}}
{{--                <img src="assets/images/service-icon-03.png" alt="">--}}
{{--              </div>--}}
{{--              <div class="down-content">--}}
{{--                <h4>Best Networking</h4>--}}
{{--                <p>Suspendisse tempor mauris a sem elementum bibendum. Praesent facilisis massa non vestibulum.</p>--}}
{{--              </div>--}}
{{--            </div>--}}

{{--          </div>--}}
{{--        </div>--}}
{{--      </div>--}}
{{--    </div>--}}
{{--  </section>--}}

{{--  <br><br>--}}
{{--  <section>--}}
{{--      <div class="row" >--}}
{{--          @foreach ($miss_assu_candidate as $candidate)--}}
{{--          <div class="col-xl-4 col-lg-4 col-md-12" style="  box-shadow: 0px 2px 15px 2px gray;"id="item">--}}
{{--              <form action="{{url('payment')}}" method="POST">--}}
{{--                  @csrf--}}
{{--              <div class="card bg-white card-hover">--}}
{{--                  <div class="card-header">--}}
{{--                            <span style="float: left; color: red" class="badge badge-info pull-right">SINCE?--}}
{{--                            </span>--}}
{{--                      <span class="badge badge-success pull-right"></span>--}}
{{--                  </div>--}}
{{--                  <div class="card-img-top">--}}
{{--                      <img src="{{ asset($candidate->picture) }}" class="img_thumbnails"--}}
{{--                           style="height: 300px; width: 100%;" class="img-thumbnail img-responsive"--}}
{{--                           alt="Ayedun Students' Union" />--}}
{{--                  </div>--}}
{{--                  <div class="card-body">--}}
{{--                      <div class="card-title text-center">--}}
{{--                          <h5><strong>{{ strtoupper($candidate->fullname) }}</strong></h5>--}}
{{--                      </div>--}}
{{--                  </div>--}}
{{--                  <div class="card-footer">--}}
{{--                            <span class="badge badge-info pull-left">--}}
{{--                                <h4 style="color: greenyellow">Royalness</h4>--}}
{{--                            </span>--}}
{{--                      <span class="badge badge-success pull-right" style="color: red">ILE-ALA </span>--}}
{{--                      <input type="number" style="width:100%; height: 100%; float: left; font-size: small" placeholder="Enter your vote" name="vote" id="vote" title="Not that you can not vote twice for a single candidate, and voting expired once you exhausted your units">--}}
{{--                      <input  type="number" style="width:100%; height: 100%; float: left; font-size: small" placeholder="Enter your vote" name="vote" id="fullname">--}}
{{--                      <input style="display: none" type="number" style="width:100%; height: 100%; float: left; font-size: small" placeholder="Enter your vote" name="fullname" id="fullname">--}}
{{--                      <input style="display: none" value="{{ $candidate->id_number }}" type="text" style="width:100%; height: 100%; float: left; font-size: small" placeholder="Enter your vote" name="id_number" id="id_number" ">--}}
{{--                      <br><br>--}}
{{--                      <a title="Click to Submit your vote"  onclick="return confirm('Are you sure you want to submit this vote to  {{ $candidate->fullname }} ?')"--}}
{{--                         href="{{ url('payment/' . $candidate->id_number) }}">--}}
{{--                          href="{{ url('changeMissAsuAppDp') }}">--}}

{{--                          <button id="submit" value="0329/133"--}}
{{--                                  class="btn btn-outline-success btn-sm" name="submit">--}}
{{--                              <i class="fa fa-thumbs-o-up font-weight-bolder"> Vote</i>--}}
{{--                          </button>--}}
{{--                      </a>--}}
{{--                  </div>--}}
{{--              </div>--}}
{{--              </form>--}}
{{--          </div>--}}
{{--          @endforeach--}}
{{--      </div>--}}
{{--  </section>--}}
{{--          <div class="col-xl-4 col-lg-4 col-md-12" style="  box-shadow: 0px 2px 15px 2px gray;">--}}

{{--              <div class="card bg-white card-hover">--}}
{{--                  <div class="card-header">--}}
{{--                            <span style="float: left" class="badge badge-info pull-right">SINCE?--}}
{{--                            </span>--}}
{{--                      <span class="badge badge-success pull-right"></span>--}}
{{--                  </div>--}}
{{--                  <div class="card-img-top">--}}
{{--                      <img src="{{ asset('img/Mrs_EBUN_M_TIAMIYU.jpeg') }}" class="img_thumbnails"--}}
{{--                           style="height: 300px; width: 100%;" class="img-thumbnail img-responsive"--}}
{{--                           alt="Ayedun Students' Union" />--}}
{{--                  </div>--}}
{{--                  <div class="card-body">--}}
{{--                      <div class="card-title text-center">--}}
{{--                          <h6><strong>Mrs EBUN M. TIAMIYU</strong></h6>--}}
{{--                          --}}{{----}}{{--                                <card-title>The Obamila Of ILE-ALA Compound </card-title>--}}
{{--                      </div>--}}
{{--                  </div>--}}
{{--                  <div class="card-footer">--}}
{{--                            <span class="badge badge-info pull-left">--}}
{{--                                <h4>Matron</h4>--}}
{{--                            </span>--}}
{{--                      <span class="badge badge-success pull-right">IMONBA</span>--}}
{{--                  </div>--}}
{{--              </div>--}}

{{--          </div>--}}
{{--          <div class="col-xl-4 col-lg-4 col-md-12" style="  box-shadow: 0px 2px 15px 2px gray;">--}}

{{--              <div class="card bg-white card-hover">--}}
{{--                  <div class="card-header">--}}
{{--                            <span style="float: left" class="badge badge-info pull-right">SINCE?--}}
{{--                            </span>--}}
{{--                      <span class="badge badge-success pull-right"></span>--}}
{{--                  </div>--}}
{{--                  <div class="card-img-top">--}}
{{--                      <img src="{{ asset('img/patron.jpeg') }}" class="img_thumbnails"--}}
{{--                           style="height: 300px; width: 100%;" class="img-thumbnail img-responsive"--}}
{{--                           alt="Ayedun Students' Union" />--}}
{{--                  </div>--}}
{{--                  <div class="card-body">--}}
{{--                      <div class="card-title text-center">--}}
{{--                          <h6><strong>High-Chief, Engr. Micheal Babalola</strong></h6>--}}
{{--                          <card-title>The Obamila Of ILE-ALA Compound </card-title>--}}
{{--                      </div>--}}
{{--                  </div>--}}
{{--                  <div class="card-footer">--}}
{{--                            <span class="badge badge-info pull-left">--}}
{{--                                <h4>Patron</h4>--}}
{{--                            </span>--}}
{{--                      <span class="badge badge-success pull-right">ILE-ALA </span>--}}
{{--                  </div>--}}
{{--              </div>--}}

{{--          </div>--}}
{{--      </div>--}}
{{--  </section>--}}




{{--  <br><br><br><br>  <br><br><br><br>--}}
{{--  <section class="upcoming-meetings" id="meetings">--}}
{{--    <div class="container">--}}
{{--      <div class="row">--}}
{{--        <div class="col-lg-12">--}}
{{--          <div class="section-heading">--}}
{{--            <h2>A Contestants</h2>--}}
{{--          </div>--}}
{{--        </div>--}}
{{--        <div class="col-lg-4">--}}
{{--          <div class="categories">--}}
{{--            <h4  style="border-color: red; color: white; border-style: dotted;border-radius: 6px;background: red; align-content: center; padding-left: 5px;padding-top: 5px">Important Information</h4>--}}
{{--            <p style="color: red; font-size: larger">Note that theres a certain amount required of you to proceed and enable you casting your vote</p>--}}
{{--            <div class="main-button-red">--}}
{{--              <a href="/meeting">VOTE HERE</a>--}}
{{--            </div>--}}
{{--          </div>--}}
{{--        </div>--}}
{{--        <div class="col-lg-8">--}}
{{--          <div class="row">--}}
{{--            <div class="col-lg-6">--}}
{{--              <div class="meeting-item">--}}
{{--                <div class="thumb">--}}
{{--                  <div class="price">--}}
{{--                    <span>$22.00</span>--}}
{{--                  </div>--}}
{{--                  <a href="meeting-details.html"><img src="assets/images/meeting-01.jpg" alt="New Lecturer Meeting"></a>--}}
{{--                </div>--}}
{{--                <div class="down-content">--}}
{{--                  <div class="date">--}}
{{--                    <h6>Nov <span>10</span></h6>--}}
{{--                  </div>--}}
{{--                  <a href="meeting-details.html"><h4>New Lecturers Meeting</h4></a>--}}
{{--                  <p>Morbi in libero blandit lectus<br>cursus ullamcorper.</p>--}}
{{--                </div>--}}
{{--              </div>--}}
{{--            </div>--}}
{{--            <div class="col-lg-6">--}}
{{--              <div class="meeting-item">--}}
{{--                <div class="thumb">--}}
{{--                  <div class="price">--}}
{{--                    <span>$36.00</span>--}}
{{--                  </div>--}}
{{--                  <a href="meeting-details.html"><img src="assets/images/meeting-02.jpg" alt="Online Teaching"></a>--}}
{{--                </div>--}}
{{--                <div class="down-content">--}}
{{--                  <div class="date">--}}
{{--                    <h6>Nov <span>24</span></h6>--}}
{{--                  </div>--}}
{{--                  <a href="meeting-details.html"><h4>Online Teaching Techniques</h4></a>--}}
{{--                  <p>Morbi in libero blandit lectus<br>cursus ullamcorper.</p>--}}
{{--                </div>--}}
{{--              </div>--}}
{{--            </div>--}}
{{--            <div class="col-lg-6">--}}
{{--              <div class="meeting-item">--}}
{{--                <div class="thumb">--}}
{{--                  <div class="price">--}}
{{--                    <span>$14.00</span>--}}
{{--                  </div>--}}
{{--                  <a href="meeting-details.html"><img src="assets/images/meeting-03.jpg" alt="Higher Education"></a>--}}
{{--                </div>--}}
{{--                <div class="down-content">--}}
{{--                  <div class="date">--}}
{{--                    <h6>Nov <span>26</span></h6>--}}
{{--                  </div>--}}
{{--                  <a href="meeting-details.html"><h4>Higher Education Conference</h4></a>--}}
{{--                  <p>Morbi in libero blandit lectus<br>cursus ullamcorper.</p>--}}
{{--                </div>--}}
{{--              </div>--}}
{{--            </div>--}}
{{--            <div class="col-lg-6">--}}
{{--              <div class="meeting-item">--}}
{{--                <div class="thumb">--}}
{{--                  <div class="price">--}}
{{--                    <span>$48.00</span>--}}
{{--                  </div>--}}
{{--                  <a href="meeting-details.html"><img src="assets/images/meeting-04.jpg" alt="Student Training"></a>--}}
{{--                </div>--}}
{{--                <div class="down-content">--}}
{{--                  <div class="date">--}}
{{--                    <h6>Nov <span>30</span></h6>--}}
{{--                  </div>--}}
{{--                  <a href="meeting-details.html"><h4>Student Training Meetup</h4></a>--}}
{{--                  <p>Morbi in libero blandit lectus<br>cursus ullamcorper.</p>--}}
{{--                </div>--}}
{{--              </div>--}}
{{--            </div>--}}
{{--          </div>--}}
{{--        </div>--}}
{{--      </div>--}}
{{--    </div>--}}
{{--  </section>--}}

{{--  <section class="apply-now" id="apply">--}}
{{--    <div class="container">--}}
{{--      <div class="row">--}}
{{--        <div class="col-lg-6 align-self-center">--}}
{{--          <div class="row">--}}
{{--            <div class="col-lg-12">--}}
{{--              <div class="item">--}}
{{--                <h3>APPLY FOR BACHELOR DEGREE</h3>--}}
{{--                <p>You are allowed to use this edu meeting CSS template for your school or university or business. You can feel free to modify or edit this layout.</p>--}}
{{--                <div class="main-button-red">--}}
{{--                  <div class="scroll-to-section"><a href="#contact">Join Us Now!</a></div>--}}
{{--              </div>--}}
{{--              </div>--}}
{{--            </div>--}}
{{--            <div class="col-lg-12">--}}
{{--              <div class="item">--}}
{{--                <h3>APPLY FOR BACHELOR DEGREE</h3>--}}
{{--                <p>You are not allowed to redistribute the template ZIP file on any other template website. Please contact us for more information.</p>--}}
{{--                <div class="main-button-yellow">--}}
{{--                  <div class="scroll-to-section"><a href="#contact">Join Us Now!</a></div>--}}
{{--              </div>--}}
{{--              </div>--}}
{{--            </div>--}}
{{--          </div>--}}
{{--        </div>--}}
{{--        <div class="col-lg-6">--}}
{{--          <div class="accordions is-first-expanded">--}}
{{--            <article class="accordion">--}}
{{--                <div class="accordion-head">--}}
{{--                    <span>About Edu Meeting HTML Template</span>--}}
{{--                    <span class="icon">--}}
{{--                        <i class="icon fa fa-chevron-right"></i>--}}
{{--                    </span>--}}
{{--                </div>--}}
{{--                <div class="accordion-body">--}}
{{--                    <div class="content">--}}
{{--                        <p>If you want to get the latest collection of HTML CSS templates for your websites, you may visit <a rel="nofollow" href="https://www.toocss.com/" target="_blank">Too CSS website</a>. If you need a working contact form script, please visit <a href="https://templatemo.com/contact" target="_parent">our contact page</a> for more info.</p>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </article>--}}
{{--            <article class="accordion">--}}
{{--                <div class="accordion-head">--}}
{{--                    <span>HTML CSS Bootstrap Layout</span>--}}
{{--                    <span class="icon">--}}
{{--                        <i class="icon fa fa-chevron-right"></i>--}}
{{--                    </span>--}}
{{--                </div>--}}
{{--                <div class="accordion-body">--}}
{{--                    <div class="content">--}}
{{--                        <p>Etiam posuere metus orci, vel consectetur elit imperdiet eu. Cras ipsum magna, maximus at semper sit amet, eleifend eget neque. Nunc facilisis quam purus, sed vulputate augue interdum vitae. Aliquam a elit massa.<br><br>--}}
{{--                        Nulla malesuada elit lacus, ac ultricies massa varius sed. Etiam eu metus eget nibh consequat aliquet. Proin fringilla, quam at euismod porttitor, odio odio tempus ligula, ut feugiat ex erat nec mauris. Donec viverra velit eget lectus sollicitudin tincidunt.</p>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </article>--}}
{{--            <article class="accordion">--}}
{{--                <div class="accordion-head">--}}
{{--                    <span>Please tell your friends</span>--}}
{{--                    <span class="icon">--}}
{{--                        <i class="icon fa fa-chevron-right"></i>--}}
{{--                    </span>--}}
{{--                </div>--}}
{{--                <div class="accordion-body">--}}
{{--                    <div class="content">--}}
{{--                        <p>Ut vehicula mauris est, sed sodales justo rhoncus eu. Morbi porttitor quam velit, at ullamcorper justo suscipit sit amet. Quisque at suscipit mi, non efficitur velit.<br><br>--}}
{{--                        Cras et tortor semper, placerat eros sit amet, porta est. Mauris porttitor sapien et quam volutpat luctus. Nullam sodales ipsum ac neque ultricies varius.</p>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </article>--}}
{{--            <article class="accordion last-accordion">--}}
{{--                <div class="accordion-head">--}}
{{--                    <span>Share this to your colleagues</span>--}}
{{--                    <span class="icon">--}}
{{--                        <i class="icon fa fa-chevron-right"></i>--}}
{{--                    </span>--}}
{{--                </div>--}}
{{--                <div class="accordion-body">--}}
{{--                    <div class="content">--}}
{{--                        <p>Maecenas suscipit enim libero, vel lobortis justo condimentum id. Interdum et malesuada fames ac ante ipsum primis in faucibus.<br><br>--}}
{{--                        Sed eleifend metus sit amet magna tristique, posuere laoreet arcu semper. Nulla pellentesque ut tortor sit amet maximus. In eu libero ullamcorper, semper nisi quis, convallis nisi.</p>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </article>--}}
{{--        </div>--}}
{{--        </div>--}}
{{--      </div>--}}
{{--    </div>--}}
{{--  </section>--}}

{{--  <section class="our-courses" id="courses">--}}
{{--    <div class="container">--}}
{{--      <div class="row">--}}
{{--        <div class="col-lg-12">--}}
{{--          <div class="section-heading">--}}
{{--            <h2>AYEDUN STUDENT'S UNION ASUECO COMMITEE</h2>--}}
{{--          </div>--}}
{{--        </div>--}}
{{--        <div class="col-lg-12">--}}
{{--          <div class="owl-courses-item owl-carousel">--}}
{{--            <div class="item">--}}
{{--              <img src="assets/images/course-01.jpg" alt="Course One">--}}
{{--              <div class="down-content">--}}
{{--                <h4>Morbi tincidunt elit vitae justo rhoncus</h4>--}}
{{--                <div class="info">--}}
{{--                  <div class="row">--}}
{{--                    <div class="col-8">--}}
{{--                      <ul>--}}
{{--                        <li><i class="fa fa-star"></i></li>--}}
{{--                        <li><i class="fa fa-star"></i></li>--}}
{{--                        <li><i class="fa fa-star"></i></li>--}}
{{--                        <li><i class="fa fa-star"></i></li>--}}
{{--                        <li><i class="fa fa-star"></i></li>--}}
{{--                      </ul>--}}
{{--                    </div>--}}
{{--                    <div class="col-4">--}}
{{--                       <span>$160</span>--}}
{{--                    </div>--}}
{{--                  </div>--}}
{{--                </div>--}}
{{--              </div>--}}
{{--            </div>--}}
{{--            <div class="item">--}}
{{--              <img src="assets/images/course-02.jpg" alt="Course Two">--}}
{{--              <div class="down-content">--}}
{{--                <h4>Curabitur molestie dignissim purus vel</h4>--}}
{{--                <div class="info">--}}
{{--                  <div class="row">--}}
{{--                    <div class="col-8">--}}
{{--                      <ul>--}}
{{--                        <li><i class="fa fa-star"></i></li>--}}
{{--                        <li><i class="fa fa-star"></i></li>--}}
{{--                        <li><i class="fa fa-star"></i></li>--}}
{{--                      </ul>--}}
{{--                    </div>--}}
{{--                    <div class="col-4">--}}
{{--                       <span>$180</span>--}}
{{--                    </div>--}}
{{--                  </div>--}}
{{--                </div>--}}
{{--              </div>--}}
{{--            </div>--}}
{{--            <div class="item">--}}
{{--              <img src="assets/images/course-03.jpg" alt="">--}}
{{--              <div class="down-content">--}}
{{--                <h4>Nulla at ipsum a mauris egestas tempor</h4>--}}
{{--                <div class="info">--}}
{{--                  <div class="row">--}}
{{--                    <div class="col-8">--}}
{{--                      <ul>--}}
{{--                        <li><i class="fa fa-star"></i></li>--}}
{{--                        <li><i class="fa fa-star"></i></li>--}}
{{--                        <li><i class="fa fa-star"></i></li>--}}
{{--                        <li><i class="fa fa-star"></i></li>--}}
{{--                      </ul>--}}
{{--                    </div>--}}
{{--                    <div class="col-4">--}}
{{--                       <span>$140</span>--}}
{{--                    </div>--}}
{{--                  </div>--}}
{{--                </div>--}}
{{--              </div>--}}
{{--            </div>--}}
{{--            <div class="item">--}}
{{--              <img src="assets/images/course-04.jpg" alt="">--}}
{{--              <div class="down-content">--}}
{{--                <h4>Aenean molestie quis libero gravida</h4>--}}
{{--                <div class="info">--}}
{{--                  <div class="row">--}}
{{--                    <div class="col-8">--}}
{{--                      <ul>--}}
{{--                        <li><i class="fa fa-star"></i></li>--}}
{{--                        <li><i class="fa fa-star"></i></li>--}}
{{--                        <li><i class="fa fa-star"></i></li>--}}
{{--                        <li><i class="fa fa-star"></i></li>--}}
{{--                        <li><i class="fa fa-star"></i></li>--}}
{{--                      </ul>--}}
{{--                    </div>--}}
{{--                    <div class="col-4">--}}
{{--                       <span>$120</span>--}}
{{--                    </div>--}}
{{--                  </div>--}}
{{--                </div>--}}
{{--              </div>--}}
{{--            </div>--}}
{{--            <div class="item">--}}
{{--              <img src="assets/images/course-01.jpg" alt="">--}}
{{--              <div class="down-content">--}}
{{--                <h4>Lorem ipsum dolor sit amet adipiscing elit</h4>--}}
{{--                <div class="info">--}}
{{--                  <div class="row">--}}
{{--                    <div class="col-8">--}}
{{--                      <ul>--}}
{{--                        <li><i class="fa fa-star"></i></li>--}}
{{--                        <li><i class="fa fa-star"></i></li>--}}
{{--                        <li><i class="fa fa-star"></i></li>--}}
{{--                        <li><i class="fa fa-star"></i></li>--}}
{{--                        <li><i class="fa fa-star"></i></li>--}}
{{--                      </ul>--}}
{{--                    </div>--}}
{{--                    <div class="col-4">--}}
{{--                       <span>$250</span>--}}
{{--                    </div>--}}
{{--                  </div>--}}
{{--                </div>--}}
{{--              </div>--}}
{{--            </div>--}}
{{--            <div class="item">--}}
{{--              <img src="assets/images/course-02.jpg" alt="">--}}
{{--              <div class="down-content">--}}
{{--                <h4>TemplateMo is the best website for Free CSS</h4>--}}
{{--                <div class="info">--}}
{{--                  <div class="row">--}}
{{--                    <div class="col-8">--}}
{{--                      <ul>--}}
{{--                        <li><i class="fa fa-star"></i></li>--}}
{{--                        <li><i class="fa fa-star"></i></li>--}}
{{--                        <li><i class="fa fa-star"></i></li>--}}
{{--                        <li><i class="fa fa-star"></i></li>--}}
{{--                        <li><i class="fa fa-star"></i></li>--}}
{{--                      </ul>--}}
{{--                    </div>--}}
{{--                    <div class="col-4">--}}
{{--                       <span>$270</span>--}}
{{--                    </div>--}}
{{--                  </div>--}}
{{--                </div>--}}
{{--              </div>--}}
{{--            </div>--}}
{{--            <div class="item">--}}
{{--              <img src="assets/images/course-03.jpg" alt="">--}}
{{--              <div class="down-content">--}}
{{--                <h4>Web Design Templates at your finger tips</h4>--}}
{{--                <div class="info">--}}
{{--                  <div class="row">--}}
{{--                    <div class="col-8">--}}
{{--                      <ul>--}}
{{--                        <li><i class="fa fa-star"></i></li>--}}
{{--                        <li><i class="fa fa-star"></i></li>--}}
{{--                        <li><i class="fa fa-star"></i></li>--}}
{{--                        <li><i class="fa fa-star"></i></li>--}}
{{--                        <li><i class="fa fa-star"></i></li>--}}
{{--                      </ul>--}}
{{--                    </div>--}}
{{--                    <div class="col-4">--}}
{{--                       <span>$340</span>--}}
{{--                    </div>--}}
{{--                  </div>--}}
{{--                </div>--}}
{{--              </div>--}}
{{--            </div>--}}
{{--            <div class="item">--}}
{{--              <img src="assets/images/course-04.jpg" alt="">--}}
{{--              <div class="down-content">--}}
{{--                <h4>Please visit our website again</h4>--}}
{{--                <div class="info">--}}
{{--                  <div class="row">--}}
{{--                    <div class="col-8">--}}
{{--                      <ul>--}}
{{--                        <li><i class="fa fa-star"></i></li>--}}
{{--                        <li><i class="fa fa-star"></i></li>--}}
{{--                        <li><i class="fa fa-star"></i></li>--}}
{{--                        <li><i class="fa fa-star"></i></li>--}}
{{--                        <li><i class="fa fa-star"></i></li>--}}
{{--                      </ul>--}}
{{--                    </div>--}}
{{--                    <div class="col-4">--}}
{{--                       <span>$360</span>--}}
{{--                    </div>--}}
{{--                  </div>--}}
{{--                </div>--}}
{{--              </div>--}}
{{--            </div>--}}
{{--            <div class="item">--}}
{{--              <img src="assets/images/course-01.jpg" alt="">--}}
{{--              <div class="down-content">--}}
{{--                <h4>Responsive HTML Templates for you</h4>--}}
{{--                <div class="info">--}}
{{--                  <div class="row">--}}
{{--                    <div class="col-8">--}}
{{--                      <ul>--}}
{{--                        <li><i class="fa fa-star"></i></li>--}}
{{--                        <li><i class="fa fa-star"></i></li>--}}
{{--                        <li><i class="fa fa-star"></i></li>--}}
{{--                        <li><i class="fa fa-star"></i></li>--}}
{{--                        <li><i class="fa fa-star"></i></li>--}}
{{--                      </ul>--}}
{{--                    </div>--}}
{{--                    <div class="col-4">--}}
{{--                       <span>$400</span>--}}
{{--                    </div>--}}
{{--                  </div>--}}
{{--                </div>--}}
{{--              </div>--}}
{{--            </div>--}}
{{--            <div class="item">--}}
{{--              <img src="assets/images/course-02.jpg" alt="">--}}
{{--              <div class="down-content">--}}
{{--                <h4>Download Free CSS Layouts for your business</h4>--}}
{{--                <div class="info">--}}
{{--                  <div class="row">--}}
{{--                    <div class="col-8">--}}
{{--                      <ul>--}}
{{--                        <li><i class="fa fa-star"></i></li>--}}
{{--                        <li><i class="fa fa-star"></i></li>--}}
{{--                        <li><i class="fa fa-star"></i></li>--}}
{{--                        <li><i class="fa fa-star"></i></li>--}}
{{--                        <li><i class="fa fa-star"></i></li>--}}
{{--                      </ul>--}}
{{--                    </div>--}}
{{--                    <div class="col-4">--}}
{{--                       <span>$430</span>--}}
{{--                    </div>--}}
{{--                  </div>--}}
{{--                </div>--}}
{{--              </div>--}}
{{--            </div>--}}
{{--            <div class="item">--}}
{{--              <img src="assets/images/course-03.jpg" alt="">--}}
{{--              <div class="down-content">--}}
{{--                <h4>Morbi in libero blandit lectus cursus</h4>--}}
{{--                <div class="info">--}}
{{--                  <div class="row">--}}
{{--                    <div class="col-8">--}}
{{--                      <ul>--}}
{{--                        <li><i class="fa fa-star"></i></li>--}}
{{--                        <li><i class="fa fa-star"></i></li>--}}
{{--                        <li><i class="fa fa-star"></i></li>--}}
{{--                        <li><i class="fa fa-star"></i></li>--}}
{{--                        <li><i class="fa fa-star"></i></li>--}}
{{--                      </ul>--}}
{{--                    </div>--}}
{{--                    <div class="col-4">--}}
{{--                       <span>$480</span>--}}
{{--                    </div>--}}
{{--                  </div>--}}
{{--                </div>--}}
{{--              </div>--}}
{{--            </div>--}}
{{--            <div class="item">--}}
{{--              <img src="assets/images/course-04.jpg" alt="">--}}
{{--              <div class="down-content">--}}
{{--                <h4>Curabitur molestie dignissim purus</h4>--}}
{{--                <div class="info">--}}
{{--                  <div class="row">--}}
{{--                    <div class="col-8">--}}
{{--                      <ul>--}}
{{--                        <li><i class="fa fa-star"></i></li>--}}
{{--                        <li><i class="fa fa-star"></i></li>--}}
{{--                        <li><i class="fa fa-star"></i></li>--}}
{{--                        <li><i class="fa fa-star"></i></li>--}}
{{--                        <li><i class="fa fa-star"></i></li>--}}
{{--                      </ul>--}}
{{--                    </div>--}}
{{--                    <div class="col-4">--}}
{{--                       <span>$560</span>--}}
{{--                    </div>--}}
{{--                  </div>--}}
{{--                </div>--}}
{{--              </div>--}}
{{--            </div>--}}
{{--          </div>--}}
{{--        </div>--}}
{{--      </div>--}}
{{--    </div>--}}
{{--  </section>--}}

{{--  <section class="our-facts">--}}
{{--    <div class="container">--}}
{{--      <div class="row">--}}
{{--        <div class="col-lg-6">--}}
{{--          <div class="row">--}}
{{--            <div class="col-lg-12">--}}
{{--              <h2>A Few Facts About Our University</h2>--}}
{{--            </div>--}}
{{--            <div class="col-lg-6">--}}
{{--              <div class="row">--}}
{{--                <div class="col-12">--}}
{{--                  <div class="count-area-content percentage">--}}
{{--                    <div class="count-digit">94</div>--}}
{{--                    <div class="count-title">Succesed Students</div>--}}
{{--                  </div>--}}
{{--                </div>--}}
{{--                <div class="col-12">--}}
{{--                  <div class="count-area-content">--}}
{{--                    <div class="count-digit">126</div>--}}
{{--                    <div class="count-title">Current Teachers</div>--}}
{{--                  </div>--}}
{{--                </div>--}}
{{--              </div>--}}
{{--            </div>--}}
{{--            <div class="col-lg-6">--}}
{{--              <div class="row">--}}
{{--                <div class="col-12">--}}
{{--                  <div class="count-area-content new-students">--}}
{{--                    <div class="count-digit">2345</div>--}}
{{--                    <div class="count-title">New Students</div>--}}
{{--                  </div>--}}
{{--                </div>--}}
{{--                <div class="col-12">--}}
{{--                  <div class="count-area-content">--}}
{{--                    <div class="count-digit">32</div>--}}
{{--                    <div class="count-title">Awards</div>--}}
{{--                  </div>--}}
{{--                </div>--}}
{{--              </div>--}}
{{--            </div>--}}
{{--          </div>--}}
{{--        </div>--}}
{{--        <div class="col-lg-6 align-self-center">--}}
{{--          <div class="video">--}}
{{--            <a href="https://www.youtube.com/watch?v=HndV87XpkWg" target="_blank"><img src="assets/images/play-icon.png" alt=""></a>--}}
{{--          </div>--}}
{{--        </div>--}}
{{--      </div>--}}
{{--    </div>--}}
{{--  </section>--}}

{{--  <section class="contact-us" id="contact">--}}
{{--    <div class="container">--}}
{{--      <div class="row">--}}
{{--        <div class="col-lg-9 align-self-center">--}}
{{--          <div class="row">--}}
{{--            <div class="col-lg-12">--}}
{{--              <form id="contact" action="" method="post">--}}
{{--                <div class="row">--}}
{{--                  <div class="col-lg-12">--}}
{{--                    <h2>Let's get in touch</h2>--}}
{{--                  </div>--}}
{{--                  <div class="col-lg-4">--}}
{{--                    <fieldset>--}}
{{--                      <input name="name" type="text" id="name" placeholder="YOURNAME...*" required="">--}}
{{--                    </fieldset>--}}
{{--                  </div>--}}
{{--                  <div class="col-lg-4">--}}
{{--                    <fieldset>--}}
{{--                    <input name="email" type="text" id="email" pattern="[^ @]*@[^ @]*" placeholder="YOUR EMAIL..." required="">--}}
{{--                  </fieldset>--}}
{{--                  </div>--}}
{{--                  <div class="col-lg-4">--}}
{{--                    <fieldset>--}}
{{--                      <input name="subject" type="text" id="subject" placeholder="SUBJECT...*" required="">--}}
{{--                    </fieldset>--}}
{{--                  </div>--}}
{{--                  <div class="col-lg-12">--}}
{{--                    <fieldset>--}}
{{--                      <textarea name="message" type="text" class="form-control" id="message" placeholder="YOUR MESSAGE..." required=""></textarea>--}}
{{--                    </fieldset>--}}
{{--                  </div>--}}
{{--                  <div class="col-lg-12">--}}
{{--                    <fieldset>--}}
{{--                      <button type="submit" id="form-submit" class="button">SEND MESSAGE NOW</button>--}}
{{--                    </fieldset>--}}
{{--                  </div>--}}
{{--                </div>--}}
{{--              </form>--}}
{{--            </div>--}}
{{--          </div>--}}
{{--        </div>--}}
{{--        <div class="col-lg-3">--}}
{{--          <div class="right-info">--}}
{{--            <ul>--}}
{{--              <li>--}}
{{--                <h6>Phone Number</h6>--}}
{{--                <span>010-020-0340</span>--}}
{{--              </li>--}}
{{--              <li>--}}
{{--                <h6>Email Address</h6>--}}
{{--                <span>info@meeting.edu</span>--}}
{{--              </li>--}}
{{--              <li>--}}
{{--                <h6>Street Address</h6>--}}
{{--                <span>Rio de Janeiro - RJ, 22795-008, Brazil</span>--}}
{{--              </li>--}}
{{--              <li>--}}
{{--                <h6>Website URL</h6>--}}
{{--                <span>www.meeting.edu</span>--}}
{{--              </li>--}}
{{--            </ul>--}}
{{--          </div>--}}
{{--        </div>--}}
{{--      </div>--}}
{{--    </div>--}}
{{--    <div class="footer">--}}
{{--      <p>Copyright © 2022 Edu Meeting Co., Ltd. All Rights Reserved.--}}
{{--          <br>Design: <a href="https://templatemo.com" target="_parent" title="free css templates">TemplateMo</a></p>--}}
{{--    </div>--}}
{{--  </section>--}}

{{--  <!-- Scripts -->--}}
{{--  <!-- Bootstrap core JavaScript -->--}}
{{--    <script src="vendor/jquery/jquery.min.js"></script>--}}
{{--    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>--}}

{{--    <script src="assets/js/isotope.min.js"></script>--}}
{{--    <script src="assets/js/owl-carousel.js"></script>--}}
{{--    <script src="assets/js/lightbox.js"></script>--}}
{{--    <script src="assets/js/tabs.js"></script>--}}
{{--    <script src="assets/js/video.js"></script>--}}
{{--    <script src="assets/js/slick-slider.js"></script>--}}
{{--    <script src="assets/js/custom.js"></script>--}}
{{--    <script>--}}
{{--        //according to loftblog tut--}}
{{--        $('.nav li:first').addClass('active');--}}

{{--        var showSection = function showSection(section, isAnimate) {--}}
{{--          var--}}
{{--          direction = section.replace(/#/, ''),--}}
{{--          reqSection = $('.section').filter('[data-section="' + direction + '"]'),--}}
{{--          reqSectionPos = reqSection.offset().top - 0;--}}

{{--          if (isAnimate) {--}}
{{--            $('body, html').animate({--}}
{{--              scrollTop: reqSectionPos },--}}
{{--            800);--}}
{{--          } else {--}}
{{--            $('body, html').scrollTop(reqSectionPos);--}}
{{--          }--}}

{{--        };--}}

{{--        var checkSection = function checkSection() {--}}
{{--          $('.section').each(function () {--}}
{{--            var--}}
{{--            $this = $(this),--}}
{{--            topEdge = $this.offset().top - 80,--}}
{{--            bottomEdge = topEdge + $this.height(),--}}
{{--            wScroll = $(window).scrollTop();--}}
{{--            if (topEdge < wScroll && bottomEdge > wScroll) {--}}
{{--              var--}}
{{--              currentId = $this.data('section'),--}}
{{--              reqLink = $('a').filter('[href*=\\#' + currentId + ']');--}}
{{--              reqLink.closest('li').addClass('active').--}}
{{--              siblings().removeClass('active');--}}
{{--            }--}}
{{--          });--}}
{{--        };--}}

{{--        $('.main-menu, .responsive-menu, .scroll-to-section').on('click', 'a', function (e) {--}}
{{--          e.preventDefault();--}}
{{--          showSection($(this).attr('href'), true);--}}
{{--        });--}}

{{--        $(window).scroll(function () {--}}
{{--          checkSection();--}}
{{--        });--}}


{{--        $("#vote").keydown(function () {--}}
{{--            $("#item").style.animationPlayState = 'paused';--}}
{{--        })--}}
{{--    </script>--}}
{{--</body>--}}

{{--</body>--}}
{{--</html>--}}
