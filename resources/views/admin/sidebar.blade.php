<nav id="sidebar">
    <!-- Sidebar Header-->
    <div class="sidebar-header d-flex align-items-center">
      <div class="avatar"><img src="{{  asset('adminpannel/img/avatar-6.jpg')}}" alt="..." class="img-fluid rounded-circle"></div>
      <div class="title">
        <h1 class="h5">Zainab Hafeez</h1>
        <p>Web Developer</p>
      </div>
    </div>
    <!-- Sidebar Navidation Menus--><span class="heading">Main</span>
    <ul class="list-unstyled">
            <li class="active"><a href="{{  route('posts.index')}}"> <i class="icon-home"></i>Home </a></li>
            <li><a href="{{route('posts.create')}}"> <i class="icon-grid"></i>Add Post</a></li>
            <li><a href="{{  route('posts.index')}}"> <i class="fa fa-bar-chart"></i>Posts </a></li>
            <li><a href="adminpannel/forms.html"> <i class="icon-padnote"></i>Forms </a></li>
          
            <li><a href="adminpannel/login.html"> <i class="icon-logout"></i>Login page </a></li>
    </ul><span class="heading">Extras</span>
   
  </nav>