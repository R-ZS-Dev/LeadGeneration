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
        <li class="nav-small-cap"><span class="hide-menu">Components</span></li>
        <li class="sidebar-item"> <a class="sidebar-link has-arrow" href="javascript:void(0)"
                aria-expanded="false"><i data-feather="file-text" class="feather-icon"></i><span
                    class="hide-menu">Config </span></a>
            <ul aria-expanded="false" class="collapse  first-level base-level-line">

                <li class="sidebar-item"><a href="/" class="sidebar-link"><span class="hide-menu"> Report </span></a> </li>
                <!-- <li class="sidebar-item"><a href="/" class="sidebar-link"><span class="hide-menu"> Report Review </span></a> </li>

                <li class="sidebar-item"><a href="/" class="sidebar-link"><span class="hide-menu"> Procedures </span></a> </li>

                <li class="sidebar-item"><a href="/" class="sidebar-link"><span class="hide-menu"> Lab Results </span></a> </li>
                <li class="sidebar-item"><a href="/" class="sidebar-link"><span class="hide-menu"> Labs </span></a> </li>
                <li class="sidebar-item"><a href="/" class="sidebar-link"><span class="hide-menu"> Lab Ranges </span></a> </li>

                <li class="sidebar-item"><a href="" class="sidebar-link"><span class="hide-menu"> General Events </span></a> </li>

                <li class="sidebar-item"><a href="" class="sidebar-link"><span class="hide-menu"> Checklists </span></a> </li>
                <li class="sidebar-item"><a href="" class="sidebar-link"><span class="hide-menu"> Checklist Groups </span></a> </li>
                <li class="sidebar-item"><a href="" class="sidebar-link"><span class="hide-menu"> Checklist Items </span></a> </li>

                <li class="sidebar-item"><a href="" class="sidebar-link"><span class="hide-menu"> Fluids/Drugs </span></a> </li>
                <li class="sidebar-item"><a href="" class="sidebar-link"><span class="hide-menu"> Fluids/Drugs Mixture </span></a> </li>
                <li class="sidebar-item"><a href="" class="sidebar-link"><span class="hide-menu"> Fluids Locations </span></a> </li>

                <li class="sidebar-item"><a href="" class="sidebar-link"><span class="hide-menu"> Cardioplegia </span></a> </li>
                <li class="sidebar-item"><a href="" class="sidebar-link"><span class="hide-menu"> Data Devices </span></a> </li>

                <li class="sidebar-item"><a href="" class="sidebar-link"><span class="hide-menu"> Registration </span></a> </li>

                <li class="sidebar-item"><a href="" class="sidebar-link"><span class="hide-menu"> Live Line </span></a> </li> -->
            </ul>
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