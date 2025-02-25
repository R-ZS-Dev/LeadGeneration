<nav class="sidebar-nav">
    <ul id="sidebarnav">
        <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="{{ route('dashboard') }}"
                aria-expanded="false"><i data-feather="home" class="feather-icon"></i><span
                    class="hide-menu">Dashboard</span></a></li>
        <li class="list-divider"></li>

        <li class="nav-small-cap"><span class="hide-menu">Applications</span></li>

        <li class="sidebar-item"> <a class="sidebar-link" href="{{ route('all-users') }}"
                aria-expanded="false"><i data-feather="user" class="feather-icon"></i><span
                    class="hide-menu">All Users
                </span></a>
        </li>

        <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="{{ route('app-chat')}}"
                aria-expanded="false"><i data-feather="message-square" class="feather-icon"></i><span
                    class="hide-menu">Chat</span></a>
        </li>

        <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="{{ route('app-calendar') }}"
                aria-expanded="false"><i data-feather="calendar" class="feather-icon"></i><span
                    class="hide-menu">Calendar</span></a>
        </li>


        <li class="list-divider"></li>

        <li class="nav-small-cap"><span class="hide-menu">Setting</span></li>

        <li class="sidebar-item">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="sidebar-link" style="border: none; background: none; cursor: pointer;">
                    <i data-feather="log-out" class="feather-icon"></i>
                    <span class="hide-menu">Logout</span>
                </button>
            </form>
        </li>

    </ul>
</nav>