<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
    </ul>
</nav>

<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/admin/home" class="brand-link text-center" style="margin-top: -10px;">
        <span class="brand-text font-weight-light" style="color:#ffc107;"><b>ImTS</b></span>
        <div class="text-center">
            <img src="/img/elib.png" alt="Your Logo" class="img-fluid logo" />
        </div>

    </a>

    <!-- Sidebar -->
    <div class="sidebar">

        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                    aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->

                <li class="nav-item">
                    <a href="/admin/home" class="nav-link">
                        <i class="nav-icon fas fa-solid fa-home"></i>
                        <p>Home</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/admin/users" class="nav-link">
                        <i class="nav-icon fas fa-solid fa-users"></i>
                        <p>View Users</p>

                    </a>
                </li>
                <!-- Categories -->
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-solid fa-bars"></i>
                        <p>
                            Categories
                            <i class="right fas fa-angle-left" style="margin-top: 2.5px;"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/admin/categories/create" class="nav-link">
                                <p>Create a Category</p>
                            </a>
                        </li>
                        <li class="nav-item menu-open">
                            <a href="/admin/categories/" class="nav-link ">
                                <p>List Category</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <!-- ... -->
                <!-- Author -->
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-solid fa-user"></i>
                        <p>
                            Author
                            <i class="right fas fa-angle-left" style="margin-top: 2.5px;"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/admin/authors/create" class="nav-link">
                                <p>Add Author</p>
                            </a>
                        </li>
                        <li class="nav-item menu-open">
                            <a href="/admin/authors" class="nav-link ">
                                <p>Authors Lists</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <!-- ... -->
                <!-- Books -->
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa fa-book"></i>
                        <p>
                            Book
                            <i class="right fas fa-angle-left" style="margin-top: 2.5px;"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/admin/books/create" class="nav-link">
                                <p>Upload Books</p>
                            </a>
                        </li>
                        <li class="nav-item menu-open">
                            <a href="/admin/books/" class="nav-link ">
                                <p>View Books</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <!-- ... -->

                <li class="nav-item">
                    <a href="/admin/requests" class="nav-link">
                        <i class="nav-icon fas fa-solid fa-clipboard"></i>
                        <p>View Request</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/admin/comments" class="nav-link">
                        <i class="nav-icon fas fa-solid fa-comments"></i>
                        <p>View Comments</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/admin/login/{{session('admin_id')}}/edit" class="nav-link">
                        <i class="nav-icon fas fa-solid fa-pen"></i>
                        <p>Change Password</p>
                    </a>
                </li>
                <li class="nav-item mb-5">
                    <a href="/admin/login/{{session('admin_id')}}" class="nav-link">
                        <i class="nav-icon fas fa-solid fa-arrow-left"></i>
                        <p>Logout</p>
                    </a>
                </li>

            </ul>
        </nav>
    </div>

</aside>
