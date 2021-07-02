<div class="main-menu menu-fixed menu-accordion {{ session('dark-theme') == 1 ? 'menu-dark' : 'menu-light' }} menu-shadow " data-scroll-to-active="true">
    <!-- Logo -->
    <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
            <li class="nav-item mr-auto">
                <a class="navbar-brand" href="{{ route('home') }}">
                    <span class="brand-logo">
                        <img src="../../app-assets/images/atlas/logo3.png" alt="">
                    </span>
                    <h2 class="brand-text">Atlas</h2>
                </a>
            </li>
            <li class="nav-item nav-toggle">
                <a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse">
                    <i class="d-block d-xl-none text-primary toggle-icon font-medium-4" data-feather="x"></i>
                    <i class="d-none d-xl-block collapse-toggle-icon font-medium-4  text-primary" data-feather="disc" data-ticon="disc"></i>
                </a>
            </li>
        </ul>
    </div>
    
    <div class="shadow-bottom"></div>
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <li class=" navigation-header">
                <span data-i18n="Apps &amp; Pages">Apps &amp; Pages</span>
                <i data-feather="more-horizontal"></i>
            </li>
            <!-- My Profile -->
            <li class="nav-item {{ (request()->is('/')) ? 'active' : '' }}">
                <a class="d-flex align-items-center" href="{{ route('home') }}">
                    <i data-feather='globe'></i>
                    <span class="menu-title text-truncate" data-i18n="Profile">Home</span>
                </a>
            </li>

            

            <!-- My Profile -->
            <li class="nav-item {{ (request()->is('profile')) ? 'active' : '' }}">
                <a class="d-flex align-items-center" href="{{ route('profile.index') }}">
                    <i data-feather='user'></i>
                    <span class="menu-title text-truncate" data-i18n="Profile">My Profile</span>
                </a>
            </li>

            <!-- Users -->
            <li class="nav-item {{ (request()->is('members')) ? 'active' : '' }}">
                <a class="d-flex align-items-center" href="{{ route('members.index') }}">
                    <i data-feather='users'></i>
                    <span class="menu-title text-truncate" data-i18n="Members">Members</span>
                </a>
            </li>

            <!-- Groups -->
            <li class="nav-item">
                <a class="d-flex align-items-center" href="#">
                    <i data-feather='globe'></i>
                    <span class="menu-title text-truncate" data-i18n="Groups">Groups</span>
                </a>
                <ul class="menu-content">
                    <li class=" {{ (request()->is('groups-add-members')) ? 'active' : '' }}">
                        <a class="d-flex align-items-center" href="{{ route('groups.addMembers') }}">
                            <i data-feather="circle"></i>
                            <span class="menu-item text-truncate" data-i18n="List">Add Members</span>
                        </a>
                    </li>
                    <li class=" {{ (request()->is('groups-create')) ? 'active' : '' }}">
                        <a class="d-flex align-items-center" href="{{ route('groups.create') }}">
                            <i data-feather="circle"></i>
                            <span class="menu-item text-truncate" data-i18n="List">Create</span>
                        </a>
                    </li>
                    <li class=" {{ (request()->is('groups-edit-index')) ? 'active' : '' }}">
                        <a class="d-flex align-items-center" href="{{ route('groups.editGroup') }}">
                            <i data-feather="circle"></i>
                            <span class="menu-item text-truncate" data-i18n="List">Edit</span>
                        </a>
                    </li>
                    <li class=" {{ (request()->is('groups-index')) ? 'active' : '' }}">
                        <a class="d-flex align-items-center" href="{{ route('groups.index') }}">
                            <i data-feather="circle"></i>
                            <span class="menu-item text-truncate" data-i18n="Preview">Show</span>
                        </a>
                    </li>
                </ul>
            </li>
        


            <!-- Skills -->
            <li class="nav-item {{ (request()->is('skills')) ? 'active' : '' }}">
                <a class="d-flex align-items-center" href="{{ route('skills.index') }}">
                    <i data-feather='award'></i>
                    <span class="menu-title text-truncate" data-i18n="Skills">Skills</span>
                </a>
            </li>
            

            <!-- other section -->
            <li class=" navigation-header">
                <span data-i18n="User Interface">Announcement</span>
                <i data-feather="more-horizontal"></i>
            </li>

            <li class=" nav-item">
                <a class="d-flex align-items-center" href="#">
                    <i data-feather='coffee'></i>
                    <span class="menu-title text-truncate" data-i18n="Invoice">Reunion</span>
                </a>
                <ul class="menu-content">
                    <li class=" nav-item {{ (request()->is('reunion-create')) ? 'active' : '' }}">
                        <a class="d-flex align-items-center" href="{{ route('reunion.create') }}">
                            <i data-feather="circle"></i>
                            <span class="menu-item text-truncate" data-i18n="List">Create</span>
                        </a>
                    </li>
                    <li class=" nav-item {{ (request()->is('reunion-show')) ? 'active' : '' }} {{ (request()->is('reunion-update')) ? 'active' : '' }}">
                        <a class="d-flex align-items-center" href="{{ route('reunion.show') }}">
                            <i data-feather="circle"></i>
                            <span class="menu-item text-truncate" data-i18n="Preview">Show</span>
                        </a>
                    </li>
                    
                </ul>
            </li>

            <li class=" nav-item">
                <a class="d-flex align-items-center" href="#">
                    <i data-feather='coffee'></i>
                    <span class="menu-title text-truncate" data-i18n="Invoice">Event</span>
                </a>
                <ul class="menu-content">
                    <li class=" nav-item {{ (request()->is('event-create')) ? 'active' : '' }}">
                        <a class="d-flex align-items-center" href="{{ route('event.create') }}">
                            <i data-feather="circle"></i>
                            <span class="menu-item text-truncate" data-i18n="List">Create</span>
                        </a>
                    </li>
                    <li class=" nav-item {{ (request()->is('event-show')) ? 'active' : '' }} {{ (request()->is('event-update')) ? 'active' : '' }} {{ (request()->is('event-show-update')) ? 'active' : '' }}">
                        <a class="d-flex align-items-center" href="{{ route('event.show') }}">
                            <i data-feather="circle"></i>
                            <span class="menu-item text-truncate" data-i18n="Preview">Show</span>
                        </a>
                    </li>
                    
                </ul>
            </li>

            <!-- Atlas -->
            <li class=" navigation-header">
                <span data-i18n="User Interface">Atlas</span>
                <i data-feather="more-horizontal"></i>
            </li>

            <li class="nav-item {{ (request()->is('skills')) ? 'active' : '' }}">
                <a class="d-flex align-items-center" href="{{ route('atlas.edit') }}">
                    <i data-feather='award'></i>
                    <span class="menu-title text-truncate" data-i18n="Skills">Edit</span>
                </a>
            </li>



            
            <!-- other section -->
            <li class=" navigation-header">
                <span data-i18n="User Interface">Coming soon Parts</span>
                <i data-feather="more-horizontal"></i>
            </li>
            <!-- file manager -->
            <li class=" nav-item {{ (request()->is('file-manager')) ? 'active' : '' }}">
                <a class="d-flex align-items-center" href="{{ route('file-manager.index') }}">
                    <i data-feather="save"></i>
                    <span class="menu-title text-truncate" data-i18n="File Manager">File Manager</span>
                </a>
            </li>

            <!-- Multiple  -->
            <li class=" nav-item">
                <a class="d-flex align-items-center" href="#">
                    <i data-feather='archive'></i>
                    <span class="menu-title text-truncate" data-i18n="Archive">Archive</span>
                </a>
                <ul class="menu-content">
                    <li>
                        <a class="d-flex align-items-center" href="#">
                            <i data-feather="circle"></i>
                            <span class="menu-item text-truncate" data-i18n="List">Rules</span>
                        </a>
                    </li>
                    <li>
                        <a class="d-flex align-items-center" href="#">
                            <i data-feather="circle"></i>
                            <span class="menu-item text-truncate" data-i18n="Preview">Stocks</span>
                        </a>
                    </li>
                    <li>
                        <a class="d-flex align-items-center" href="#">
                            <i data-feather="circle"></i>
                            <span class="menu-item text-truncate" data-i18n="Edit">Presence</span>
                        </a>
                    </li>
                    <li>
                        <a class="d-flex align-items-center" href="#">
                            <i data-feather="circle"></i>
                            <span class="menu-item text-truncate" data-i18n="Add">Finance</span>
                        </a>
                    </li>
                </ul>
            </li>

            <!-- Calendar -->
            <li class="nav-item {{ (request()->is('calendar')) ? 'active' : '' }}">
                <a class="d-flex align-items-center" href="{{ route('calendar.index') }}">
                    <i data-feather="calendar"></i>
                    <span class="menu-title text-truncate" data-i18n="Calendar">Calendar</span>
                </a>
            </li>

            <!-- Planner -->
            <li class=" nav-item {{ (request()->is('planner')) ? 'active' : '' }}">
                <a class="d-flex align-items-center" href="{{ route('planner.index') }}">
                    <i data-feather="grid"></i>
                    <span class="menu-title text-truncate" data-i18n="Kanban">Planner</span>
                </a>
            </li>

            



            

        </ul>
    </div>
</div>