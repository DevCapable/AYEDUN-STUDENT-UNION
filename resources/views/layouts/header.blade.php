<header>
  <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    <a id="homename" class="navbar-brand" href={{ url('user/home') }}><img
        style="border-radius: 100px; border-style:double; border-color:#009933" src="{{ asset('img/ASU_LOGO.png') }}"
        height="60" width="60" class="img-responsive" alt="Cinque Terre" class="img-rounded"></a>
        @if ($unreadMessage>0)
        <a  class="btn btn-outline-info" class="nav-link" href={{ url('user/inbox') }} class="active"><i
          class="fa fa-envelope"></i><span style="font-size: 20px;color: red">
            <i>  {{ $unreadMessage  }}</i></a>
          @endif


    &nbsp;
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse"
      aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>


    <div class="collapse navbar-collapse" id="navbarCollapse">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active"><a class="nav-link" href={{ url('user/home') }} class="active"><i
              class="fa fa-home"></i> Home <span class="sr-only">(current)</span></a>
        </li>
        <!-- Dropdown -->
        <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" href="#" id="navbardrop"
            data-toggle="dropdown">
            <i class="fa fa-tasks"></i>&nbsp;ASU Arena
          </a>
          <div class="dropdown-menu">


            <a id="dropdown" class="dropdown-item" href="{{ url('user/ViewAllSportDirector') }}"><i class="fa fa-home"></i>&nbsp;ASU sport</a>
              <a id="dropdown" class="dropdown-item" href="{{ url('user/ViewAllNationalPresident') }}"><i class="fa fa-street-view"></i>&nbsp;ASU
                National</a>
                <a id="dropdown" class="dropdown-item" href="{{ url('/user/ViewAllChapterPresident') }}"><i class="fa fa-street-view"></i>&nbsp;ASU
                  Chapters</a>
                  <a id="dropdown" class="dropdown-item" href="{{ url('user/ViewAllNationalExecutive') }}"><i class="fa fa-user"></i>&nbsp;National Executives</a>
                  <a id="dropdown" class="dropdown-item" href="{{ url('user/ViewAllMissAsu') }}"><i class="fa fa-user"></i>&nbsp;MISS ASU</a>

                </div>
        </li>
        <!-- Dropdown -->
        <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" href="#" id="navbardrop"
            data-toggle="dropdown">
            <i class="fa fa-folder"></i>&nbsp;More
          </a>
          <div class="dropdown-menu">
            <a id="dropdown" class="dropdown-item" href="{{ url('/user/ViewAllRelative') }}"><i
                class="fa fa-users"></i>&nbsp;Relatives</a>
                <a id="dropdown" class="dropdown-item" href="{{ url('/historyOfAyedun') }}"><i class="fa fa-clone"></i>&nbsp;History Of
                  Ayedun</a>
            <a id="dropdown" class="dropdown-item" href="{{ url('/user/ViewAllCompound')}}"><i class="fa fa-clone"></i>&nbsp;All Compound</a>
            <a id="dropdown" class="dropdown-item" href="{{ url('user/all_users') }}"><i
                class="fa fa-users"></i>&nbsp;Connect With Users</a>
          </div>

        </li>
        <a   class="nav-link" href="{{ url('user/inbox') }}" class="active"><i
                    class="fa fa-envelope"></i><span style="font-size: 20px;color: red">
                    @if ($unreadMessage>1)
                      <i> {{ $unreadMessage .'New Messages' }}</i>
                    @else
                    {{ $unreadMessage }}
                    @endif
                     </span> Message<span class="sr-only">(current)</span></a>

              &nbsp;
        <form method="POST" action="{{ url('user/logout') }}" id="logout" novalidate>
          @csrf
          <button style=" float: right;" type="submit" class="btn btn-sm btn-primary"><i class="fas fa-sign-out-alt"></i>Sign Out </button>
      </form>
      </ul>
        @if (Session::has('user'))
            <h5 class="alert alert-success" style="margin-right:200px">
                Online
            </h5>
        @endif
    </div>

  </nav>
</header>
<br>

<div id="mySidenav" class="sidenav">

  <a href="{{ url('user/map') }}" id="map">Map</a>
  <a href="{{ url('user/developer') }}" id="developer">Developer</a>


</div>

