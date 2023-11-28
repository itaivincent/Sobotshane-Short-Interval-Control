  <div class="sidebar-wrapper sidebar-theme">
            
            <nav id="sidebar">

                <div class="navbar-nav theme-brand flex-row  text-center">
                    <div class="nav-logo">
                        <div class="nav-item theme-logo">
                            <a href="#">
                                <img src="{!! asset('template/src/assets/img/logo.jpg') !!}" class="img-fluid me-2" alt="logo">
                            </a>
                        </div>
                        <div class="nav-item theme-text">
                            <a href="#" class="nav-link"> Sobotshane SIC </a>
                        </div>
                    </div>
                    <div class="nav-item sidebar-toggle">
                        <div class="btn-toggle sidebarCollapse">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevrons-left"><polyline points="11 17 6 12 11 7"></polyline><polyline points="18 17 13 12 18 7"></polyline></svg>
                        </div>
                    </div>
                </div>

                <ul class="list-unstyled menu-categories" id="accordionExample">

                    <li class="menu active">
                        <a href="/dashboard" aria-expanded="true" class="dropdown-toggle">
                            <div class="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-columns"><path d="M12 3h7a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-7m0-18H5a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h7m0-18v18"></path></svg>
                                <span>Dashboard</span>
                            </div>
                        </a>
                    </li>
                    
                    <li class="menu menu-heading">
                        <div class="heading"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-minus"><line x1="5" y1="12" x2="19" y2="12"></line></svg><span>SIC Modules</span></div>
                    </li>

                    @if(Auth::user()->userRole == 1 || Auth::user()->userRole == 5 )
                    <!-- Planning Module -->
                    <li class="menu">                  
                        <a href="#plan" data-bs-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                            <div class="">
                                <span>Planning</span>
                            </div>
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                            </div>
                        </a>
                        <ul class="collapse submenu list-unstyled" id="plan" data-bs-parent="#accordionExample">
                            <li>
                                <a href="javascript:void(0);"> Plans </a>
                            </li>
                            <li>
                                <a href="javascript:void(0);"> Parameters </a>
                            </li>
                        </ul>
                    </li>
                    @endif

                    @if(Auth::user()->userRole == 1 || Auth::user()->userRole == 5 )
                    <!-- Scheduling Module -->
                    <li class="menu">
                        <a href="#schedule" data-bs-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                            <div class="">
                                <span>Scheduling</span>
                            </div>
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                            </div>
                        </a>
                        <ul class="collapse submenu list-unstyled" id="schedule" data-bs-parent="#accordionExample">
                            <li>
                                <a href="javascript:void(0);"> Schedules </a>
                            </li>
                            <li>
                                <a href="javascript:void(0);"> Parameters</a>
                            </li>
                        </ul>
                    </li>
                    @endif

                    <li class="menu">
                    <li class="menu menu-heading">
                        <div class="heading"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-minus"><line x1="5" y1="12" x2="19" y2="12"></line></svg><span>Enablers Modules</span></div>
                    </li>
                    @if(Auth::user()->userRole == 1 || Auth::user()->userRole == 5 )
                    <!-- Asset Management -->
                    <li class="menu">
                        <a href="#asset" data-bs-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                            <div class="">
                              
                                <span>Asset Management</span>
                            </div>
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                            </div>
                        </a>
                        <ul class="collapse submenu list-unstyled" id="asset" data-bs-parent="#accordionExample">
                        <li>
                                <a href="/assets/create"> Create Assets </a>
                            </li>
                            <li>
                                <a href="/assets/index"> Manage Assets </a>
                            </li>
                            <li>
                                <a href="/assets/parameters"> Parameters</a>
                            </li>
                        </ul>
                    </li>
                    @endif

                    @if(Auth::user()->userRole == 1 || Auth::user()->userRole == 5 || Auth::user()->userRole == 11)
                    <!-- Driver Management -->
                    <li class="menu">
                        <a href="#driver" data-bs-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                            <div class="">
                                <span>Driver Management </span>
                            </div>
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                            </div>
                        </a>
                        <ul class="collapse submenu list-unstyled" id="driver" data-bs-parent="#accordionExample">
                            <li>
                                <a href="javascript:void(0);"> Manage Drivers</a>
                            </li>
                            <li>
                                <a href="javascript:void(0);"> Parameters </a>
                            </li>
                        </ul>
                    </li>
                    @endif

                    @if(Auth::user()->userRole == 1 || Auth::user()->userRole == 5 )
                    <!-- Contract Management -->
                    <li class="menu">
                        <a href="#contract" data-bs-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                            <div class="">
                                <span>Contract Management</span>
                            </div>
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                            </div>
                        </a>
                        <ul class="collapse submenu list-unstyled" id="contract" data-bs-parent="#accordionExample">
                            <li>
                                <a href="javascript:void(0);"> Manage Contracts </a>
                            </li>
                            <li>
                                <a href="javascript:void(0);"> Parameters </a>
                            </li>
                        </ul>
                    </li>
                    @endif

                    @if(Auth::user()->userRole == 1 || Auth::user()->userRole == 5 )
                    <!-- Assignments Module -->
                    <li class="menu">
                        <a href="#assignments" data-bs-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                            <div class="">
                                <span>Assignments</span>
                            </div>
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                            </div>
                        </a>
                        <ul class="collapse submenu list-unstyled" id="assignments" data-bs-parent="#accordionExample">
                            <li>
                                <a href="javascript:void(0);"> Manage Assignments </a>
                            </li>
                            <li>
                                <a href="javascript:void(0);"> Parameters </a>
                            </li>
                        </ul>
                    </li>
                    @endif

                    @if(Auth::user()->userRole == 1 )
                    <li class="menu menu-heading">
                        <div class="heading"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-minus"><line x1="5" y1="12" x2="19" y2="12"></line></svg><span>Users</span></div>
                    </li>

                   
                    <!-- User Management -->
                    <li class="menu">
                        <a href="#users" data-bs-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                            <div class="">
                                <span>User Management</span>
                            </div>
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                            </div>
                        </a>
                        <ul class="collapse submenu list-unstyled" id="users" data-bs-parent="#accordionExample">
                            <li>
                                <a href="/users/create"> Create Users </a>
                            </li>
                            <li>
                                <a href="/users/index"> Manage Users </a>
                            </li>
                            <li>
                                <a href="/users/parameters"> Parameters </a>
                            </li>
                        </ul>
                    </li>
                    @endif

                    

                </ul>
                
            </nav>

        </div>