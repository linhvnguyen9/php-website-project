<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="sidebar-sticky pt-3">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link <?php if( $page == 'main') echo 'active'?>" href="/phpchay/main.php">
                    <span data-feather="bar-chart-2"></span>
                    Điểm thi
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php if( $page == 'studentlist') echo 'active'?>" href="/phpchay/studentlist.php">
                    <span data-feather="users"></span>
                    Danh sách lớp
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php if( $page == 'profile') echo 'active'?>" href="/phpchay/profile.php">
                    <span data-feather="layers"></span>
                    Thông tin cá nhân <span class="sr-only">(current)</span>
                </a>
            </li>
        </ul>
    </div>
</nav>

