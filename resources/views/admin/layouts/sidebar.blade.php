<nav class="navbar navbar-expand-lg main-navbar">
    <form class="form-inline mr-auto">
      <ul class="navbar-nav mr-3">
        <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
        <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li>
      </ul>
    </form>
    <ul class="navbar-nav navbar-right">
     
      <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">

        {{-- <img alt="image" src="{{ asset('avatar_img/avatar.png') }}" class="rounded-circle mr-1"> --}}

        @if (auth()->user()->image == null)
        {{-- <a href="{{ route('profile.edit') }}"> --}}
          <img alt="image" src="{{ asset('avatar_img/avatar.png') }}" class="rounded-circle mr-1"> 
        {{-- </a> --}}
      @else
      {{-- <a href="{{ route('profile.edit')  }}"> --}}
          <img alt="image" src="{{ asset('avatar_img/' . auth()->user()->image) }}" class="rounded-circle mr-1">
      {{-- </a> --}}
      @endif
        
        <div class="d-sm-none d-lg-inline-block">Hi, {{ auth()->user()->name }}</div></a>
        <div class="dropdown-menu dropdown-menu-right">
          <a href="{{ route('admin.profile.edit') }}" class="dropdown-item has-icon">
            <i class="far fa-user"></i> Profile
          </a>
          <a href="" class="dropdown-item has-icon">
            <i class="fas fa-cog"></i> Settings
          </a>
          <div class="dropdown-divider"></div>
          <form method="POST" action="{{ route('admin.logout') }}">
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
          <a href="{{ route('admin.dashboard') }}" class="nav-link"><i class="fas fa-fire"></i><span>Dashboard</span></a>
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