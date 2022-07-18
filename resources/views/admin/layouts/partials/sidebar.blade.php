<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <div class="sb-sidenav-menu-heading">Core</div>
                <a class="nav-link" href="{{ url('/admin2') }}">
                    Dashboard
                </a>
                @if (Auth::check())
					@if(auth()->user()->name == 'asad' || auth()->user()->name == 'itsupport' || auth()->user()->name == 'enam')
                        <div class="sb-sidenav-menu-heading">Interface</div>
                        <a class="nav-link" href="{{ url('/admin_department') }}">
                            <i class="fa fa-building-o"></i> &nbsp;
                            Departments
                        </a>
                        <a class="nav-link" href="{{ url('/admin_doctors') }}">
                            <i class="fa fa-user-md"></i> &nbsp;
                            Doctors
                        </a>
                        <a class="nav-link" href="{{ url('/admin_service') }}">
                            <i class="fa fa-key"></i> &nbsp;
                            Services
                        </a>
                        <a class="nav-link" href="{{ url('/admin_slider') }}">
                            <i class="fa fa-sliders"></i> &nbsp;
                            Slider
                        </a>
                        <a class="nav-link" href="{{ url('/admin_news_and_event') }}">
                            <i class="fa fa-newspaper-o"></i> &nbsp;
                            News and Event
                        </a>
                        <a class="nav-link" href="{{ url('/admin_package') }}">
                            <i class="fa fa-newspaper-o"></i> &nbsp;
                            Package
                        </a>
                        <a class="nav-link" href="{{ url('/admin_job') }}">
                            <i class="fa fa-newspaper-o"></i> &nbsp;
                            Job
                        </a>
                        <a class="nav-link" href="{{ url('/admin_video') }}">
                            <i class="fa fa-newspaper-o"></i> &nbsp;
                            Video
                        </a>
                        <a class="nav-link" href="{{ url('/admin_leaflet') }}">
                            <i class="fa fa-newspaper-o"></i> &nbsp;
                            Leaflet
                        </a>
                        <a class="nav-link" href="{{ url('/admin_bulletin') }}">
                            <i class="fa fa-newspaper-o"></i> &nbsp;
                            Bulletin
                        </a>
                    @elseif(auth()->user()->name == 'TM')
                        <a class="nav-link" href="{{ url('/admin_job') }}">
                            <i class="fa fa-newspaper-o"></i> &nbsp;
                            Job
                        </a>
                    @elseif(auth()->user()->name == 'Appointment')
                        <a class="nav-link" href="{{ url('/admin_appointment') }}">
                            <i class="fa fa-newspaper-o"></i> &nbsp;
                            Appointment
                        </a>
                    @endif
				@endif
            </div>
        </div>
        <div class="sb-sidenav-footer">
            <div class="small">Logged in as:</div>
            {{ auth()->user()->name }}
        </div>
    </nav>
</div>