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
    <a href="/user/home" class="brand-link text-center" style="margin-top: -10px;">
        <span class="brand-text font-weight-light" style="color:#ffc107;"><b>ImTS</b></span>
        <div class="text-center">
            <img src="/img/elib.png" alt="Your Logo" class="img-fluid logo" />
        </div>

    </a>

    <!-- Sidebar -->
    <div class="sidebar">

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->

                <li class="nav-item">
                    <a href="/user/home" class="nav-link">
                        <i class="nav-icon fas fa-solid fa-home"></i>
                        <p>Home

                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/user/categories" class="nav-link">
                        <i class="nav-icon fas fa-solid fa-bars"></i>
                        <p>Category

                        </p>
                    </a>
                </li>
                <!-- Books -->
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-solid fa-book"></i>
                        <p>
                            Books
                            <i class="right fas fa-angle-left" style="margin-top: 2.5px;"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/user/books" class="nav-link">
                                <p>All Books</p>
                            </a>
                        </li>
                        <li class="nav-item menu-open">
                            <a href="/user/books/create" class="nav-link ">
                                <p>Search Book</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <!-- ... -->
                <li class="nav-item">
                    <a href="/user/requests" class="nav-link">
                        <i class="nav-icon fas fa-solid fa-clipboard"></i>
                        <p>Request

                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/user/login/{{session('user_id')}}/edit" class="nav-link">
                        <i class="nav-icon fas fa-solid fa-pen"></i>
                        <p>Change Password

                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/user/login/{{session('user_id')}}" class="nav-link">
                        <i class="nav-icon fas fa-solid fa-arrow-left"></i>
                        <p>Logout</p>
                    </a>
                </li>
            </ul>
        </nav>
    </div>

</aside>
