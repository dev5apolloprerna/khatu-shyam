<?php 
if(auth()->user())
{
$roleid = auth()->user()->role_id;
}else{

$roleid = Auth::guard('web_employees')->user()->role_id;
}
?>
<!-- ========== App Menu ========== -->
<div class="app-menu navbar-menu">
    <div id="scrollbar">
        <div class="container-fluid">
            <div id="two-column-menu"></div>
            <ul class="navbar-nav" id="navbar-nav">
                <li class="menu-title"><span data-key="t-menu"></span></li>
                 <li class="nav-item">
                    <a class="nav-link menu-link @if (request()->routeIs('home')) {{ 'active' }} @endif"
                        href="{{ route('home') }}">
                        <i class="mdi mdi-speedometer"></i>
                        <span data-key="t-dashboards">Dashboards</span>
                    </a>
                </li>
                @if($roleid == '1' && $roleid != '2')
                   
                   <li class="nav-item">
                    <a href="{{ route('albums.index') }}" class="nav-link {{ request()->is('admin/album*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-images"></i>
                        <p>Albums</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.gallery_master.index') }}" class="nav-link {{ request()->is('admin/gallery_master*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-images"></i>
                        <p>Gallery</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('admin.live_video_master.index') }}" class="nav-link {{ request()->is('admin/live_video_master*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-video"></i>
                        <p>Live Video</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('admin.timetable_master.index') }}" class="nav-link {{ request()->is('admin/timetable_master*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-calendar-alt"></i>
                        <p>Timetable</p>
                    </a>
                </li>

            <li class="nav-item">
                <a href="{{ route('admin.video_gallery.index') }}" class="nav-link {{ request()->is('admin/video_gallery*') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-video"></i>
                    <p>Video Gallery</p>
                </a>
            </li>


                @endif
            </ul>
        </div>
        <!-- Sidebar -->
    </div>

    <div class="sidebar-background"></div>
</div>