<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="index3.html" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li>
    </ul>
   <!-- Right navbar links -->
   <ul class="navbar-nav ml-auto">
    <!-- Navbar Search -->

    <li class="nav-item">
      <a class="nav-link" data-widget="navbar-search" href="#" role="button">
        <i class="fas fa-search"></i>
      </a>
      <div class="navbar-search-block">
        <form method="post" action="{{ url('administrator/Manage_Users') }}" novalidate>
          @csrf
          <div class="input-group input-group-sm">
            <input class="form-control form-control-navbar" type="search" name="question" placeholder="Search Any UserName" aria-label="Search">
            <div class="input-group-append">
              <button class="btn btn-navbar" type="submit">
                <i class="fas fa-search"></i>
              </button>
              <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                <i class="fas fa-times"></i>
              </button>
            </div>
          </div>
        </form>
      </div>
    </li>
    <!-- Messages Dropdown Menu -->
    <li class="nav-item dropdown">
      <a class="nav-link" data-toggle="dropdown" href="#">
        <i class="far fa-comments"></i>
        <span class="badge badge-danger navbar-badge">{{ $unreadMessage }}</span>
      </a>

      <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
        @foreach($AdminInboxs as $AdminInbox)
        <a href="{{ ('/administrator/ReadMessage'. $AdminInbox->id ) }}" class="dropdown-item">
          <!-- Message Start -->
          <div class="media">
            <img src="{{ asset('dist/img/user1-128x128.jpg') }}" alt="User Avatar"
              class="img-size-50 mr-3 img-circle">
            <div class="media-body">
              <h3 class="dropdown-item-title">
               {{$AdminInbox->from_who}}
                <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
              </h3>
              <p class="text-sm" style="text-align: justify"> {{$AdminInbox->type_of_issue}}</p>
              <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i>  
                <span style="float: right" class="badge badge-info pull-right">
                {{ Carbon\Carbon::parse($AdminInbox->created_at)->diffForHumans() }}
            </span></p>
            </div>
          </div>
          <!-- Message End -->
        </a>
         @endforeach
        <div class="dropdown-divider"></div>
 {{ $AdminInboxs->links() }}

        <a href="{{ url("administrator/Inbox") }}" class="dropdown-item dropdown-footer">See All Messages</a>
      </div>
    </li>
   
    <li class="nav-item">
      <a class="nav-link" data-widget="fullscreen" href="#" role="button">
        <i class="fas fa-expand-arrows-alt"></i>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
        <i class="fas fa-th-large"></i>
      </a>
    </li>
  </ul>
</nav>
<!-- /.navbar -->