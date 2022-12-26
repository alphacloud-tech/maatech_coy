<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title" data-key="t-menu">Menu</li>

                <li>
                    <a href="{{ route('dashboard') }}">
                        <i data-feather="home"></i>
                        <span data-key="t-dashboard">Dashboard</span>
                    </a>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <i data-feather="grid"></i>
                        <span data-key="t-apps">Home</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li>
                            <a href="{{ route('admin.home.slider') }}">
                                <span data-key="t-calendar">Home Slider</span>
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('admin.home.about') }}">
                                <span data-key="t-chat">Home About</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('admin.home.service') }}">
                                <span data-key="t-chat">Home Service</span>
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('admin.home.team') }}">
                                <span data-key="t-chat">Home Team</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('admin.home.testimonial') }}">
                                <span data-key="t-chat">Home Testimonial</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('admin.home.core') }}">
                                <span data-key="t-chat">Home Core Value</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('admin.home.portifolio') }}">
                                <span data-key="t-chat">Home Client Logo</span>
                            </a>
                        </li>


                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <i data-feather="grid"></i>
                        <span data-key="t-apps">Home</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">

                        <li>
                            <a href="{{ route('admin.home.project') }}">
                                <span data-key="t-chat">Home Project</span>
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('admin.home.multimage') }}">
                                <span data-key="t-chat">Home Project Multi Image</span>
                            </a>
                        </li>


                    </ul>
                </li>

                <li>
                    <a href="{{ route('admin.contact') }}">
                        <i data-feather="layout"></i>
                        <span data-key="t-horizontal">Contact</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.settings') }}">
                        <i data-feather="layout"></i>
                        <span data-key="t-horizontal">Settings</span>
                    </a>
                </li>

            </ul>

        </div>
        <!-- Sidebar -->
    </div>
</div>
