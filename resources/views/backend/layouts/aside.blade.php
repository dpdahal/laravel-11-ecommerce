@section('aside')
    <!-- ======= Sidebar ======= -->
    <aside id="sidebar" class="sidebar">

        <ul class="sidebar-nav" id="sidebar-nav">

            <li class="nav-item">
                <a class="nav-link " href="{{route('dashboard')}}">
                    <i class="bi bi-grid"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            @if(auth()->user()->account_type->name=='admin')
                <li class="nav-item">
                    <a class="nav-link collapsed" data-bs-target="#components-rp" data-bs-toggle="collapse" href="#">
                        <i class="bi bi-lock-fill"></i><span>Role & Permission</span><i
                            class="bi bi-chevron-down ms-auto"></i>
                    </a>
                    <ul id="components-rp" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                        @can('roles_list')
                            <li>
                                <a href="{{route('roles.index')}}">
                                    <i class="bi bi-circle"></i><span>Manage Roles</span>
                                </a>
                            </li>
                        @endcan
                        @can('permissions_list')
                            <li>
                                <a href="{{route('manage-permission')}}">
                                    <i class="bi bi-circle"></i><span>Manage Permissions</span>
                                </a>
                            </li>
                        @endcan


                    </ul>
                </li>
            @endif

            @if(auth()->user()->account_type->name=='admin')

                <li class="nav-item">
                    <a class="nav-link collapsed" data-bs-target="#components-account" data-bs-toggle="collapse"
                       href="#">
                        <i class="bi bi-people-fill"></i><span>Admin</span><i
                            class="bi bi-chevron-down ms-auto"></i>
                    </a>
                    <ul id="components-account" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                        <li>
                            <a href="{{route('manage-account-type')}}">
                                <i class="bi bi-circle"></i><span> Account Types</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{route('manage-member-type')}}">
                                <i class="bi bi-circle"></i><span> Member Types</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{route('admin.index')}}">
                                <i class="bi bi-circle"></i><span> Admin</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{route('manage-team.index')}}">
                                <i class="bi bi-circle"></i><span> Our Teams</span>
                            </a>
                        </li>


                    </ul>
                </li>
            @endif

            @if(auth()->user()->account_type->name=='admin')
                <li class="nav-item">
                    <a class="nav-link collapsed" data-bs-target="#components-pages" data-bs-toggle="collapse" href="#">
                        <i class="bi bi-folder-fill"></i><span>Pages</span><i
                            class="bi bi-chevron-down ms-auto"></i>
                    </a>
                    <ul id="components-pages" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                        @can('menus_list')
                            <li>
                                <a href="{{route('manage-menu.index')}}">
                                    <i class="bi bi-circle"></i><span> Manage Menu</span>
                                </a>
                            </li>
                        @endcan
                        @can('pages_list')
                            <li>
                                <a href="{{route('manage-page.index')}}">
                                    <i class="bi bi-circle"></i><span> Manage Page</span>
                                </a>
                            </li>
                        @endcan
                        @can('testimonials_list')
                            <li>
                                <a href="{{route('manage-testimonial.index')}}">
                                    <i class="bi bi-circle"></i><span> Testimonial</span>
                                </a>
                            </li>
                        @endcan
                        @can('faqs_list')
                            <li>
                                <a href="{{route('manage-faqs.index')}}">
                                    <i class="bi bi-circle"></i><span> Faqs</span>
                                </a>
                            </li>
                        @endcan


                    </ul>
                </li>
            @endif
            @can('activity_log_list')
                <li class="nav-item">
                    <a class="nav-link collapsed" href="{{route('manage-activity')}}">
                        <i class="bi bi-grid"></i>
                        <span>Activity Log</span>
                    </a>
                </li>
            @endcan
            @if(auth()->user()->account_type->name=='admin' or auth()->user()->account_type->name=='employer')
                <li class="nav-item">
                    <a class="nav-link collapsed" href="{{route('manage-employer.index')}}">
                        <i class="bi bi-book"></i>
                        <span>Mange Company</span>
                    </a>
                </li>
            @endif
            @can('banners_list')
                <li class="nav-item">
                    <a class="nav-link collapsed" href="{{route('manage-banner.index')}}">
                        <i class="bi bi-image-fill"></i>
                        <span>Manage Banner</span>
                    </a>
                </li>
            @endcan
            @if(auth()->user()->account_type->name=='admin')

                <li class="nav-item">
                    <a class="nav-link collapsed" data-bs-target="#components-posts" data-bs-toggle="collapse" href="#">
                        <i class="bi bi-newspaper"></i><span>Blog</span><i
                            class="bi bi-chevron-down ms-auto"></i>
                    </a>
                    <ul id="components-posts" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                        <li>
                            <a href="{{route('manage-category.index')}}">
                                <i class="bi bi-circle"></i><span>Manage Category</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{route('manage-blog.create')}}">
                                <i class="bi bi-circle"></i><span>Add Blog</span>
                            </a>
                            <a href="{{route('manage-blog.index')}}">
                                <i class="bi bi-circle"></i><span>Show Blogs</span>
                            </a>
                        </li>

                    </ul>
                </li>
            @endif
            @if(auth()->user()->account_type->name=='admin')
                <li class="nav-item">
                    <a class="nav-link collapsed" data-bs-target="#components-address" data-bs-toggle="collapse"
                       href="#">
                        <i class="bi bi-globe"></i><span>Manage Address</span><i
                            class="bi bi-chevron-down ms-auto"></i>
                    </a>
                    <ul id="components-address" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                        <li>
                            <a href="{{route('continents.index')}}">
                                <i class="bi bi-circle"></i><span> Manage Continents</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{route('countries.index')}}">
                                <i class="bi bi-circle"></i><span> Manage Country</span>
                            </a>
                        </li>
                    </ul>
                </li>
            @endif
            @can('settings_list')
                <li class="nav-item">
                    <a class="nav-link collapsed" href="{{route('setting')}}">
                        <i class="bi bi-grid"></i>
                        <span>Setting</span>
                    </a>
                </li>
            @endcan
            @can('contacts_list')
                <li class="nav-item">
                    <a class="nav-link collapsed" href="{{route('contact-list')}}">
                        <i class="bi bi-envelope"></i>
                        <span>Contact List</span>
                    </a>
                </li>
            @endcan
            @can('resumes_list')
                <li class="nav-item">
                    <a class="nav-link collapsed" href="{{route('resume-list')}}">
                        <i class="bi bi-book"></i>
                        <span>Resume List</span>
                    </a>
                </li>
            @endcan


        </ul>

    </aside><!-- End Sidebar-->
@endsection
