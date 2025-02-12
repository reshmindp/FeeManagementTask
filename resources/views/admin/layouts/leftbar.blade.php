<!-- ========== Left Sidebar Start ========== -->
            <div class="vertical-menu">

                <div data-simplebar class="h-100">

                    <!--- Sidemenu -->
                    <div id="sidebar-menu">
                        <!-- Left Menu Start -->
                        <ul class="metismenu list-unstyled" id="side-menu">
                            <li class="menu-title" key="t-menu">Home</li>

                            <li>
                                <a href="{{route('dashboard')}}" class="waves-effect">
                                    <i class="bx bx-home-circle"></i>
                                    <span key="t-dashboards">Dashboard</span>
                                </a>
                            </li>

                            <li class="menu-title" key="t-apps">Modules</li>

                            <li {{ Request::url() == route('courses.index') || Request::url() == route('courses.create') ?  'class=mm-active' : ''}}>
                                <a href="{{route('courses.index')}}" class="waves-effect {{ Request::url() == route('courses.index') || Request::url() == route('courses.create') ?  'active' : ''}}">
                                    <i class="bx bx-grid-small"></i>
                                    <span key="t-dashboards">Courses</span>
                                </a>
                            </li>

                            <li {{ Request::url() == route('students.index') || Request::url() == route('students.create') ?  'class=mm-active' : ''}}>
                                <a href="{{route('students.index')}}" class="waves-effect {{ Request::url() == route('students.index') || Request::url() == route('students.create') ?  'active' : ''}}">
                                    <i class="bx bx-grid-small"></i>
                                    <span key="t-dashboards">Students</span>
                                </a>
                            </li>

                            <li {{ Request::url() == route('payments.index') || Request::url() == route('payments.create') ?  'class=mm-active' : ''}}>
                                <a href="{{route('payments.index')}}" class="waves-effect {{ Request::url() == route('payments.index') || Request::url() == route('payments.create') ?  'active' : ''}}">
                                    <i class="bx bx-grid-small"></i>
                                    <span key="t-dashboards">Payments</span>
                                </a>
                            </li>

                            <li {{ Request::url() == route('reports.index') || Request::url() == route('reports.create') ?  'class=mm-active' : ''}}>
                                <a href="{{route('reports.index')}}" class="waves-effect {{ Request::url() == route('reports.index') ?  'active' : ''}}">
                                    <i class="bx bx-grid-small"></i>
                                    <span key="t-dashboards">Reports</span>
                                </a>
                            </li>

                            
                        </ul>
                    </div>
                    <!-- Sidebar -->
                </div>
            </div>
            <!-- Left Sidebar End -->