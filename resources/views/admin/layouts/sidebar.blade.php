<nav class="navbar navbar-expand-lg main-navbar">
    <form class="form-inline mr-auto">
      <ul class="navbar-nav mr-3">
        <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
        <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li>
      </ul>
    </form>
    <ul class="navbar-nav navbar-right">
        <div class="dropdown-menu dropdown-list dropdown-menu-right">
          <div class="dropdown-header">Messages
            <div class="float-right">
              <a href="#">Mark All As Read</a>
            </div>
          </div>
          <div class="dropdown-list-content dropdown-list-message">
            <a href="#" class="dropdown-item dropdown-item-unread">
              <div class="dropdown-item-avatar">
                <img alt="{{ asset('avatar_img/avatar.png') }}" src="{{ asset('avatar_img/avatar.png') }}" class="rounded-circle mr-1" width="40" height="40"> 
                {{-- @if (auth()->user()->image == null)
                <a href="{{ route('profile.edit') }}">
                  <img alt="image" src="{{ asset('avatar_img/avatar.png') }}" class="rounded-circle mr-1" width="40" height="40"> 
                </a>
              @else
              <a href="{{ route('profile.edit')  }}">
                  <img alt="image" src="{{ asset('avatar_img/' . auth()->user()->image) }}" class="rounded-circle mr-1" width="40" height="40">
              </a>
              @endif --}}
                <div class="is-online"></div>
              </div>
              <div class="dropdown-item-desc">
                <b>Kusnaedi</b>
                <p>Hello, Bro!</p>
                <div class="time">10 Hours Ago</div>
              </div>
            </a>
            <a href="#" class="dropdown-item dropdown-item-unread">
              <div class="dropdown-item-avatar">
                <img alt="image" src="{{ asset('avatar_img/avatar.png') }}" class="rounded-circle">
              </div>
              <div class="dropdown-item-desc">
                <b>Dedik Sugiharto</b>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit</p>
                <div class="time">12 Hours Ago</div>
              </div>
            </a>
            <a href="#" class="dropdown-item dropdown-item-unread">
              <div class="dropdown-item-avatar">
                <img alt="image" src="{{ asset('avatar_img/avatar.png') }}" class="rounded-circle">
                <div class="is-online"></div>
              </div>
              <div class="dropdown-item-desc">
                <b>Agung Ardiansyah</b>
                <p>Sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                <div class="time">12 Hours Ago</div>
              </div>
            </a>
            <a href="#" class="dropdown-item">
              <div class="dropdown-item-avatar">
                <img alt="image" src="admin/assets/img/avatar/avatar-4.png" class="rounded-circle">
              </div>
              <div class="dropdown-item-desc">
                <b>Ardian Rahardiansyah</b>
                <p>Duis aute irure dolor in reprehenderit in voluptate velit ess</p>
                <div class="time">16 Hours Ago</div>
              </div>
            </a>
            <a href="#" class="dropdown-item">
              <div class="dropdown-item-avatar">
                <img alt="image" src="admin/assets/img/avatar/avatar-5.png" class="rounded-circle">
              </div>
              <div class="dropdown-item-desc">
                <b>Alfa Zulkarnain</b>
                <p>Exercitation ullamco laboris nisi ut aliquip ex ea commodo</p>
                <div class="time">Yesterday</div>
              </div>
            </a>
          </div>
          <div class="dropdown-footer text-center">
            <a href="#">View All <i class="fas fa-chevron-right"></i></a>
          </div>
        </div>
      </li>
      <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">

        <img alt="image" src="" class="rounded-circle mr-1">
        
        {{-- <div class="d-sm-none d-lg-inline-block">Hi, {{ auth()->user()->name }}</div></a> --}}
        <div class="dropdown-menu dropdown-menu-right">
          {{-- <a href="{{ route('admin.profile') }}" class="dropdown-item has-icon">
            <i class="far fa-user"></i> Profile
          </a> --}}
          <a href="{{ route('admin.profile.edit') }}" class="dropdown-item has-icon">
            <i class="fas fa-bolt"></i> Profile
          </a>
          <a href="" class="dropdown-item has-icon">
            <i class="fas fa-cog"></i> Settings
          </a>
          <div class="dropdown-divider"></div>
          <form method="POST" action="{{ route('logout') }}">
            @csrf

            <a href="#" onclick="event.preventDefault();
             this.closest('form').submit();" class="dropdown-item has-icon text-danger">
              <i class="fas fa-sign-out-alt"></i> Logout
            </a>

          </form>

        </div>
      </li>
    </ul>
  </nav>
  <div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
      <div class="sidebar-brand">
        {{-- <a href="">P48inv</a> --}}
        <x-application-logo class="block h-9 w-auto fill-current text-gray-800" />
      </div>
      <div class="sidebar-brand sidebar-brand-sm">
        <a href="index.html">St</a>
      </div>
      <ul class="sidebar-menu">
        <li class="menu-header">Dashboard</li>
        <li class="active">
          <a href="" class="nav-link"><i class="fas fa-fire"></i><span>Dashboard</span></a>
        </li>
        {{-- <li class="menu-header">Starter</li> --}}
        {{-- <li><a class="nav-link" href="{{ route('admin.slider.index') }}"><i class="far fa-square"></i> <span>Slider</span></a></li>
        <li><a class="nav-link" href="{{ route('admin.why-choose-us.index') }}"><i class="far fa-square"></i> <span>Why Choose us</span></a></li> --}}

        {{-- <li class="dropdown">
          <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>Manage Restaurant</span></a>
          <ul class="dropdown-menu">
            <li><a class="nav-link" href="{{ route('admin.category.index') }}">Product Categories</a></li>
            <li><a class="nav-link" href="{{ route('admin.product.index') }}">Products</a></li>
          </ul>
        </li> --}}
        {{-- <li><a class="nav-link" href="{{ route('admin.setting.index') }}"><i class="fas fa-pencil-ruler"></i> <span>Settings</span></a></li> --}}

        {{-- <li><a class="nav-link" href="credits.html"><i class="fas fa-pencil-ruler"></i> <span>Credits</span></a></li> --}}
      </ul>
        
    </aside>
  </div>