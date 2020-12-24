<style>
a {
  color: #000;
}
</style>
<!-- Main sidebar -->
<div class="sidebar sidebar-main sidebar-expand-md" style="background-color: #FFF;">

  <!-- Sidebar mobile toggler -->
  <div class="sidebar-mobile-toggler text-center">
    <a href="#" class="sidebar-mobile-main-toggle">
      <i class="icon-arrow-left8"></i>
    </a>
    Navigation
    <a href="#" class="sidebar-mobile-expand">
      <i class="icon-screen-full"></i>
      <i class="icon-screen-normal"></i>
    </a>
  </div>
  <!-- /sidebar mobile toggler -->


  <!-- Sidebar content -->
  <div class="sidebar-content">

    <!-- User menu -->
    <div class="sidebar-user-material sidebar-dark">
      <div class="sidebar-user-material-body">
      @foreach (session('showStaff') as $showStaff)
        <div class="card-body text-center">
          <a href="#">
            <img src="/assets/images/photo_profile/{{ $showStaff['photo'] }}" class="img-fluid rounded-circle shadow-1 mb-3" width="80" height="80" alt="">
          </a>
          <h6 class="mb-0 text-white text-shadow-dark">{{ $showStaff['name'] }}</h6>
          <span class="font-size-sm text-white text-shadow-dark">{{ $showStaff['state'] }}, {{ $showStaff['country'] }}</span>
        </div>
      
                      
        <div class="sidebar-user-material-footer">
          <a href="#user-nav" class="d-flex justify-content-between align-items-center text-shadow-dark dropdown-toggle" data-toggle="collapse"><span>My account</span></a>
        </div>
      </div>

      <div class="collapse" id="user-nav">
        <ul class="nav nav-sidebar">
          <li class="nav-item">
            <a href="/manage_staff_members/detail/{{$showStaff->id}}" class="nav-link">
              <i class="icon-user-plus"></i>
              <span>My profile</span>
            </a>
          </li>
          <li class="nav-item">
            <a href="/manage_salary" class="nav-link">
              <i class="icon-coins"></i>
              <span>My balance</span>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="icon-comment-discussion"></i>
              <span>Messages</span>
              <span class="badge bg-teal-400 badge-pill align-self-center ml-auto">58</span>
            </a>
          </li>
          <li class="nav-item">
            <a href="/account_settings" class="nav-link">
              <i class="icon-cog5"></i>
              <span>Account settings</span>
            </a>
          </li>
          <li class="nav-item">
            <a href="/logout" class="nav-link">
              <i class="icon-switch2"></i>
              <span>Logout</span>
            </a>
          </li>
        </ul>
      </div>
    </div>
    <!-- /user menu -->
    @endforeach
    
    <!-- Main navigation -->
    <div class="card card-sidebar-mobile">
      <ul class="nav nav-sidebar" data-nav-type="accordion">

        <!-- Main -->
        <li class="nav-item-header"><div class="text-uppercase font-size-xs line-height-xs text-bold">Main</div> <i class="icon-menu" title="Main"></i></li>
        <li class="nav-item">
          <a href="/dashboard" class="nav-link {{ (request()->is('dashboard')) ? 'active' : '' }}">
            <i class="icon-home4"></i>
            <span>
              Dashboard
            </span>
          </a>
        </li>

        @foreach (session('menus') as $menu)
        @if (count($menu['sub_menu']) > 0)
          <li class="nav-item nav-item-submenu">
            <a class="nav-link" href="#" data-toggle="collapse" data-target="#{{ $menu['parent_code'] }}" aria-expanded="true" aria-controls="{{ $menu['parent_code'] }}">
              <i class="{{ $menu['parent_icon'] }}"></i>
              <span>{{ $menu['parent_name'] }}</span>
            </a>
              <ul class="nav nav-group-sub" data-submenu-title="Invoices">
                @foreach ($menu['sub_menu'] as $sub)
                  <li class="nav-item"><a href="{{ url($sub['sub_code']) }}" class="nav-link {{ (request()->is($sub['sub_code'])) ? 'active' : '' }}">{{ $sub['sub_name'] }}</a></li>
                @endforeach
              </ul>
          </li>
        @else
          <li class="nav-item">
            <a class="nav-link" href="{{ url($menu['parent_code']) }}">
              <i class="fas fa-fw {{ $menu['parent_icon'] }}"></i>
              <span>{{ $menu['parent_name'] }}</span></a>
          </li>
        @endif    
      @endforeach

      </ul>
    </div>
    <!-- /main navigation -->

  </div>
  <!-- /sidebar content -->
  
</div>
<!-- /main sidebar -->