<header>
	<nav class="white container-fluid">
        <div class="nav-wrapper">
            <a href="{{ route('index')  }}" class="brand-logo font-audiowide left deep-purple-text text-darken-2">SysQ</a>
            @auth
            <ul id="nav-mobile" class="right show-on-med-and-down">
               	<li>
               		<a href="{{ route('panel') }}" class="black-text tooltipped" data-position="left" data-tooltip="Panel">
               			<i class="icon-account_circle nav-icons"></i>
               		</a>
               	</li>
                <li>
                	<a href="{{ route('turn')}}" class="black-text tooltipped" data-position="bottom" data-tooltip="Turnos">
                		<i class="icon-slow_motion_video nav-icons"></i>
                	</a>
                </li>
                <li>
                	<a href="{{ route('config')}}" class="black-text tooltipped" data-position="bottom" data-tooltip="Configuración">
                		<i class="icon-settings nav-icons"></i>
                	</a>
                </li>
                <li>
                	<a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();" class="black-text tooltipped" data-position="left" data-tooltip="Cerrar Sesión">
                		<i class="icon-exit_to_app nav-icons"></i>
                	</a>
                   <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                          @csrf
                   </form>
                </li>
            </ul>
            @endauth
        </div>
	</nav>
</header>

